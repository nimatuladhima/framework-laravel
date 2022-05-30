@extends('buku.layout')

@section('content')
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2 text-center">
                    <img style="width: 100px;" id="cover" src="">
                </div>
                <table class="table">
                    <tr>
                        <td width="30%">Judul</td>
                        <td width="5%">:</td>
                        <td id="judul"></td>
                    </tr>
                    <tr>
                        <td>Penulis:</td>
                        <td>:</td>
                        <td id="penulis"></td>
                    </tr>
                    <tr>
                        <td>Penerbit:</td>
                        <td>:</td>
                        <td id="penerbit"></td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit:</td>
                        <td>:</td>
                        <td id="tahun"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <form action="/buku" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="cari buku" name="cari" value="{{ request('cari') }}">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('buku.create') }}"><i class="bi bi-plus"></i> Create</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>judul</th>
            <th>cover</th>
            <th>penulis</th>
            <th>penerbit</th>
            <th>tahun terbit</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($buku as $b)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $b->judul }}</td>
            <td><img src="image/{{ $b->cover }}" style="width: 40px;"></td>
            <td>{{ $b->penulis }}</td>
            <td>{{ $b->penerbit }}</td>
            <td>{{ $b->tahun_terbit }}</td>
            <td class="text-center">
                <button class="btn btn-secondary" id="detail" data-bs-toggle="modal" data-bs-target="#detail"
                    data-judul="{{ $b->judul }}"
                    data-penulis="{{ $b->penulis }}"
                    data-penerbit="{{ $b->penerbit }}"
                    data-tahun="{{ $b->tahun_terbit }}"
                    data-cover="{{ $b->cover }}"><i class="bi bi-eye"></i></button>
                <a class="btn btn-primary" href="{{ route('buku.edit',$b->id) }}"><i class=" bi bi-pencil"></i></a>
                <a class="btn btn-danger confirm" href="#" data-id="{{ $b->id }}" data-judul="{{ $b->judul }}"><i class="bi bi-trash2"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="row text-center">
        {!! $buku->links('vendor.pagination.bootstrap-4') !!}
    </div>
@endsection