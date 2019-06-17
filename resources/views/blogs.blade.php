@extends('layouts.frontend.app')

@section('content')

    <!--TOP SEARCH SECTION-->
    @include('layouts.frontend.top1')


    <section class="dir-pa-sp-top">
        <div class="container com-padd dir-hom-pre-tit">
            <div class="com-title">
                <h2>Welcome To <span> Our Blog</span></h2>
                <p>Explore some of the best tips from around the world from our partners and friends.</p>
            </div>
            <div class="row span-none">
                @foreach($blogs as $blog)
                <div class="col-md-4">
                    <a href="#!">
                        <div class="list-mig-like-com com-mar-bot-30">
                            <div class="list-mig-lc-img"><a href="{{ URL::to('blogs/'.$blog->slug) }}"> <img src="{{ asset('images/blogs/'.$blog->image)}}" width="450px" height="250px" alt=""> </a> <span class="home-list-pop-rat list-mi-pr">$720</span> </div>
                            <div class="list-mig-lc-con">
                                <div class="list-rat-ch list-room-rati"> <span>4.0</span>  </div>
                                <h3 style="color: white">{{ str_limit(strip_tags($blog->title), 20) }}</h3>
                                <h6>{{ $blog->created_at->format('F j, Y') }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

                    <ul class="pagination">
                        <li class="page-item"><a href="#">{!! $blogs->links()  !!}</a></li>
                    </ul>
            </div>
        </div>
    </section>



@endsection
