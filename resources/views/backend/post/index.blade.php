@extends('backend.index') 

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection 

@section('content') 


@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif


<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="box-title">Noticias </h4>
        </div>
        <div class="card-body--">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">text</th>
                            <th scope="col">author</th>
                            <th scope="col">date</th>
                            
                            <th scope="col">Image</th>
                            <th scope="col">Add Coment</th>
                             <th scope="col">View Coment</th>
                            <th scope="col">show</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td scope="row">{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->text }}
                                <td>{{ $post->author }}</td>
                                <td>{{ date('d-m-Y', strtotime($post->date)) }}</td>
                                
                                
                                  <td><img  alt="no image" src="{{ url('logo/' . $post->id . '.jpg' )}}"></img></td>
                                 <td><a class="btn btn-outline-warning" href="{{ url('backend/coment/create/' . $post->id) }}">add coment</a></td>
                                  <td><a class="btn btn-outline-primary" href="{{ url('backend/coment/' . $post->id . '/coment') }}">view</a></td>
                                  
                                <td><a class="btn btn-info" href="{{ url('backend/post/' . $post->id) }}">show</a></td>
                                <td><a class="btn btn-warning" href="{{ url('backend/post/' . $post->id . '/edit') }}">edit</a></td>
                                <td><a href="#" data-id="{{$post->id}}" class="enlaceBorrar btn btn-danger">delete</a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
            <!-- /.table-stats -->
        </div>
    </div>
    <!-- /.card -->
</div>

<form id="formDelete" action="{{ url('backend/post') }}" method="post">
    @method('delete') 
    @csrf
</form>
@endsection