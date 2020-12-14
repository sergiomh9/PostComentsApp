 @extends('backend.index') 
 
 @section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection 

@section('content')
<form id="formDelete" action="{{ url('backend/post/' . $post->id) }}" method="post">
    @method('delete')
    @csrf
</form>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
                <a href="{{ url('backend/post') }}" class="btn btn-secondary">Posts</a>
                <a href="{{ url('backend/post/create') }}" class="btn btn-success">Crear post</a>
                <a href="#" data-id="{{ $post->id }}" class="btn btn-danger" id="enlaceBorrar">Borrar Post</a>
            </div>

        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>title</td>
            <td>{{$post->title}}</td>
        </tr>
        <tr>
            <td>text</td>
            <td>{{$post->text}}</td>
        </tr>
        <tr>
            <td>author</td>
            <td>{{$post->author}}</td>
        </tr>
        <tr>
            <td>date</td>
            <td>{{$post->date}}</td>
        </tr>
        <tr>
            <td>Logo</td>
            <td><img style="width:200px" src="{{ url('logo/' . $logo)}}"></img></td>
        </tr>
        
    </tbody>
</table>
@endsection
