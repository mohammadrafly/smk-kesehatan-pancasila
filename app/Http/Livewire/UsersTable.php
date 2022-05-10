<?php

namespace App\Http\Livewire;

use App\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        //
    }
}