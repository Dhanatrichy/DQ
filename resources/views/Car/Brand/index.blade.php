@extends('Car.Brand.base')

@section('action-content')
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of Car Brands</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('carBrand.create') }}">Add Car Brand</a>
        </div>
      </div>
    </div>
    <hr>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <?php
            //Columns must be a factor of 12 (1,2,3,4,6,12)
            $numOfCols = 4;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;
            ?>
            <div class="row">
              <?php
              foreach ($queries as $row) {
              ?> <a href="{{ route('carType.edit', ['id' => $row->id]) }}">
                  <div class="col-md-<?php echo $bootstrapColWidth; ?> image-tarq">
                    <div class="thumbnail">
                      <img src="/image/Car/Brand/{{ $row->image }}">
                      <h5>{{$row->name}}</h5>
                    </div>
                    <form action="{{ route('carBrand.destroy',$row->id) }}" method="POST">


                      <a class="btn btn-primary btn-sm" href="{{ route('carBrand.edit',$row->id) }}">Edit</a>

                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                  </div>
                </a>
              <?php
                $rowCount++;
                if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
              }
              ?>
            </div>

          </div>
        </div>

      </div>
      <hr>

    </div>
  </div>
</section>

{!! $queries->links() !!}

@endsection