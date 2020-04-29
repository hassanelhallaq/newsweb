@extends('cms.parent')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Index</h1>
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
              <h3 class="card-title">Categories View </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                        
                    
                <tr>
                  <th>ID</th>
                  <th>English Name</th>
                  <th>Arabic Name</th>
                  <th>Status</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th>settings</th>

                </tr>
                </thead>
                

                <tbody>
                  @foreach ($categoryData as $category)
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->name_en}}</td>
                  <td>{{$category->name_ar}}</td>
                  
                  <td>{{$category->created_at}}</td>
                  <td> {{$category->updated_at}}</td>
                  <td> @if ($category->status=='active')
                    <span class="badge badge-primary">{{$category->status}}</span>
                    @else
                    <span class="badge badge-danger">{{$category->status}}</span>


                      
                  @endif
                    </td> 

                  <td> <a href="#"  onclick="confirmDelete(this,'{{$category->id}}')"
                     class="btn btn-xs btn-danger" style="color: white;">Delete</a>
                     <a href="{{route('categories.edit',[$category->id])}}"
                      class="btn btn-xs btn-primary" style="color: white;">Edit</a>
                   </td>

                </tr>
                    <thead>
                      @endforeach

                        <tr>
                          <th>ID</th>
                          <th>English Name</th>
                          <th>Arabic Name</th>
                          <th>Status</th>
                          <th>created_at</th>
                          <th>updated_at</th>
                          <th>settings</th>

                        </tr>
                        </thead>
                        
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <div class = "row">
          <div>{{$categoryData->render()}}</div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</body>
</html>
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
    deletecategory(app,id)
  }
})

   }
function deletecategory(app,id){
axios.delete('categories/'+ id)
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