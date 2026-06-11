<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $query  = Article::latest();
        if ($search) $query->search($search);
        $articles  = $query->paginate(10)->withQueryString();
        $total     = Article::count();
        $published = Article::published()->count();
        $draft     = $total - $published;
        return view('admin.articles.index', compact('articles', 'search', 'total', 'published', 'draft'));
    }

    public function create()
    {
        $categories = $this->getCategories();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'excerpt'      => 'required|string|max:500',
            'body'         => 'required|string',
            'author'       => 'required|string|max:100',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $filename);
            $validated['image'] = $filename;
        }

        $validated['is_published'] = $request->has('is_published');
        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function show(Article $article)
    {
        return redirect()->route('admin.articles.edit', $article);
    }

    public function edit(Article $article)
    {
        $categories = $this->getCategories();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'excerpt'      => 'required|string|max:500',
            'body'         => 'required|string',
            'author'       => 'required|string|max:100',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image && file_exists(public_path('uploads/' . $article->image))) {
                unlink(public_path('uploads/' . $article->image));
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $filename);
            $validated['image'] = $filename;
        }

        $validated['is_published'] = $request->has('is_published');
        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        if ($article->image && file_exists(public_path('uploads/' . $article->image))) {
            unlink(public_path('uploads/' . $article->image));
        }
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }

    private function getCategories(): array
    {
        return [
            'House of the Dragon',
            'A Knight of the Seven Kingdoms',
            'Game of Thrones',
            'Lore & Sejarah',
            'Rumah & Silsilah',
            'Karakter',
            'Naga & Makhluk',
            'Buku & Novel',
            'Teori & Spekulasi',
        ];
    }
}
