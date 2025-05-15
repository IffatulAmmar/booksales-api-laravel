<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    // Relasi dengan Author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function genre()
{
    return $this->belongsTo(Genre::class);
}

}
