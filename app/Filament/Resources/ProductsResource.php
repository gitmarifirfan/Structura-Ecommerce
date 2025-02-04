<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\categories;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label('Product Image')
                    ->columnSpan(2)
                    ->required(),
                TextInput::make('product_name')
                    ->columnSpan(2)
                    ->label('Product Name')
                    ->required(),
                TextInput::make('description')
                    ->columnSpan(2)
                    ->label('Product Description')
                    ->required(),
                TextInput::make('price')
                    ->columnSpan(2)
                    ->numeric()
                    ->label('Product Price')
                    ->required(),
                TextInput::make('qty')
                    ->numeric()
                    ->label('Product quantity')
                    ->required(),
                Select::make('category_id')
                    ->label('Category')
                    ->options(categories::all()->pluck('category_name', 'id'))
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Product ID'),
                ImageColumn::make('image'),
                TextColumn::make('product_name'),
                TextColumn::make('description'),
                TextColumn::make('price'),
                SelectColumn::make('category_id')
                    ->label('Category')
                    ->options(categories::all()->pluck('category_name', 'id'))
                    ->columnSpan(2),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
