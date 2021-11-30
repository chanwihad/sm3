<?php

namespace App\Http\Livewire\Meeting;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AgendaList extends Component
{
    public function render()
    {
        $user = \Auth::user();
        if ($user->hasRole('admin')) {
            $data = Meeting::orderBy('created_at', 'asc')->get();
            return view('livewire.meeting.agenda-list', ['data' => $data, 'user' => $user]);
        } else if ($user->hasRole('admin divisi')) {
            $data = Meeting::where('creator', $user->id)
                ->orWhere('participant', 'ilike', 'semua')
                ->orWhere('participant', 'ilike', $user->division)
                ->orderBy('created_at', 'asc')
                ->get();
            return view('livewire.meeting.agenda-list', ['data' => $data, 'user' => $user]);
        } else if ($user->hasRole('pegawai')) {
            $data = Meeting::Where('participant', 'ilike', 'semua')
                ->orWhere('participant', 'ilike', $user->division)
                ->orderBy('created_at', 'asc')
                ->get();
            return view('livewire.meeting.agenda-list', ['data' => $data, 'user' => $user]);
        }
        return abort(404, "User tidak ditemukan");
        // return view('livewire.meeting.agenda-meeting');
    }

    public function destroy($id)
    {
        dd($id);
    }
}
