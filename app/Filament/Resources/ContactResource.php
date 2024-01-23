<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
//use App\Filament\Resources\ContactResource\RelationManagers;
use App\Filament\Resources\ProfileResource\RelationManagers\ProfilesRelationManager;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('phone_number')
                    ->placeholder('Enter phone number'),
                Forms\Components\TextInput::make('mobile_number')
                    ->placeholder('Enter mobile number'),
                Forms\Components\TextInput::make('email')
                    ->placeholder('Enter email'),
                Forms\Components\TextInput::make('address_1')
                    ->autofocus()
                    ->required()
                    ->placeholder('Enter address 1'),
                Forms\Components\TextInput::make('address_2')
                    ->placeholder('Enter address 2'),
                Forms\Components\Select::make('profile_id')
                    ->relationship('profile', 'profile')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mobile_number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address_1')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address_2')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('profile.first_name'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('profile')
                    ->options([
                        'cat' => 'Cat',
                        'dog' => 'Dog',
                        'rabbit' => 'Rabbit',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            ProfilesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
