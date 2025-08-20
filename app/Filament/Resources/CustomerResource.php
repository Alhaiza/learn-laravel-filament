<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    // Mengganti Icon
    protected static ?string $navigationIcon = 'heroicon-o-user';

    // Ubah nama Link
    protected static ?string $navigationLabel = 'Kelola Customer';

    protected static ?string $navigationGroup = 'Kelola';

    // Ubah nama slug
    protected static ?string $slug = 'kelola-customer';

    public static ?string $label = 'Kelola Customer';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nama')
                    ->placeholder('Masukan Nama Customer'),
                TextInput::make('code')
                    ->label('Kode')
                    ->placeholder('Masukan Kode Customer'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    // agar field bisa dicari
                    ->searchable()
                    // Agar bisa disort
                    ->sortable()
                    // Manipulasi Nama Field
                    ->label('Nama'),
                TextColumn::make('code')
                    // agar field bisa dicopy
                    ->copyable()
                    // Customer Pesan Berhasil Copy
                    ->copyMessage('Berhasil Menyalin Kode Customer')
                    ->label('Kode'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
