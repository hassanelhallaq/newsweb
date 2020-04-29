@extends('cms.parent')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="POST" action="{{route('users.update',[$userEdit->id])}}">
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
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="{{$userEdit->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" name="email" value="{{$userEdit->email}}"  class="form-control" id="exampleInputPassword1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile Number</label>
                    <input type="text" name="mobileNumber" value="{{$userEdit->mobileNumber}}" class="form-control" id="exampleInputPassword1" placeholder="Enter Mobile Number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Age</label>
                    <input type="text" name="age" value="{{$userEdit->age}}" class="form-control" id="exampleInputPassword1" placeholder="Enter your Age">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" name="status" id="customSwitch1"
                      @if ('status'=='active')checked
                          
                      @endif>
                      <label class="custom-control-label" for="customSwitch1">active</label>
                    </div>
            
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Gender</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="male"
                               name="gender" value="male"
                               @if(old('gender') == 'male') checked @endif>
                        <label for="male" class="custom-control-label">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="female"
                               name="gender" value="female"
                               @if(old('gender') == 'female') checked @endif>
                        <label for="female" class="custom-control-label">Female</label>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection