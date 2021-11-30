<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class DaftarUser extends Component
{
    public function render()
    {
        $user = \Auth::user();
        if ($user->hasRole('admin')) {
            $data = User::leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.id', 'users.name', 'roles.name AS rolename', 'email', 'division', 'position')
            ->orderBy('users.id', 'asc')
            ->get();
            return view('livewire.user.user-list', ['data' => $data, 'user' => $user]);
        }
        return abort(403, "Anda tidak memiliki hak akses");
    }
}
