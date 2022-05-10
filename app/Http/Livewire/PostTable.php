<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

class PostTable extends LivewireDatatable
{
    public $model = Post::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id'),

            Column::name('gambar')
                ->label('Gambar')
                ->searchable()
                ->filterable(),

            Column::name('judul')
                ->label('Judul')
                ->searchable()
                ->filterable(),

            Column::name('isi')
                ->label('Isi'),

            Column::name('kategori')
                ->label('Isi')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Created at')
                ->searchable()
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Updated at')
        ];
    }
}