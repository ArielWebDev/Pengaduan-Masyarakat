@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('From Pengaduan') }}</div>

                <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{-- <input type = "date" name = "date">  --}}
                        <label for="isi_pengaduan">Laporan :</label>
                        <textarea class="form-control" rows="5" id="isi_pengaduan" name="isi_pengaduan"></textarea>
    
                        <div class="mb-3 mt-3">
                            <input class="form-control" name="foto" type="file" id="foto">
                          </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
</div>
@endsection
