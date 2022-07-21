@extends('Car.Brand.base')
@section('action-content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
  .float-container {
    border: 3px solid #fff;
    padding: 20px;
  }

  .float-child.green {
    margin-right: 20px;
  }

  .float-child {
    width: 50%;
    float: left;
    padding: 20px;
   
  }
</style>
<hr>
<div class="pull-right">
  <!-- <a class="btn btn-primary" href="{{ route('carBrand.index') }}"> Back</a> -->
</div>
<div class="container">
  <div class="panel panel-info">
    <div class="panel-heading">Add A Car Brand</div>
    <div class="panel-body">
      <div class="float-container">

        <div class="float-child">
         
          <div class="float-child green ">
            <div class="form-group">
              <strong>Name:</strong>
              <input type="text" name="name" class="name" class="form-control" placeholder="Name">
            </div>
          </div>
          

          <div class="float-child blue">
          <div class="col-md-8">
            <strong>Select image to crop:</strong>
            <input type="file" id="image">

            <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Upload Image</button>
          </div>
          </div>
        </div>

        <div class="float-child">
        <div class="col-md-8  text-center">
          <div id="upload-demo"></div>
        </div>
        </div>

      </div>
      <!-- <div class="row">
        <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <strong>Name:</strong>
              <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-4 ">
            <strong>Select image to crop:</strong>
            <input type="file" id="image">

            <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Upload Image</button>
          </div>
        </div>
      </div> -->
      <div class="row ">

       


        <!-- <div class="col-md-4">
        <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
        </div> -->
      </div>

    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
      width: 350,
      height: 350,
      type: 'square' //square
    },
    boundary: {
      width: 400,
      height: 400
    }
  });


  $('#image').on('change', function() {
    var reader = new FileReader();
    reader.onload = function(e) {
      resize.croppie('bind', {
        url: e.target.result
      }).then(function() {
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
  });


  $('.upload-image').on('click', function(ev) {
    resize.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(img) {
      $.ajax({

        url: "{{ route('carBrand.store') }}",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
          "image": img,
          "name":$('.name').val(),
        },
        success: function(data) {
          html = '<img src="' + img + '" />';
          $("#preview-crop-image").html(html);
        }
      });
    });
  });
</script>



@endsection