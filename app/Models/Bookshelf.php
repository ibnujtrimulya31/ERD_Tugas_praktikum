<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookshelf extends Model
{
    protected $table = 'bookshelves';
    protected $primaryKey = 'id';
    protected $timestamps = false;
    protected $fillable = [
        'code',
        'name'
    ];

    /**
     * Get the book associated with the Bookshelf
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'bookshelf_id', 'id');
    }
}