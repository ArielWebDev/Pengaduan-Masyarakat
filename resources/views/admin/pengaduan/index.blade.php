@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Masyarakat</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->masyarakat->name  }}</td>
                                <td>{{ $p->tgl_pengaduan  }}</td>
                                <td>{{ $p->isi_pengaduan }}</td>
                                <td>
                                    @if ($p->status == '0')
                                        <p class="badge bg-danger">Pending</p>
                                    @elseif($p->status == 'proses')
                                        <p class="badge bg-warning text-dark ">{{ ucwords($p->status) }}</p>
                                    @else
                                        <p class="badge bg-success">{{ucwords($p->status) }}</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pengaduanadmin.show', $p->id_pengaduan) }}">Detail</a>
                                    
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
