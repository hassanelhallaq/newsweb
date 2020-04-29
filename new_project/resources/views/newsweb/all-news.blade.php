@extends('newsweb.parent')
@section('title','all news')
@section('constant')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
            
        <h1 class="mt-4 mb-3">
            <small>{{$categorys->name_en}}</small>
          </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{route('newsweb.index')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">{{$categorys->name_en}}</li>

          </ol>
          @foreach ($artical as $item)

        <!-- news title One -->
       
      <!-- news title One -->
      <div class="row">
        <div class="col-md-7">
          <a href="newsdetailes.html">
          <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0" src='{{asset('/images/artical/'.$item->image)}}' alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>{{$item->title}}</h3>
        <p>{{$item->shortDesc}}</p>
          <a class="btn btn-primary" href="newsdetailes.html">View news title
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
      <!-- /.row -->   
           <hr>

        @endforeach

     
        <!-- /.row -->


        <!-- news title Two -->
      
        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="newsdetailes.html" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>

    </div>

    </body>

    </html>
