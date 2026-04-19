<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'author',
        'year',
        'publisher',
        'city',
        'cover',
        'bookshelf_id',
        'category_id',
    ];

    /**
     * Get all of the bookshelf for the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookshelf(): BelongsTo
    {
        return $this->belongsTo(Bookshelf::class, 'bookshelf_id', 'id');
    }

    /**
     * Get the category that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get all of the loanDetail for the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanDetail(): HasMany
    {
        return $this->hasMany(LoanDetail::class, 'book_id', 'id');
    }
}