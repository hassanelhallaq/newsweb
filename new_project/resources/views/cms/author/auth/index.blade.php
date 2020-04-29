@extends('cms.author.auth.parentAuth')
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
              <li class="breadcrumb-item active">artical Data</li>
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
              <h3 class="card-title">artical Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>image</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th>setting</th>

                </tr>
                </thead>
                @foreach ($articalData as $artical)
                    
                <tbody>
                <tr>
                    <td>{{$artical->id}}</td>
                    <td>{{$artical->title}}</td>   
                    
                   

                    <td>
                      <img src="{{url('images/artical/'.$artical->image)}}" width="50" height="50"> </td>
                    <td>{{$artical->created_at}}</td>
                    <td>{{$artical->updated_at}}</td>
                    <td>
                    <a onclick="confirmDelete(this,'{{$artical->id}}')"
                      class="btn btn-xs btn-danger" style="color: white;">delete</a>
                      <a href="{{route('artical.edit',[$artical->id])}}"
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
                  <th>Title</th>
                  <th>image</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th>setting</th>

                    </tr>
                    </thead>
                </tfoot>
              </table>
            </div>


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

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


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
    deletecategory(app,id)
  }
})

   }
function deletecategory(app,id){
axios.delete('artical/'+ id)
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