<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'title','slug','category','excerpt','body','image','author','is_published',
    ];

    protected $casts = ['is_published' => 'boolean'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($a) {
            if (empty($a->slug)) {
                $a->slug = Str::slug($a->title).'-'.time();
            }
        });
        static::updating(function ($a) {
            if ($a->isDirty('title')) {
                $a->slug = Str::slug($a->title).'-'.time();
            }
        });
    }

    public function scopePublished($q) { return $q->where('is_published', true); }

    public function scopeSearch($q, $term)
    {
        return $q->where(function($x) use ($term) {
            $x->where('title','like',"%{$term}%")
              ->orWhere('excerpt','like',"%{$term}%")
              ->orWhere('author','like',"%{$term}%")
              ->orWhere('category','like',"%{$term}%");
        });
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('uploads/'.$this->image);
        }
        // Fallback to category cover
        $map = [
            'House of the Dragon'            => 'cover_hotd.jpg',
            'A Knight of the Seven Kingdoms' => 'cover_akotsk.jpg',
            'Game of Thrones'                => 'cover_got.jpg',
            'Lore & Sejarah'                 => 'cover_lore.jpg',
            'Rumah & Silsilah'               => 'cover_house.jpg',
            'Karakter'                       => 'cover_chars.jpg',
            'Naga & Makhluk'                 => 'cover_dragon.jpg',
            'Buku & Novel'                   => 'cover_buku.jpg',
            'Teori & Spekulasi'              => 'cover_teori.jpg',
        ];
        $file = $map[$this->category] ?? 'cover_lore.jpg';
        return asset('uploads/'.$file);
    }

    public function getReadingTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->body));
        $min   = ceil($words / 200);
        return $min.' menit baca';
    }
}
