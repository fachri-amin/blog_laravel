<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model // nama model ini adalah bentuk singular dari nama table di database
{
    // protected $table = 'nama_table_beda_dengan_bentuk_plural_dari_nama_model' //!ini yang dilakukan apabila ingin menggunakan nama yang berbeda

    protected $fillable = ['title', 'body', 'slug']; // fillabel ini adalha variable yang akan menjadi referensi field mana saja yang dapat di isi, semua field yang tidak ada di fillable tidak akan bisa diisi

    public function scopeLatestOne(){ 
        // method ini bisa dipanggil di 'php artisan tinker' dengan command 'Post::latestOne()'
        // nama method yang dipanggil tanpa menggunakan kata scope karena itu sebagai penanda scope global
        return $this->latest()->first();
    }
}
