<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManajemenAdminEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = \App\Models\User::whereIn('username', ['fani001', 'firg001', 'doni007'])->get();
        foreach ($admin as $user){
            $user->assignRole('admin');
        }

        $penyelenggara = (object)[
            'nama'=>'PUSAT DATA DAN SARANA INFORMATIKA',
            'path' =>'1-2-92',
        ];

        $creator = (object)[
            'id'=> 1193,
            'kota' =>'Jakarta',
            'nama' => 'PUSAT DATA DAN SARANA INFORMATIKA',
            "path" => "1-2-92",
            "nama_creator" => "Doni Marshall Rangga"
        ];

        $events = \App\Models\Event::whereIn('id', ['f995ef69-006f-4e00-b845-4848dbed5081','e015a013-b759-48f1-8253-6a9adea8d59f'])->get();
        foreach ($events as $event) {
            $event->penyelenggara = json_encode($penyelenggara);
            $event->creator = json_encode($creator);
            $event->update();
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
