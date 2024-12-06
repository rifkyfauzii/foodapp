<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','price'];
    protected $table = 'menus';
    public $timestamps = false;

    public function carts()
{
    return $this->hasMany(Cart::class, 'menu_id');
}

}

