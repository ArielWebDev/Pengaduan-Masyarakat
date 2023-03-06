@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control" id="username" placeholder="username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="name" placeholder="name">
                        <label for="name">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="tlpn" class="form-control" id="tlpn" placeholder="no tlpn">
                        <label for="tlpn">No Telepon</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-select col-3" aria-label="Default select example" name="level">
                            <option selected>Pilih Role</option>
                            <option value="admin">Administrator</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endsection
