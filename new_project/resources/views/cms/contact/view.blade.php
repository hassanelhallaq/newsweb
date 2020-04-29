@extends('cms.parent')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Contact View</h3>
              </div>
              <!-- /.card-header -->
             

<form name="sentMessage" id="contactForm" novalidate >
    <div class="card-body">
        <div class="form-group">
    <div class="control-group form-group">
        <div class="controls">
            <label>Full Name:</label>
            <input type="text" name='name' value="{{$contactsShow->name}}" class="form-control" id="name" placeholder="Enter ..." disabled required data-validation-required-message="Please enter your name.">
            <p class="help-block"></p>
        </div>
    </div>
    <div class="control-group form-group">
        <div class="controls">
            <label>Phone Number:</label>
            <input type="text" name="mobileNumber" value="{{$contactsShow->mobileNumber}}" class="form-control" placeholder="Enter ..." disabled id="phone" required data-validation-required-message="Please enter your phone number.">
        </div>
    </div>
    <div class="control-group form-group">
        <div class="controls">
            <label>Email Address:</label>
            <input type="email" name="email" value="{{$contactsShow->email}}" class="form-control" placeholder="Enter ..." disabled id="email" required data-validation-required-message="Please enter your email address.">
        </div> 
    </div>
    <div class="control-group form-group">
        <div class="controls">
            <label>Message:</label>
            <textarea rows="10"  name="massge"  cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" placeholder="Enter ..." disabled>{{$contactsShow->massge}}</textarea>
        </div>
    </div>
    <div id="success"></div>
    <!-- For success/fail messages -->
</form>
</div>
    
@endsection