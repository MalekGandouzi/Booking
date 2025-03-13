<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'book';

    // Fields that are mass assignable
    protected $fillable = [
        'user_id',
        'property_id',
        'start_date',
        'end_date',
    ];

    // Define relationships

    // A booking belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A booking belongs to a property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
