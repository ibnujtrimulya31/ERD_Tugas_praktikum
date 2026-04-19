<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne};

class LoanDetail extends Model
{
    protected $table = 'loan_details';
    protected $primaryKey = 'id';
    protected $timestamps = true;
    protected $fillable = [
        'loan_id',
        'book_id',
        'is_return'
    ];

    /**
     * Get the loan that owns the LoanDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }

    /**
     * Get the book that owns the LoanDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function return(): HasOne
    {
        return $this->hasOne(ReturnModel::class, 'loan_detail_id');
    }
}