<?php

namespace App\Models;

use App\Observers\InvoiceObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(InvoiceObserver::class)]
class Invoice extends Model
{
    protected $fillable = ['date', 'company_id', 'filepath', 'user_id'];

    public function date(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y'),
            set: fn ($value) => $value,
        );
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
