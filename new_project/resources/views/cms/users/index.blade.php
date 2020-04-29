@extends('cms.parent')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Status</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th>setting</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($userData as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->mobileNumber}}</td>
                  <td>{{$user->age}}</td>
                  <td>{{$user->gender}}</td>
                  <td>@if (($user->status)=='active')
                    <span class="badge badge-success">{{$user->status}}</span>
                  @else
                  <span class="badge badge-danger">{{$user->status}}</span>
                  @endif
                  </td>
                  <td>{{$user->created_at}}</td>
                  <td>{{$user->updated_at}}</td>

                <td>
                  <a onclick="confirmDelete(this,'{{$user->id}}')"
                class="btn btn-xs btn-danger" style="color: white;">delete</a>
                <a href="{{route('users.edit',[$user->id])}}"
                  class="btn btn-xs btn-primary" style="color: white;">edite</a>
              </td>


                </tbody>
                </tr>
                @endforeach
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile Number</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th>created_at</th>
                      <th>updated_at</th>
                      <th>setting</th>
                    </tr>
                    </thead>
                </tfoot>
              </table>
            </div>
           <div class="row" >
               <div>{{$userData->render()}}</div>
           </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection
@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 @endsection

<script>
  function confirmDelete(app,id){
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    deleteUser(app,id)
  }
})
  }
  function deleteUser(app,id){
    axios.delete('users/'+id)
  .then(function (response) {
    // handle success
    console.log(response.data);
    showMassege(response.data);
    app.closest('tr').remove();

  })
  .catch(function (error) {
    // handle error
    console.log(error.response.data);
    showMassege(error.response.data);

  })
 
  }

  function showMassege(data){
    Swal.fire({
  position: 'center',
  icon: data.icon,
  title: data.title,
  showConfirmButton: false,
  timer: 1500
})
  }
  </script>