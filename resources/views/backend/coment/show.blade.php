@extends('backend.index')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')

<form id="formDelete" action="{{ url('backend/coment/' . $coment->id) }}" method="post">
    @method('delete')
    @csrf
</form>



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/coment') }}" class="btn btn-primary">Coments</a>
                <a href="#" data-table="coment" data-id="{{ $coment->id }}"  class="btn btn-danger" id="enlaceBorrar">Delete Coment</a>
            </div>

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

    @csrf
   
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Id</td>
            <td>{{ $coment->id }}</td>
        </tr>
        <tr>
            <td>Post</td>
            <td>{{ $coment->post->title }}</td>
        </tr>
        <tr>
            <td>text</td>
            <td>{{ $coment->text }}</td>
        </tr>
        <tr>
            <td>date</td>
            <td>{{ $coment->date }}</td>
        </tr>
        <tr>
            <td>email</td>
            <td>{{ $coment->email }}</td>
        </tr>
    </tbody>
</table>
@endsection