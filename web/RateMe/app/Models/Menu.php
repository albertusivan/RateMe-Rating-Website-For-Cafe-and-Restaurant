<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['cafe_id', 'name', 'harga'];

    public function cafe(){
        return $this->belongsTo(Cafe::class);
    }
}
