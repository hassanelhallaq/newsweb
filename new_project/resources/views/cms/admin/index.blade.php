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
              <li class="breadcrumb-item active">author Data</li>
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
              <h3 class="card-title">author Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Email</th>
                  <th>age</th>
                  <th>gender</th>
                  <th>image</th>
                  <th>Status</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th>setting</th>

                </tr>
                </thead>
                @foreach ($adminData as $admin)
                    
                <tbody>
                <tr>
                    <td>{{$admin->id}}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->mobileNumber}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->age}}</td>
                    <td>{{$admin->gender}}</td>
                    <td>
                      <img src="{{url('images/admin/'.$admin->image)}}" width="50" height="50"> </td>

                      <td>
                      <span class="badge badge-success">{{$admin->status}}</span>
                    </td>
                    <td>{{$admin->created_at}}</td>
                    <td>{{$admin->updated_at}}</td>
                    <td>
                      <a  onclick="confirmDelete(this,'{{$admin->id}}')"
                        class="btn btn-xs btn-danger" style="color: white;">Delete</a>
                        <a href="{{route('admin.edit',[$admin->id])}}"
                          class="btn btn-xs btn-primary" style="color: white;">Edit</a>

                    </td>
                  
                  </tr>

                <td><a>
                 
              </td>


                </tbody>
                @endforeach

                </tr>
                <thead>
                    <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Age</th>
                  <th>image</th>
                  <th>Status</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th>setting</th>

                    </tr>
                    </thead>
                </tfoot>
              </table>
            </div>
           <div class="row">
        <div>{{$adminData->render()}}</div>

           </div>
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
   function confirmDelete(app,id) {
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
    Swal.fire(
      DeleteAdmin(app,id)
    )
  }
})    
   }
   function DeleteAdmin(app,id) {
    axios.delete('admin/'+id)
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
   function showMassege(data) {
    Swal.fire({
  position: 'center',
  icon: data.icon,
  title: data.title,
  showConfirmButton: false,
  timer: 1500
})
     
   }
 </script>

