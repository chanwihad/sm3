@extends('layouts.template')

@section('title', 'Dashboard | Admin')

@section('manajemen-detail')

<div class="margin-judul">
    <h1>Detail Agenda Rapat</h1>
    <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">@if($info == 'Meeting') Manajemen @elseif($info == 'Agenda') Agenda @endif Rapat</a></li>
        <li class="active">Detail</li>
    </ol>
</div>

<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">

                <div class="db-flex">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Detail Agenda Rapat <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notulensi Rapat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Daftar Hadir Peserta Rapat</a>
                            </li>
                        </ul>
                    </div>
                    <div class="icon-card2">
                        <i class="fa fa-angle-double-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =================DETAIL RAPAT================== -->
<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <h1>Detail Agenda Rapat</h1> <br>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Agenda Rapat</th>
                                <th scope="col">Jadwal</th>
                                <th scope="col">Status</th>
                                @if($info == 'Agenda')
                                <th scope="col">Presensi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <b>Judul Rapat</b><br>
                                    {{$detail->tittle}}<br>
                                    <br>
                                    <b>Penyelenggara</b><br>
                                    {{$detail->creator}}<br>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-secondary fa fa-calendar" href=""></a>
                                        </div>
                                        <div class="col-md-11">
                                            <p style="margin-left: 10px;">{{$detail->date}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-secondary fa fa-clock-o" href=""></a>
                                        </div>
                                        <div class="col-md-11">
                                            <p style="margin-left: 10px;">{{$detail->time}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-secondary fa fa-info-circle" href=""></a>
                                        </div>
                                    </div>
                                    <div class="col-md-11">
                                        <p style="margin-left: 10px;">{{$detail->place}}</p>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-info">
                                        @if($detail->isBelumDibuka())
                                        belum dimulai
                                        @elseif($detail->isBerlangsung())
                                        berlangsung
                                        @elseif($detail->isSelesai())
                                        selesai
                                        @elseif($detail->isTutup())
                                        tutup
                                        @endif
                                    </a>
                                </td>
                                @if($info == 'Agenda')
                                <td>
                                    <a class="btn btn-primary">Hadir</a>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card card-desc">
                    <h5>Deskripsi : </h5>
                    <p style="margin: 0px;">{{$detail->description}}</p>
                </div> <br>

                <!-- Button share muncul jika aktor adalah admin divisi / administrator -->

                <div class="db-flex btn-kanan" style="column-gap: 0px;">
                    <span class="input-group-addon span-share"><i class="fa fa-clock-o"></i></span>
                    <a class="btn btn-primary btn-share" href="">WhatsApp</a>
                </div>
                <div class="db-flex btn-kanan" style="column-gap: 0px;">
                    <span class="input-group-addon span-share"><i class="fa fa-clock-o"></i></span>
                    <a class="btn btn-primary btn-share" href="">E-Mail</a>
                </div>
                <p class="btn-kanan" style="padding: 10px;">Bagikan Via</p><br> <br>
            </div>
        </div>
    </div>
</div>

<!-- =================NOTULENSI RAPAT================== -->
<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <div class="db-flex">
                    <h1>Notulensi Agenda Rapat</h1> <br>
                    <div style="margin-left:auto;">
                        <div class="db-flex">
                            <div class="db-flex" style="column-gap: 0px;">
                                <span class="input-group-addon span-share"><i class="fa fa-clock-o"></i></span>
                                <a class="btn btn-warning btn-share" href="">Export to PDF</a>
                            </div>
                            @if($info == 'Meeting')
                            <div class="db-flex" style="column-gap: 0px;">
                                <span class="input-group-addon span-share"><i class="fa fa-clock-o"></i></span>
                                <a href="" class="btn btn-primary btn-share" role="button" aria-disabled="true">Tambah Notulensi</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div> <br>
                <div class="card card-desc">
                    <h5>Notulensi : </h5>
                    <p style="margin: 0px;"> @isset($notulensi) {{ $notulensi->notes }} @endisset </p>
                </div><br>

                <div class="card card-desc">
                    <h5>Dokumentasi Foto : </h5>
                    <img class="card-img-top" @isset($notulensi) src="{{ $notulensi->notes }}" @endisset>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- =================DAFTAR HADIR RAPAT================== -->
<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <div class="db-flex">
                    <h1>Daftar Hadir Peserta Rapat</h1> <br>

                    <div class="db-flex flex-kanan" style="column-gap: 0px;">
                        <span class="input-group-addon span-share"><i class="fa fa-clock-o"></i></span>
                        <a class="btn btn-warning btn-share" href="">Export to PDF</a>
                    </div>
                </div> <br>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam Presensi</th>
                                <th scope="col">Status</th>
                                @if($info == 'Meeting')
                                <th scope="col">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $pesertas)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $pesertas->name }}</td>
                                <td>{{ $pesertas->division }}</td>
                                <td>{{ $pesertas->position }}</td>
                                <td>{{ $pesertas->tampilTanggal() }}</td>
                                <td>{{ $pesertas->tampilJam() }}</td>
                                <td>
                                    <a class="btn btn-primary">{{ $pesertas->tampilAbsen() }}</a>
                                </td>
                                @if($info == 'Meeting')
                                <td>
                                    <a class="btn btn-warning fa fa-edit" href="" data-toggle="tooltip" data-placement="bottom" title="Ubah"></a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection