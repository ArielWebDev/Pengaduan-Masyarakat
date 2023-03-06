<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cetak Data Pembayaran</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {

            background-color: #000;
        }

        .padding {

            padding: 2rem !important;
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2;
        }

        h3 {
            font-size: 20px;
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium';
        }

        .text-dark {
            color: #3d405c !important;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block float-right" href="index.html" data-abc="true">Pemas.com</a>
                <div class="float-left">
                    <h3 class="mb-0">Laporan Masyarakat</h3>
                    Date: {{$from}}/{{$to}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Masyarakat</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Isi Laporan</th>
                                    <th scope="col">Nama Petugas</th>
                                    <th scope="col">Isi Tanggapan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduan as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->name_masyarakat }}</td>
                                        <td>{{ $p->tgl_pengaduan }}</td>
                                        <td>{{ $p->isi_pengaduan }}</td>
                                        <td>{{ $p->name_petugas }}</td>
                                        <td>{{ $p->updated_at }}</td>
                                        <td>{{ $p->tanggapan }}</td>
                                        <td>
                                            @if ($p->status == '0')
                                                <p>Pending</p>
                                            @elseif($p->status == 'proses')
                                                <p>{{ ucwords($p->status) }}</p>
                                            @else
                                                <p>{{ ucwords($p->status) }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Subtotal</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>

            <div class="card-footer bg-white">
                <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</body>

</html>
