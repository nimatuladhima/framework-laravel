@extends('buku.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-start">
                            <h5 class="card-title">Tambahkan Buku!</h5>
                        </div>
                        <div class="float-end">
                            <a class="btn btn-success" href="{{ route('buku.index') }}"><i class="bi bi-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> terjadi masalah pada inputan yang anda berikan.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mb-3">
                                <strong>judul:</strong>
                                <input type="text" name="judul" class="form-control" placeholder="judul">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mb-3">
                                <strong>penulis:</strong>
                                <input type="text" name="penulis" class="form-control" placeholder="penulis">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mb-3">
                                <strong>penerbit:</strong>
                                <input type="text" name="penerbit" class="form-control" placeholder="penerbit">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mb-3">
                                <strong>tahun terbit:</strong>
                                <select class="form-control" name="tahun_terbit">
                                    @for ($i = 1980; $i < 2023; $i++)
                                        <option value='{{ $i }}'>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mb-3">
                                <strong>Image:</strong>
                                <input type="file" name="cover" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Submit</button>
                            <button type="reset" class="btn btn-danger"><i class="bi bi-x-circle"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection