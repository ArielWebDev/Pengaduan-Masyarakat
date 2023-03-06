@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('user.update', $user->id ) }}">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" value="{{$user->username}}">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$user->name}}">
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tlpn" class="form-control" id="tlpn" placeholder="no tlpn" value="{{$user->tlpn}}">
                    <label for="tlpn">No Telepon</label>
                </div>
                <div class="mb-3">
                    <select class="form-select col-3" aria-label="Default select example" name="level">
                        <option value="admin">Administrator</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection
