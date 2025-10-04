<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('namalengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempatlahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggallahir')
                    ->required()
                    ->displayFormat('d M Y')
                    ->native(false),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pendidikansebelum')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaortu')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_hp')
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('jeniskelamin')
                    ->required()
                    ->maxLength(255),

                // Upload files
                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->image()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('kk')
                    ->required()
                    ->image()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('akta')
                    ->required()
                    ->image()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('ijazah')
                    ->required()
                    ->image()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('fotoktp')
                    ->required()
                    ->image()
                    ->columnSpanFull(),

                // Tambahan: status_verifikasi, nis, catatan
                Forms\Components\Select::make('status_verifikasi')
                    ->label('Status Verifikasi')
                    ->options([
                        'pending' => 'Pending',
                        'valid' => 'Valid',
                        'invalid' => 'Tidak Valid',
                    ])
                    ->default('pending')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (Closure $set, $state, callable $get) {
                        if ($state === 'valid' && empty($get('nis'))) {
                            $nisBaru = 'NIS' . now()->format('Ymd') . mt_rand(1000, 9999);
                            $set('nis', $nisBaru);
                        }
                    }),

                Forms\Components\TextInput::make('nis')
                    ->label('NIS')
                    ->disabled(),

                Forms\Components\Textarea::make('catatan')
                    ->label('Catatan Admin')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('namalengkap')->label('Nama Lengkap')->searchable(),
                Tables\Columns\TextColumn::make('tempatlahir')->label('Tempat Lahir')->searchable(),
                Tables\Columns\TextColumn::make('tanggallahir')->label('Tanggal Lahir')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->label('Alamat')->searchable(),
                Tables\Columns\TextColumn::make('pendidikansebelum')->label('Pendidikan Sebelumnya')->searchable(),
                Tables\Columns\TextColumn::make('namaortu')->label('Nama Orang Tua/Wali')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('nomor_hp')->label('No HP')->searchable(),
                Tables\Columns\TextColumn::make('jeniskelamin')->label('Jenis Kelamin')->searchable(),

                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\ImageColumn::make('kk'),
                Tables\Columns\ImageColumn::make('akta'),
                Tables\Columns\ImageColumn::make('ijazah'),
                Tables\Columns\ImageColumn::make('fotoktp'),

                Tables\Columns\BadgeColumn::make('status_verifikasi')
                    ->label('Status Verifikasi')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'valid',
                        'danger' => 'invalid',
                    ])
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('nis')->label('NIS')->sortable()->searchable(),

                Tables\Columns\TextColumn::make('catatan')->label('Catatan Admin')->limit(50),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status_verifikasi')
                    ->options([
                        'pending' => 'Pending',
                        'valid' => 'Valid',
                        'invalid' => 'Tidak Valid',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Action::make('verifikasi')
                    ->label('Verifikasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn ($record) => $record->status_verifikasi === 'pending')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->status_verifikasi = 'valid';
                        if (!$record->nis) {
                            $record->nis = 'NIS' . now()->format('Ymd') . mt_rand(1000, 9999);
                        }
                        $record->save();
                    }),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
