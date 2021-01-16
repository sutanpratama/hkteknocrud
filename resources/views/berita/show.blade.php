@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Berita</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('berita.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-lg-12">
                    <h1> {{ $berita->judul }} </h1>
                    <h3> {{ $berita->penulis }} </h3>
                    <p class="text-muted"> Ditambahkan Pada {{ $berita->created_at }} </p>
                    <hr>
                    <?php
                        echo $berita->isi;
                    ?>
                </div>
            </div>
        </div>
    </div>
@endsection
