@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-primary" href="{{route('masyarakat.create')}}" role="button">Tambah Masyarakat</a>
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIK</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">NO HP</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($masyarakat as $m)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->nik }}</td>
                    <td>{{ $m->name }}</td>
                    <td>{{ $m->username }}</td>
                    <td>{{ $m->tlpn }}</td>
                    <td>
                        <a href="{{route('masyarakat.edit',$m->id)}}" class="btn btn-outline-success">Edit</a>
                        <form action="{{ route('masyarakat.destroy', $m->id) }}" 
                            method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                        </form>

                        {{-- <a href="{{route('siswa.edit',$m->id)}}" class="btn btn-sn btn-primary"
                            title="Edit"><i class="far fa-edit"></i></a>
                            <x-adminlte-button class="btn btn-sn btn-danger"  data-toggle="modal" data-target="#hapussiswa{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger"> </x-adminlte-button>
                            <x-adminlte-modal id="hapussiswa{{$loop->iteration}}" title="Hapus Siswa" size="md" theme="danger"
                            icon="fas fa-bell" v-centered static-backdrop scrollable>
                            <div style="height:80px;">
                                <form action="{{route('siswa.delete',$m->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                      Apakah anda yakin akan menghapus siswa ini?</div>
                            <x-slot name="footerSlot">
                                <x-adminlte-button type="submit" class="mr-auto" theme="primary" label="Hapus"/>
                                <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
                                </form>
                            </x-slot>
                            </x-adminlte-modal> --}}
                    </td>
                  </tr>

                    @endforeach

                </tbody>
              </table>
    </div>
</div>
@endsection
