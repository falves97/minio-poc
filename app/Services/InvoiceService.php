<?php

namespace App\Services;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class InvoiceService
{
    public static function generatePdf(Invoice $invoice): void
    {
        $pdf = PDF::loadView('invoices.pdf.template', compact('invoice'));
        /**
         * Confirmar se a comunicação com o storage está funcionando,
         * pois o filesystem.php desabilita exceções por padrão
         */
        Storage::put($invoice->filepath, $pdf->output());
    }

    public static function buildFilepath(Invoice $invoice): string
    {
        return 'invoices/'.$invoice->id.'.pdf';
    }
}
