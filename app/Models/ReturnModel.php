<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    protected $table = 'returns';
    protected $primaryKey = 'id';
    protected $timestamps = false;

    /**
     * Get the loanDetail that owns the ReturnModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loanDetail(): BelongsTo
    {
        return $this->belongsTo(LoanDetail::class, 'loan_detail_id', 'id');
    }
}