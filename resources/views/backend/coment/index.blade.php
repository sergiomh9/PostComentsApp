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
            <h4 class="box-title">Coments</h4>
        </div>
        <div class="card-body--">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Post</th>
                            <th scope="col">text</th>
                            <th scope="col">date</th>
                             <th scope="col">email</th>
                    
                            <th scope="col">show</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coments as $coment)
                        <tr>
                            <td scope="row">{{ $coment->id }}</td>
                            <td>{{ $coment->post->title }}</td>
                            <td>{{ $coment->text }}
                                <td>{{ date('d-m-Y', strtotime($coment->date)) }}</td>
                                 <td>{{ $coment->email }}</td>

                                <td><a class="btn btn-info" href="{{ url('backend/coment/' . $coment->id) }}">show</a></td>
                                <td><a class="btn btn-warning" href="{{ url('backend/coment/' . $coment->id . '/edit') }}">edit</a></td>
                                <td><a href="#" data-id="{{$coment->id}}" class="enlaceBorrar btn btn-danger">delete</a></td>

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

<form id="formDelete" action="{{ url('backend/coment') }}" method="post">
    @method('delete') 
    @csrf
</form>
@endsection