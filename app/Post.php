<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model // nama model ini adalah bentuk singular dari nama table di database
{
    // protected $table = 'nama_table_beda_dengan_bentuk_plural_dari_nama_model' //!ini yang dilakukan apabila ingin menggunakan nama yang berbeda

    protected $fillable = ['title', 'body', 'slug', 'category_id', 'thumbnail']; // fillabel ini adalha variable yang akan menjadi referensi field mana saja yang dapat di isi, semua field yang tidak ada di fillable tidak akan bisa diisi

    public function scopeLatestOne(){ 
        // method ini bisa dipanggil di 'php artisan tinker' dengan command 'Post::latestOne()'
        // nama method yang dipanggil tanpa menggunakan kata scope karena itu sebagai penanda scope global
        return $this->latest()->first();
    }

    public function category(){
        //membuat relasi ke table categories
        return $this->belongsTo(Category::class);
    }

    public function author(){
        //membuat relasi ke table categories
        return $this->belongsTo(User::class, 'user_id'); //karena nama method nya beda dengan nama field foreign key nya maka nama field foreign key nya harus di defenisikan di parameter kedua
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function getRatingPost(){

        //!still not working corectly
        $ratings = $this->ratings->all();

        $result = 0;
        foreach($ratings as $rating){
            $result += $rating->rate;
        }

        $all_rating = count($ratings);


        return $result == 0 ? '-' : $result/$all_rating;
    }

    public function showThumbnail(){
        return "/storage/". $this->thumbnail;
    }
}
