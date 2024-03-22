<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'user',
        'book',
        'collectiondate',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->hasOne(Book::class);
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'book');
    }
}
