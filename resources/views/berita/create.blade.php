@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Berita Baru!</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('berita.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> Terdapat Masalah Dalam Inputan Yang Anda Berikan<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('berita.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul</strong>
                <input type="text" name="judul" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penulis</strong>
                <input type="text" name="penulis" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Berita</strong>
                <textarea id="editor" name="isi">
                    <p> Ini Beritanya </p>
                </textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<script src="https://cdn.tiny.cloud/1/6eh22wu2yubzxi5jng7zpgtma9r2zoovjvt6fhfa1c9x6jng/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#editor',
        plugins: 'codesample image',
        height: 400,
        statusbar: false,
        menubar:false,
        images_upload_handler: function (blobInfo, success, failure) {
            success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
        },
        toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | fontsizeselect | codesample | image"
    });
</script>
@endsection
