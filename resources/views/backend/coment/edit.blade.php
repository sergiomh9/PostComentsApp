@extends('backend.index') 

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection 

@section('content')
<form id="formDelete" action="{{ url('backend/coment/' . $coment->id) }}" method="post">
    @method('delete')
    @csrf
</form>


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/coment') }}" class="btn btn-secondary">coment</a>
            <a href="#" data-id="{{ $coment->id }}" class="btn btn-danger" id="enlaceBorrar">Borrar coment</a>
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
        <form role="form" action="{{ url('backend/coment/' . $coment->id) }}" method="post" id="editComentForm" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Text</label>
                    <input type="text" maxlength="1000" minlength="2" required class="form-control" id="text" placeholder="Text del coment" name="text" value="{{ old('text', $coment->text) }}">
                </div>
                <div class="form-group">
                    <label for="date">Fecha del coment</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $coment->date) }}">
                </div>
                 <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" maxlength="60" minlength="2" required class="form-control" id="email" placeholder="email del coment" name="email" value="{{ old('email', $coment->email) }}">
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