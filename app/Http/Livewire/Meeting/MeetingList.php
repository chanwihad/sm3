<?php

namespace App\Http\Livewire\Meeting;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingList extends Component
{
    // public $Id;

    public function render()
    {
        $user = \Auth::user();
        if ($user->hasRole('admin')) {
            $data = Meeting::orderBy('created_at', 'asc')->get();
            return view('livewire.meeting.meeting-list', ['data' => $data, 'user' => $user]);
        } else if ($user->hasRole('admin divisi')) {
            $data = Meeting::where('creator', $user->id)
                ->orWhere('participant', 'ilike', '%semua%')
                ->orWhere('participant', 'ilike', '%'.$user->division.'%')
                ->orderBy('created_at', 'asc')
                ->get();
            return view('livewire.meeting.meeting-list', ['data' => $data, 'user' => $user]);
        } else if ($user->hasRole('pegawai')) {
            $data = Meeting::Where('participant', 'ilike', 'semua')
                ->orWhere('participant', 'ilike', $user->division)
                ->orderBy('created_at', 'asc')
                ->get();
            return view('livewire.meeting.meeting-list', ['data' => $data, 'user' => $user]);
        }
        return abort(404, "User tidak ditemukan");
        // return view('livewire.meeting.daftar-meeting');
    }
    
    public function meetingDelete($Id)
    {
        // dd($Id);
        $user = \Auth::user();
        if ($user->hasRole('pegawai')) {
            return redirect(route('meetingList'))->with('error', 'Anda tidak memiliki akses');
            // return abort(403, "User tidak memiliki hak akses");
        }
        $data = Meeting::where('id', $Id)->first();
        if ($data) {
            Meeting::where('id', $Id)->delete();
            return redirect(route('meetingList'))->with('success', 'Berhasil menghapus data meeting');
        }

        return redirect(route('meetingList'))->with('error', 'Gagal menghapus data meeting');
    }

    public $meetingId;

    public function getPostProperty()
    {
        return Meeting::find($this->meetingId);
    }

    public function deletePost()
    {
        $this->Meeting->delete();
    }
}
