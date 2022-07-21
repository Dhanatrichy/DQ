@extends('Car.Type.base')
@section('action-content')
<div class="pull-right">
            <a class="btn btn-primary" href="{{ route('carType.index') }}"> Back</a>
        </div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Car Brand</div>
               
                <div class="panel-body">

                    <form action="{{ route('carType.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                         
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="image" class="form-control" placeholder="image">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                    @endsection