@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-primary" href="{{route('user.create')}}" role="button">Tambah User</a>
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">NO HP</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->username }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->tlpn }}</td>
                    <td>
                      @if ($u->level == 'admin')
                      <p class="badge bg-info text-dark">Administrator</p>
                      @else
                      <p class="badge bg-warning text-dark">{{ ucwords($u->level) }}</p>
                      @endif
                    </td>
                    <td>
                        <a href="{{route('user.edit',$u->id)}}" class="btn btn-outline-success">Edit</a>
                        <form action="{{ route('user.destroy', $u->id) }}" 
                            method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                  </tr>

                    @endforeach

                </tbody>
              </table>
    </div>
</div>
@endsection
