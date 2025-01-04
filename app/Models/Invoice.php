<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = ['date'];
    protected $dates = ['date'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
