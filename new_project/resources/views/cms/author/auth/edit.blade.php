@extends('cms.author.auth.parentAuth')
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Artical</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Artical</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Artical</h3>
              </div>
              <!-- /.card-header -->
             
              
                <form role="form" id="quickForm" method="POST" action="{{route('artical.update',[$articalEdit->id])}}"
                enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                <div class="alert {{session()->get('status')}} alert-dismissible fade show" role="alert">
                    <span> {{ session()->get('message') }}<span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                  <div class="card-body">
                    <div class="form-group">
                      <input class="form-control" type="text" name="title" value="{{$articalEdit->title}}" placeholder="Title:">
                      <label>Select category</label>
                      <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"
                      id="category_id" name="category_id">
                      @foreach ($categoryData as $item)
                      <option  selected="{{$item->id}}">{{$item->name_en}}</option>
                      @endforeach                      
                      </select>
                      <div class="form-group">
                        <label>Short description</label>
                        <textarea class="form-control" name='shortDesc' rows="3" placeholder="Enter ...">{{$articalEdit->shortDesc}}</textarea>
                      </div>
                    </div>
                    <textarea id="compose-textarea" class="form-control" name="body"  style="height: 300px">
          
                      {{$articalEdit->body}} </textarea>
                </div>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" name="status" id="customSwitch1"
                  @if (old('status')=='active')checked
                      
                  @endif>
                  <label class="custom-control-label" for="customSwitch1">active</label>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="image" id='image'>
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
</body>
</html>
@endsection