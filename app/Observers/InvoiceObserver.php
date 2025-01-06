<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Services\InvoiceService;

class InvoiceObserver
{
    /**
     * Handle the Invoice "created" event.
     */
    public function created(Invoice $invoice): void
    {
        $invoice->filepath = InvoiceService::buildFilepath($invoice);
        $invoice->save();
        InvoiceService::generatePdf($invoice);
    }

    /**
     * Handle the Invoice "updated" event.
     */
    public function updated(Invoice $invoice): void
    {
        if (! $invoice->filepath) {
            $invoice->filepath = InvoiceService::buildFilepath($invoice);
            $invoice->save();
        }

        if (! $invoice->wasChanged('filepath')) {
            InvoiceService::generatePdf($invoice);
        }
    }

    /**
     * Handle the Invoice "deleted" event.
     */
    public function deleted(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "restored" event.
     */
    public function restored(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "force deleted" event.
     */
    public function forceDeleted(Invoice $invoice): void
    {
        //
    }
}
