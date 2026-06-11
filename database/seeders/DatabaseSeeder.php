<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name'     => 'Admin WesterosGate',
            'email'    => 'admin@westerosgate.id',
            'password' => Hash::make('password123'),
        ]);

        $articles = [
            [
                'title'    => 'House of the Dragon Season 2: Apa yang Perlu Kamu Tahu',
                'category' => 'House of the Dragon',
                'excerpt'  => 'Season 2 membawa Dance of the Dragons ke puncaknya. Berikut panduan singkat episode, karakter utama, dan naga-naga yang terlibat.',
                'body'     => '<p>Season 2 House of the Dragon resmi tayang dan langsung melempar penonton ke tengah perang saudara Targaryen yang paling mematikan. Berbeda dari season 1 yang banyak membangun cerita, season ini penuh konfrontasi dan aksi.</p>

<h3>Siapa Kubu Hijau dan Hitam?</h3>
<p>Kubu Hijau mendukung Aegon II sebagai raja, dipimpin oleh keluarga Hightower. Kubu Hitam berpusat di Dragonstone, setia kepada Rhaenyra. Hampir semua rumah besar di Westeros harus memilih salah satu.</p>

<h3>Naga-Naga di Season 2</h3>
<p>Vhagar milik Aemond menjadi ancaman terbesar — ukurannya hampir sebesar Balerion. Di pihak Rhaenyra ada Syrax, Caraxes milik Daemon, dan beberapa naga muda yang belum teruji pertempuran.</p>

<h3>Yang Paling Ditunggu</h3>
<p>Adegan Battle of Rook\'s Rest adalah highlight season ini. Pertempuran udara antara naga menjadi salah satu yang paling spektakuler dalam sejarah serial HBO.</p>',
                'author'   => 'Raka Santoso',
                'image'    => 'cover_hotd.jpg',
                'is_published' => true,
            ],
            [
                'title'    => 'Mengenal Ser Duncan the Tall, Tokoh Utama A Knight of the Seven Kingdoms',
                'category' => 'A Knight of the Seven Kingdoms',
                'excerpt'  => 'Dari ksatria miskin tanpa nama hingga Lord Commander Kingsguard — kisah Dunk adalah salah satu yang paling menyentuh dalam universe George R.R. Martin.',
                'body'     => '<p>A Knight of the Seven Kingdoms mengangkat kisah yang sebelumnya hanya dikenal lewat novela Dunk and Egg karya George R.R. Martin. Serialnya fokus pada dua karakter: Ser Duncan si ksatria jalanan, dan "Egg" — seorang bocah yang menyembunyikan identitas aslinya.</p>

<h3>Siapa Duncan?</h3>
<p>Duncan tidak punya keluarga bangsawan. Ia belajar jadi ksatria dari Ser Arlan of Pennytree, ksatria tua yang mengembara keliling Westeros. Setelah tuannya meninggal, Duncan meneruskan perjalanan sendiri.</p>

<h3>Siapa "Egg"?</h3>
<p>Egg ternyata adalah Aegon Targaryen, cucu Raja Daeron II. Ia sengaja menyembunyikan identitasnya agar bisa melihat dunia nyata tanpa perlakuan istimewa. Persahabatannya dengan Duncan menjadi inti dari seluruh cerita.</p>

<h3>Kenapa Penting untuk Lore GoT?</h3>
<p>Duncan adalah leluhur Brienne of Tarth. Egg kelak menjadi Raja Aegon V, kakek buyut Daenerys dan Viserys. Kisah mereka terjadi sekitar 90 tahun sebelum Game of Thrones dimulai.</p>',
                'author'   => 'Indah Permata',
                'image'    => 'cover_akotsk.jpg',
                'is_published' => true,
            ],
            [
                'title'    => 'Jon Snow dan Rahasia Kelahirannya yang Mengubah Segalanya',
                'category' => 'Game of Thrones',
                'excerpt'  => 'Jon Snow bukan anak haram Ned Stark. Ia adalah Aegon Targaryen VI, putra sah Rhaegar dan Lyanna — dan pewaris Iron Throne yang lebih legitimate dari Daenerys sendiri.',
                'body'     => '<p>Salah satu twist terbesar dalam sejarah televisi: Jon Snow, yang selama bertahun-tahun kita kenal sebagai anak haram Ned Stark, ternyata adalah Aegon Targaryen VI — putra sah dari Rhaegar Targaryen dan Lyanna Stark.</p>

<h3>Apa yang Terjadi di Tower of Joy?</h3>
<p>Ned Stark menemukan adiknya Lyanna sekarat setelah melahirkan. Lyanna meminta Ned melindungi bayinya. Ned memilih berbohong selama bertahun-tahun, mengklaim Jon sebagai anaknya sendiri untuk melindunginya dari Robert Baratheon.</p>

<h3>Mengapa Jon Bukan Anak Haram?</h3>
<p>Rhaegar membatalkan pernikahannya dengan Elia Martell secara resmi, lalu menikahi Lyanna secara diam-diam di sebuah kuil. Ini menjadikan Jon anak yang sah — bahkan lebih berhak atas Iron Throne dibanding Daenerys.</p>

<h3>Dampaknya di Season Akhir</h3>
<p>Saat kebenaran ini terungkap, hubungan Jon dan Daenerys menjadi semakin rumit. Loyalitas para bannermen pun mulai terbagi. Ini menjadi salah satu faktor yang mendorong Daenerys ke arah yang lebih gelap.</p>',
                'author'   => 'Bagas Wibowo',
                'image'    => 'cover_got.jpg',
                'is_published' => true,
            ],
            [
                'title'    => 'Doom of Valyria: Bencana yang Menghancurkan Peradaban Terkuat di Dunia',
                'category' => 'Lore & Sejarah',
                'excerpt'  => 'Empat ratus tahun sebelum Game of Thrones, kerajaan paling kuat di dunia lenyap dalam semalam. Hingga kini, penyebabnya masih menjadi misteri.',
                'body'     => '<p>Valyrian Freehold adalah peradaban paling maju dalam sejarah dunia yang dikenal. Mereka menguasai sihir, membangun jalan-jalan dengan batu dragonstone, dan memiliki puluhan naga. Lalu dalam satu malam, semuanya musnah.</p>

<h3>Apa itu Doom of Valyria?</h3>
<p>Sekitar 400 tahun sebelum Game of Thrones, seluruh semenanjung Valyria tenggelam disertai letusan gunung berapi berantai. Hampir semua penduduk dan naga punah seketika. Yang tersisa hanyalah puing dan lautan api yang kini disebut Smoking Sea.</p>

<h3>Teori Penyebabnya</h3>
<p>Ada beberapa teori yang beredar. Yang paling umum: Empat Belas Api — gunung berapi yang sudah lama dikendalikan lewat sihir darah — akhirnya meledak setelah sihirnya gagal. Teori lain menyebut ritual terlarang yang dilakukan dragonlord sendiri sebagai pemicunya.</p>

<h3>Bagaimana Targaryen Selamat?</h3>
<p>Keluarga Targaryen meninggalkan Valyria 12 tahun sebelum bencana terjadi. Putri mereka, Daenys the Dreamer, konon bermimpi tentang kehancuran itu. Apakah ini kebetulan atau sesuatu yang lebih besar — tidak ada yang tahu pasti.</p>',
                'author'   => 'Mawar Kristianti',
                'image'    => 'cover_lore.jpg',
                'is_published' => true,
            ],
            [
                'title'    => 'Silsilah House Targaryen: Dari Valyria hingga Daenerys',
                'category' => 'Rumah & Silsilah',
                'excerpt'  => 'Panduan lengkap garis keturunan House Targaryen — keluarga naga yang selamat dari kehancuran Valyria dan menaklukkan tujuh kerajaan Westeros.',
                'body'     => '<p>House Targaryen adalah satu-satunya keluarga dragonlord yang selamat dari Doom of Valyria. Mereka menetap di Dragonstone sebelum akhirnya menaklukkan Westeros di bawah pimpinan Aegon the Conqueror.</p>

<h3>Generasi Pertama: Aenar the Exile</h3>
<p>Aenar Targaryen membawa keluarga dan lima naga — termasuk Balerion yang masih muda — ke Dragonstone. Keputusan ini menyelamatkan garis keturunan mereka dari kehancuran Valyria.</p>

<h3>Aegon the Conqueror</h3>
<p>Aegon I menyatukan enam dari tujuh kerajaan Westeros dengan tiga naga: Balerion, Meraxes, dan Vhagar. Field of Fire dan pembakaran Harrenhal menjadi bukti kekuatan tak tertandinginya.</p>

<h3>Menuju Era House of the Dragon</h3>
<p>Selama lebih dari 130 tahun Targaryen memerintah dengan damai. Namun ketika Viserys I meninggal tanpa menunjuk pewaris yang jelas secara publik, perang saudara pun tak terhindarkan.</p>

<h3>Sisa-sisa di Era Game of Thrones</h3>
<p>Di akhir era GoT, hanya Daenerys dan Viserys yang tersisa dari garis utama Targaryen — ditambah Jon Snow yang identitas aslinya baru terungkap belakangan.</p>',
                'author'   => 'Raka Santoso',
                'image'    => 'cover_house.jpg',
                'is_published' => true,
            ],
            [
                'title'    => 'Daenerys Targaryen: Perjalanan dari Budak hingga Ratu yang Dikhawatirkan',
                'category' => 'Karakter',
                'excerpt'  => 'Tidak ada karakter dalam Game of Thrones yang perjalanannya sekompleks Daenerys. Dari gadis yang dijual saudaranya hingga penguasa yang membakar kota — ini kisah lengkapnya.',
                'body'     => '<p>Daenerys Stormborn of House Targaryen memulai hidupnya sebagai pelarian yang bergantung pada saudaranya yang kasar, Viserys. Ia lalu menemukan kekuatannya sendiri lewat pernikahan, kehilangan, dan akhirnya naga-naga yang lahir dari api.</p>

<h3>Titik Balik di Vaes Dothrak</h3>
<p>Kematian Khal Drogo dan anaknya yang belum lahir menjadi titik terendah Daenerys. Tapi justru dari situ ia bangkit — membakar dirinya bersama telur naga dan keluar tak terluka bersama tiga naga kecil. Momen ini mengubah segalanya.</p>

<h3>Dari Essos ke Westeros</h3>
<p>Selama bertahun-tahun di Essos, Daenerys membangun pasukan, membebaskan budak, dan belajar menjadi pemimpin. Setiap kemenangan dan kekalahan membentuknya — kadang ke arah yang lebih bijak, kadang lebih keras.</p>

<h3>Apa yang Terjadi di King\'s Landing?</h3>
<p>Inilah yang masih diperdebatkan banyak penggemar. Keputusan Daenerys membakar King\'s Landing dinilai terlalu terburu-buru secara naratif oleh sebagian penonton, meski argumen karakternya sebenarnya sudah dibangun sejak lama.</p>',
                'author'   => 'Indah Permata',
                'image'    => 'cover_chars.jpg',
                'is_published' => true,
            ],
            [
                'title'    => 'Balerion, Vhagar, Drogon: Mengenal Naga-Naga Terbesar Westeros',
                'category' => 'Naga & Makhluk',
                'excerpt'  => 'Naga adalah simbol kekuatan House Targaryen. Tapi tidak semua naga diciptakan sama — dari yang sekecil kuda hingga yang bisa menelan mammoth utuh.',
                'body'     => '<p>Dalam universe George R.R. Martin, naga bukan sekadar senjata. Mereka punya kepribadian, ikatan dengan penunggangnya, dan sejarah yang panjang. Berikut tiga naga paling ikonik dalam lore.</p>

<h3>Balerion the Black Dread</h3>
<p>Naga terbesar yang pernah hidup. Lahir di Valyria, Balerion hidup lebih dari 200 tahun. Kepala dan rahangnya cukup besar untuk menelan aurochs utuh. Api hitamnya melelehkan kastil Harrenhal menjadi batu yang meleleh. Penunggang terakhirnya adalah Viserys I.</p>

<h3>Vhagar</h3>
<p>Salah satu dari tiga naga Aegon\'s Conquest. Di era House of the Dragon, Vhagar sudah berusia lebih dari 150 tahun dan menjadi naga terbesar yang masih hidup. Ditunggangi Laena Velaryon, lalu Aemond Targaryen. Ukurannya hampir menyamai Balerion muda.</p>

<h3>Drogon</h3>
<p>Naga terbesar dari tiga naga Daenerys. Dinamai dari Khal Drogo. Dari hari pertama menetas, Drogon selalu jadi yang paling liar dan paling besar. Di akhir Game of Thrones, ia terbang membawa jasad Daenerys ke timur — tujuannya hingga kini menjadi misteri.</p>',
                'author'   => 'Bagas Wibowo',
                'image'    => 'cover_dragon.jpg',
                'is_published' => true,
            ],
            [
                'title'    => 'The Winds of Winter: Kapan Buku ke-6 GRRM Akan Terbit?',
                'category' => 'Buku & Novel',
                'excerpt'  => 'Sudah lebih dari 13 tahun sejak A Dance with Dragons terbit. George R.R. Martin masih menulis The Winds of Winter. Ini semua yang kita tahu sejauh ini.',
                'body'     => '<p>A Dance with Dragons terbit Juli 2011. Sekarang sudah lebih dari 13 tahun — dan The Winds of Winter, buku keenam dalam seri A Song of Ice and Fire, belum juga selesai. Ini menjadi salah satu penantian terpanjang dalam dunia fantasi modern.</p>

<h3>Apa yang Sudah GRRM Bagikan?</h3>
<p>Martin sudah membacakan beberapa chapter secara publik di berbagai konvensi. Di antaranya: chapter Arianne (tentang perjalanan ke Griffin\'s Roost), chapter Theon (tentang Battle of Ice), dan chapter Mercy yang menampilkan Arya di Braavos.</p>

<h3>Seberapa Jauh Penulisannya?</h3>
<p>Dalam blog-nya di tahun 2023, GRRM menyebut buku ini "lebih dari setengah jadi." Ia juga mengonfirmasi bahwa ending cerita di buku akan berbeda secara signifikan dari akhir serial TV.</p>

<h3>Mengapa Butuh Sangat Lama?</h3>
<p>Martin sendiri mengakui bahwa seri ini jauh lebih kompleks dari yang ia perkirakan. Plot yang ia buat semakin meluas, karakter yang seharusnya mati malah terus berkembang, dan tiap keputusan naratif berdampak besar pada ratusan halaman berikutnya.</p>',
                'author'   => 'Mawar Kristianti',
                'image'    => 'cover_buku.jpg',
                'is_published' => true,
            ],
            [
                'title'    => 'Teori R+L=J: Bukti Terlengkap yang Sudah Ada Sejak Buku Pertama',
                'category' => 'Teori & Spekulasi',
                'excerpt'  => 'Rhaegar + Lyanna = Jon. Teori yang beredar sejak 1996 ini akhirnya dikonfirmasi di season 7. Tapi versi bukunya masih menyimpan detail yang lebih kompleks.',
                'body'     => '<p>R+L=J adalah teori paling terkenal dalam komunitas A Song of Ice and Fire. Muncul pertama kali di forum Usenet tak lama setelah A Game of Thrones terbit pada 1996, teori ini akhirnya terbukti di season 7 Game of Thrones.</p>

<h3>Dasar Teorinya</h3>
<p>Ned Stark sering merefleksikan janji yang ia buat kepada adiknya Lyanna. Mimpinya tentang Tower of Joy selalu berhenti sebelum ia masuk ke dalam kamar. Deskripsi Jon yang berambut gelap (bukan pirang Targaryen) sebenarnya konsisten dengan campuran gen Stark-Targaryen.</p>

<h3>Apakah Jon Anak Sah?</h3>
<p>Ini yang membuat teorinya lebih dari sekadar "Jon anak Rhaegar." Jika Rhaegar benar-benar membatalkan pernikahan lamanya dan menikahi Lyanna secara sah — yang tampaknya terjadi — maka Jon bukan anak haram. Ia adalah pewaris Iron Throne yang legitimate.</p>

<h3>Apa Bedanya di Buku?</h3>
<p>Di buku, GRRM belum mengkonfirmasi secara eksplisit. Ada petunjuk tambahan yang tidak ada di serial TV, termasuk kemungkinan nama asli Jon yang berbeda dari "Aegon." Komunitas pembaca masih berdebat soal detail ini hingga sekarang.</p>',
                'author'   => 'Raka Santoso',
                'image'    => 'cover_teori.jpg',
                'is_published' => true,
            ],
        ];

        foreach ($articles as $i => $data) {
            Article::create($data);
        }
    }
}
