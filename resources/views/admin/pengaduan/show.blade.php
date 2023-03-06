@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <h5><b>Pengaduan Masyarakat</b></h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nama Masyarakat</th>
                                        <td>:</td>
                                        <td>{{ $pengaduan->masyarakat->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pengaduan</th>
                                        <td>:</td>
                                        <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Isi Pengaduan</th>
                                        <td>:</td>
                                        <td>{{ $pengaduan->isi_pengaduan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Foto Pengaduan</th>
                                        <td>:</td>
                                        <td><img src=" {{ asset('foto-pengaduan/' . $pengaduan->foto) }}" width="100">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status Pengaduan</th>
                                        <td>:</td>
                                        <td>
                                            @if ($pengaduan->status == '0')
                                                <p class="badge bg-danger">Pending</p>
                                            @elseif($pengaduan->status == 'proses')
                                                <p class="badge bg-warning">{{ ucwords($pengaduan->status) }}</p>
                                            @else
                                                <p class="badge bg-success">{{ $pengaduan->status }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <h5><b>Tanggapan Petugas</b></h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_pengaduan" value="{{$pengaduan->id_pengaduan}}">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="input-group">
                                        <select class="form-select" aria-label="Default select example" name="status">
                                            @if ($pengaduan->status == '0')
                                            <option value="0">Panding</option>
                                            <option value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                            @elseif($pengaduan->status == 'proses')
                                            <option value="0">Panding</option>
                                            <option value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                            @else
                                            <option value="0">Panding</option>
                                            <option value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="isi_pengaduan">Tanggapan :</label>
                                    <textarea class="form-control" rows="4" id="tanggapan" name="tanggapan" placeholder="Belum Ada Tanggapan">{{ $tanggapan->tanggapan ?? ''}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                        </form>
                        @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
