@extends('Car.Type.base')

@section('action-content')
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Car Brand</div>
                @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                <div class="panel-body">
                     <form action="{{ route('carBrand.update',$query->id) }}" method="POST" enctype="multipart/form-data"> 
                     {{ csrf_field() }}
                     {{ method_field('PUT') }}
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $query->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/Car/Brand/{{ $query->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-danger" href="{{ route('carBrand.index') }}"> Cancel</a>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
     
    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection