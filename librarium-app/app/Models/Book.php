<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'title',
        'cover',
        'color',
        'released',
        'publisher',
        'plot',
        'isbn',
        'author',
        'genre',
        'copies',
        'category',
    ];

    public function authors()
    {
        return $this->belongsTo(Author::class, 'author');
    }
    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genre');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'book');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
