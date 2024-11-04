<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizResource\Pages;
use App\Models\Quiz;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class QuizResource extends Resource
{
    protected static ?string $model = Quiz::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->columnSpanFull()->required(),
                Textarea::make('description')->columnSpanFull(),

                // Menambahkan pertanyaan dengan repeater
                Repeater::make('questions')
                    ->relationship('questions')
                    ->schema([
                        Textarea::make('question_text')->required(),

                        // Menambahkan jawaban dalam setiap pertanyaan
                        Repeater::make('answers')
                            ->relationship('answers')
                            ->schema([
                                Textarea::make('answer_text')->required(),
                                Toggle::make('is_correct')->label('Correct Answer'),
                            ])
                            ->minItems(2) // Setidaknya dua jawaban per pertanyaan
                            ->required(),
                    ])
                    ->minItems(1)
                    ->columnSpanFull() // Setidaknya satu pertanyaan per kuis
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Nama Kuis')->sortable()->searchable(),
                TextColumn::make('description')->label('Keterangan')->limit(50),
                TextColumn::make('questions_count')
                    ->label('Total Pertanyaan')
                    ->counts('questions'), // Menampilkan jumlah pertanyaan
                TextColumn::make('created_at')->label('Dibuat')->view('datetime'),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuiz::route('/create'),
            'edit' => Pages\EditQuiz::route('/{record}/edit'),
        ];
    }

    protected function getTableQuery()
    {
        return parent::getTableQuery()->withCount('questions');
    }

    // Mengubah label singular dan plural untuk sidebar
    public static function getNavigationLabel(): string
    {
        return 'Kuis'; // Ganti dengan label yang Anda inginkan
    }
}
