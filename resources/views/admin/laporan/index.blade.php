@extends('layouts.admin')

@section('content')
    <div class="row ">
        <div class="col-lg-6 col-12 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    Cari Berdasarkan Tanggal
                </div>
                <div class="card-body">
                    <form action="">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="from" id="from" class="form-control" placeholder="Tanggal Awal"
                                onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="to" id="to" class="form-control" placeholder="Tanggal Akhir"
                                onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        {{-- <button type="submit" class="btn btn-primary" style="width: 100%">Cari Laporan</button> --}}
                        <a href="" onclick="this.href='/cetak/'+ document.getElementById('from').value +
                        '/' +document.getElementById('to').value" target="_blank" class="btn btn-danger btn-sm" 
                        style="width: 100%">
                            <i class="fas fa-print fa-fw"></i> PRINT
                    </a>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header">
                    Data Berdasarkan Tanggal
                    <div class="float-end">

                    </div>
                </div>
                <div class="card-body">
                    @if ($pengaduan ?? '')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Isi Laporan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduan as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->tgl_pengaduan }}</td>
                                        <td>{{ $p->isi_pengaduan }}</td>
                                        <td>
                                            @if ($p->status == '0')
                                                <p class="badge bg-danger">Pending</p>
                                            @elseif($p->status == 'proses')
                                                <p class="badge bg-warning text-dark ">{{ ucwords($p->status) }}</p>
                                            @else
                                                <p class="badge bg-success">{{ ucwords($p->status) }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">
                            Tidak ada data
                        </div>
                    @endif

                </div>
            </div>
        </div> --}}
    </div>
@endsection
