<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('company.name')
                    ->label('Empresa'),
                TextEntry::make('user.name')
                    ->label('Usuário'),
                TextEntry::make('date')
                    ->date('d/m/Y')
                    ->label('Data'),
                Section::make('Visualizar Boleto')
                    ->schema([
                        ViewEntry::make('pdf')
                            ->label('PDF')
                            ->view('invoices.pdf.show'),
                    ]),
            ]);
    }
}
