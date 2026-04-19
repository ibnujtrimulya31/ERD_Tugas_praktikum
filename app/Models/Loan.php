<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};

class Loan extends Model
{
    protected $table = 'loans';
    protected $primaryKey = 'id';
    protected $timestamps = true;
    protected $fillable = [
        'user_npm',
        'loan_at',
        'return_at',
    ];

    /**
     * Get the user that owns the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_npm', 'npm');
    }

    /**
     * Get all of the loanDetail for the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanDetail(): HasMany
    {
        return $this->hasMany(LoanDetail::class, 'loan_id', 'id');
    }
}