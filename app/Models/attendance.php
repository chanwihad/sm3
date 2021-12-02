<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;

    public static function getAttendanceByMeeting($id)
    {
        return Attendance::where('meeting_id', $id)->orderBy('created_at', 'asc')->get();
    }

    public static function attendanceSave($data)
    {
        return Attendance::insert($data);
    }

    public function tampilJam(): string
    {
        if (empty($this->created_at)) {
            return '-';
        }
        return $this->created_at->format('g:i A');
    }

    public function tampilTanggal(): string
    {
        if (empty($this->created_at)) {
            return '-';
        }
        return $this->created_at->format('D, d M Y');;
    }

    public function tampilAbsen(): string
    {
        if (empty($this->status || $this->status == 0)) {
            return 'Alpha';
        }
        if ($this->status == 1) {
            return 'Hadir';
        }
        if ($this->status == 2) {
            return 'Sakit';
        }
        if ($this->status == 3) {
            return 'Izin';
        }

    }
}
