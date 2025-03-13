<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'properties';

    // The attributes that are mass assignable
    protected $fillable = [
        'name', 'description', 'price_per_night', 'image',
    ];
    public function books()
{
    return $this->hasMany(Book::class);
}

}
