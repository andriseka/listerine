@extends('layouts.general')

@section('title-content', 'QRCODE GENERATE')

@section('content')

<div class="col-md-6 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2>Generate QRCODE</h2>
            <p>
                Form berikut adalah form untuk melakukan generate QR berdasarkan nama QR.
                Agar dapat dilakukan analisis jumlah scan berdasarkan QR yang dicetak.
            </p>

            <form action="{{route('qrcode.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama QRCODE</label>
                    <input type="text" name="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success">Generate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama QR</th>
                        <th>Code</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @for ($i=0; $i < count($qr); $i++)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$qr[$i]['name']}}</td>
                                <td>{{$qr[$i]['slug']}}</td>
                                <td>
                                    <div class="btn-list">
                                        <button class="btn btn-facebook btn-sm btn-icon" aria-label="Facebook">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                            </svg>
                                        </button>
                                        <a href="{{asset('uploads/qrgenerate/'.$qr[$i]['qrcode'])}}" download="" class="btn btn-success btn-sm btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                <path d="M7 11l5 5l5 -5"></path>
                                                <path d="M12 4l0 12"></path>
                                            </svg>
                                        </a>
                                        <form action="{{route('qrcode.destroy', $qr[$i]['slug'])}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm btn-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7l16 0"></path>
                                                    <path d="M10 11l0 6"></path>
                                                    <path d="M14 11l0 6"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
