<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cafe_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cafe() {
        return $this-> belongsTo(Cafe::class);
    }
}
