<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        ['id' => 1, 'name' => 'J.K. Rowling'],
        ['id' => 2, 'name' => 'Isaac Asimov'],
        ['id' => 3, 'name' => 'Agatha Christie'],
        ['id' => 4, 'name' => 'Jane Austen'],
        ['id' => 5, 'name' => 'Stephen King']
    ];

    public function getAuthors(){
        return $this->authors;
    }
}
