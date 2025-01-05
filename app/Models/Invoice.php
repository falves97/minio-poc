<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = ['date', 'company_id'];

    public function date(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y'),
            set: fn ($value) => $value->format('Y-m-d'),
        );
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
