<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'rating_star', 'description'];

    public function comments() {
        return $this-> hasMany(Comment::class);
    }

    public function menus() {
        return $this-> hasMany(Menu::class);
    }

    public function bookmarks() {
        return $this-> hasMany(Bookmark::class);
    }
}
