@extends('newsweb.parent')
@section('title','news detailes')

@section('constant')
<html>

    <body>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$Details->title}}

        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">news deatiles</li>
        </ol>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{asset('images/artical/'.$Details->image)}}" alt="">

                <hr>

                <!-- Date/Time -->
                <p>{{$Details->created_at}}</p>

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$Details->body}}
                <hr>
                    

                <!-- Comments Form -->
             
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form action={{route('comment.store')}}>
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name='content' ></textarea>
                                <input type="number" name="artical_id" value="{{$Details->id}}" hidden>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                @foreach ($Details->comment as $comment)

                <div class="media mb-4">
                        
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                    <h5 class="mt-0"> {{$comment->user->name}}</h5>
                    <p class="card-text">  {{$comment->content}}</p>

                    </div>
                </div>
                @endforeach

                <!-- Comment with nested comments -->
             

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->


    </body>

    </html>
