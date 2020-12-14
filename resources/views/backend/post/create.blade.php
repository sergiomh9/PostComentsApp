

@extends('backend.index') 

@section('content')


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/post') }}" class="btn btn-secondary">Posts</a>

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


<br>

<div class="col-lg-12">
    
<div class="card">

    <form role="form" action="{{ url('backend/post') }}" method="post" id="createpostForm">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" maxlength="45" minlength="2" required class="form-control" id="title" placeholder="titulo" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="text">text</label>
                <input type="text" maxlength="2000" minlength="1" required class="form-control" id="text" placeholder="texto" name="text" value="{{ old('text') }}">
            </div>
            <div class="form-group">
                <label for="author">author</label>
                <input type="text" maxlength="45" minlength="2" required class="form-control" id="author" placeholder="author" name="author" value="{{ old('author') }}">
            </div>
           
            <div class="form-group">
                <label for="date">dater</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
            </div>
            <br>

            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
</div>
</div>



@endsection