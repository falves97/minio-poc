<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InvoiceController extends Controller
{
    public function pdf(Invoice $invoice): StreamedResponse
    {
        return Storage::response($invoice->filepath);
    }
}
