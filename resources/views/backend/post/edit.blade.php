@extends('backend.index') 

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection 

@section('content')
<form id="formDelete" action="{{ url('backend/post/' . $post->id) }}" method="post">
    @method('delete')
    @csrf
</form>


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/post') }}" class="btn btn-secondary">Post</a>
            <a href="#" data-id="{{ $post->id }}" class="btn btn-danger" id="enlaceBorrar">Borrar Post</a>
        </div>

    </div>
</div>

@if(session()->has('error'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
            <h2>Error ...</h2>
        </div>
    </div>
</div>
@endif



<div class="col-lg-12">
    <div class="card">
        <form role="form" action="{{ url('backend/post/' . $post->id) }}" method="post" id="editPostForm" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" maxlength="60" minlength="2" required class="form-control" id="title" placeholder="title del Post" name="title" value="{{ old('title', $post->title) }}">
                </div>
                <div class="form-group">
                    <label for="text">Text</label>
                    <input type="text" maxlength="2000" minlength="2" required class="form-control" id="text" placeholder="text de la Moneda" name="text" value="{{ old('text', $post->text) }}">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" maxlength="30" minlength="2" required class="form-control" id="author" placeholder="Pais de la Moneda" name="author" value="{{ old('author', $post->author) }}">
                </div>
                <div class="form-group">
                    <label for="date">Fecha del post</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $post->date) }}">
                </div>
                  
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>
                <br>
                <button type="submit" class="btn btn-info">Submit</button>
                <!--<div class="form-group">-->
                <!--    <label for="logo">Logo</label>-->
                <!--    <input type="file" class="form-control" id="logo"  name="logo">-->
                <!--</div>-->
            </div>

            <!-- /.card-body -->

        </form>

    </div>
</div>
@endsection