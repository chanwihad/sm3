@extends('layouts.template')

@section('title', 'Dashboard | Admin')

@section('agenda-rapat')

<div class="margin-judul">
    <h1>Agenda Rapat</h1>
    <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
        <li><a href="#">Dashboard</a></li>
        <li class="active">Agenda Rapat</li>
    </ol>
</div>

<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <div class="db-flex">
                    <h3 style="margin: 0px;"> Daftar Agenda Rapat</h3>
                    <div class="icon-card2">
                        <i class="fa fa-angle-double-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <div class="table-responsive">
                    <table class="table table-hover" id="agenda-meeting">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Agenda Rapat</th>
                                <th scope="col">Jadwal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Presensi</th>
                                <th scope="col">Ket</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $datas)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <b>Judul Rapat</b><br>
                                    {{$datas->title}}<br>
                                    <br>
                                    <b>Penyelenggara</b><br>
                                    {{$datas->creator}}<br>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-secondary fa fa-calendar"></a>
                                        </div>
                                        <div class="col-md-11">
                                            <p style="margin-left: 10px;">{{$datas->tampilTanggal()}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-secondary fa fa-clock-o"></a>
                                        </div>
                                        <div class="col-md-11">
                                            <p style="margin-left: 10px;">{{$datas->time}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-secondary fa fa-info-circle"></a>
                                        </div>
                                        <div class="col-md-11">
                                            <p style="margin-left: 10px;">{{$datas->place}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-info">
                                        @if($datas->isBelumDibuka())
                                        belum dimulai
                                        @elseif($datas->isBerlangsung())
                                        berlangsung
                                        @elseif($datas->isSelesai())
                                        selesai
                                        @elseif($datas->isTutup())
                                        tutup
                                        @endif
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="">Hadir</a>
                                    <a class="btn btn-danger" href="">Sakit</a>
                                    <a class="btn btn-warning" href="">Ijin</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary fa fa-info-circle" href="{{route('agendaDetail', $datas->id)}}"></a>
                                    <!-- <a class="btn btn-primary fa fa-info-circle" wire:click="destroy('12')"></a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#daftar-meeting').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

@endsection