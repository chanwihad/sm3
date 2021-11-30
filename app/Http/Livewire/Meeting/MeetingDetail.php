<?php

namespace App\Http\Livewire\Meeting;

use Livewire\Component;

class MeetingDetail extends Component
{
    public $temp;
    // public function mount($id)
    // {
    //     $this->temp = $id;
    //     dd($id);
        
    // }
//   <livewire:meeting.meeting-detail :post="$post"/> 
// @livewire('meeting.meeting-detail', ['temp' => $post]) 

    public function render()
    {
        dd($this->temp);
        $user = \Auth::user();
        if ($user->hasRole('admin')) {
            $data = Meeting::orderBy('created_at', 'asc')->get();
            return view('livewire.meeting.meeting-list', ['data' => $data, 'user' => $user]);
        } else if ($user->hasRole('admin divisi')) {
            $data = Meeting::where('creator', $user->id)
                ->orWhere('participant', 'ilike', '%semua%')
                ->orWhere('participant', 'ilike', '%' . $user->division . '%')
                ->orderBy('created_at', 'asc')
                ->get();
            return view('livewire.meeting.meeting-list', ['data' => $data, 'user' => $user]);
        }
        return view('livewire.meeting.meeting-detail');
    }
}
