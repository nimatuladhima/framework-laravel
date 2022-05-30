@extends('buku.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-start">
                            <h5 class="card-title">Update Buku!</h5>
                        </div>
                        <div class="float-end">
                            <a class="btn btn-success" href="{{ route('buku.index') }}"><i class="bi bi-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>error!</strong> terdapat error dalam inputan anda!.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('buku.update',$buku->id) }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
            
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>judul:</strong>
                                <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control" placeholder="judul">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>penulis:</strong>
                                <input type="text" name="penulis" value="{{ $buku->judul }}" class="form-control" placeholder="penulis">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>penerbit:</strong>
                                <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="form-control" placeholder="judul">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>tahun terbit:</strong>
                                <select class="form-control" name="tahun_terbit">
                                    @for ($i = 1980; $i < 2022; $i++)
                                        <option value='{{ $i }}' @if ($buku->tahun_terbit == $i)
                                            {{ 'selected' }}
                                        @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>cover:</strong>
                                <input type="hidden" name="oldCover" value="{{ $buku->cover }}">
                                <input type="file" name="cover" class="form-control" placeholder="image">
                                <strong>cover lama:</strong>
                                <br>
                                <img src="/image/{{ $buku->cover }}" style="width: 100px;">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Submit</button>
                        </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
</div>
@endsection