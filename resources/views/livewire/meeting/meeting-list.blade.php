<div>
    <div class="sm3-container">
        <div class="row">
            <div class="col-md-12">
                <div class="sm3-card">
                    <table class="table table-hover" id="daftar-meeting">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Agenda Rapat</th>
                                <th scope="col">Jadwal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Ket</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $datas)
                            <tr>
                                <a href="{{route('meetingCreate')}}">
                                    <th scope="row">1</th>
                                    <td>
                                        <b>Judul Rapat</b><br>
                                        {{$datas->title}}<br>
                                        <br>
                                        <b>Penyelenggara</b><br>
                                        {{$datas->creator}}<br>

                                    </td>
                                </a>
                                <td>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-secondary fa fa-calendar" href=""'></a>
                                        </div>
                                        <div class="col-md-11">
                                            <p style="margin-left: 10px;">{{$datas->tampilTanggal()}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-secondary fa fa-clock-o" href=""'></a>
                                        </div>
                                        <div class="col-md-11">
                                            <p style="margin-left: 10px;">{{$datas->time}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-secondary fa fa-info-circle" href=""'></a>
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
                                    <a class="btn btn-warning fa fa-edit" href="{{route('meetingUpdate', $datas->id)}}" data-toggle="tooltip" data-placement="bottom" title="Ubah"></a>
                                    <!-- <a href="{{route('meetingDelete',['id' => $datas->id])}}" class="btn btn-danger fa fa-trash" data-toggle="tooltip" title=' Delete' data-placement="bottom"></a> -->
                                    <a href="{{route('meetingDelete',['id' => $datas->id])}}" wire:click="destroy({{ $datas->id }})" class="btn btn-danger fa fa-trash" data-toggle="tooltip" title=' Delete' data-placement="bottom"></a>
                                </td>
                                <td>
                                    <a class="btn btn-primary fa fa-info-circle" href="{{route('meetingDetail', $datas->id)}}"></a>
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
    // $(document).ready(function() {
    //     $('#daftar-meeting').DataTable();
    // } );
    $(document).ready(function() {
        $('#daftar-meeting').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>