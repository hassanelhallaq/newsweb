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
        <div class="col-14">
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
                @foreach ($authorData as $author)
                    
                <tbody>
                <tr>
                    <td>{{$author->id}}</td>
                    <td>{{$author->name}}</td>
                    <td>{{$author->mobileNumber}}</td>
                    <td>{{$author->email}}</td>
                    <td>{{$author->age}}</td>
                    <td>{{$author->gender}}</td>
                    
                    <td>
                      <img src="{{url('images/author/'.$author->image)}}" width="50" height="50"> </td>
                      
                    <td><span class="badge badge-success">{{$author->status}}</span>
                      </td>
                    <td>{{$author->created_at}}</td>
                    <td>{{$author->updated_at}}</td>
                    <td>
                    <a onclick="confirmDelete(this,'{{$author->id}}')"
                      class="btn btn-xs btn-danger" style="color: white;">delete</a>
                      <a href="{{route('author.edit',[$author->id])}}"
                      class="btn btn-xs btn-primary" style="color: white;">Edit</a>
                      <a href="{{route('author.artical.index',[$author->id])}}"
                        class="btn btn-xs btn-primary" style="color: white;">Articals</a>
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
        <div>{{$authorData->render()}}</div>

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
   function confirmDelete(id,app){
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
      deleteAuthor(id,app)
    )
  }
})
   }
   function deleteAuthor(app,id){
axios.delete('author/'+ id)
  .then(function (response) {
    // handle success
    console.log(response.data);
    deleteDone(response.data);
    
  })
  .catch(function (error) {
    // handle error
    console.log(error.response.data);
    deleteDone(error.response.data);
  })

}
    function deleteDone(data){
      Swal.fire({
  position: 'center',
  icon: data.icon,
  title: data.title,
  showConfirmButton: false,
  timer: 1500
})
   }
 </script>