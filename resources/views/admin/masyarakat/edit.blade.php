@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('masyarakat.update', $masyarakat->id ) }}">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="nik" value="{{ $masyarakat->nik }}">
                    <label for="nik">Nik Masyarakat<label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{ $masyarakat->name }}">
                    <label for="name">Nama Masyarakat</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" value="{{ $masyarakat->username }}">
                    <label for="username">Username</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                    <label for="password">Password</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" name="tlpn" class="form-control" id="tlpn" placeholder="no tlpn" value="{{ $masyarakat->tlpn }}">
                    <label for="tlpn">No Telepon</label>
                  </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection
