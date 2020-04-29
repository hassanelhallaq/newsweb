@extends('newsweb.parent')
@section('title', 'home')

@section('constant')

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>news  </title>



        <!-- Bootstrap core CSS -->
        <link href="{{asset('newsweb/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{asset('newsweb/css/modern-business.css')}}" rel="stylesheet">

    </head>

    <body>

    <!-- Navigation -->


    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('{{asset('newsweb/img/1.jpg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>news title can be here</h3>
                        <p>This is a description for the first slide of news title.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{asset('newsweb/img/22.jpg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second title can be here</h3>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{asset('newsweb/img/1.jpg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third title can be here</h3>
                        <p>This is a description for the third slide  of news title.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- Page Content -->

   @foreach ($category as $item)
@if(count($item->artical->where('status','active'))>0)
   <section class="gray-sec">
        <div class="container">
            <!-- category Section -->
        <h3 class="my-4">{{$item->name_en}}</h3>

            <div class="row">
                @foreach ($item->artical as $art)
                    
                
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('/images/artical/'.$art->image)}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                            <a href="#">{{$art->title}}</a>
                            </h4>
                            <p class="card-text">{{$art->shortDesc}}</div>
                        
                        <div class="card-footer">
                            <a href="{{route('newsdetials.index',[$art->id])}}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
            <div align="center"><a class="btn btn-success" href="{{route('newsweb.allnews',[$item->id])}}">more news</a></div>

        </div>
    </section>
@endif
    @endforeach



    </body>

    </html>
