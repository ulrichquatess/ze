@extends('layouts.frontend.app')

@section('content')

    <!--TOP SEARCH SECTION-->
    @include('layouts.frontend.top1')
    <section class="inn-page-bg">
        <div class="container">
            <div class="row">
                <div class="inn-pag-ban">
                    <h2>{{ $blog->title }}</h2>
                    <h5>Grow your business by getting relevant and verified leads</h5> </div>
            </div>
        </div>
    </section>
    <section class="p-about com-padd">
        <div class="container">
            <div class="row blog-single con-com-mar-bot-o">
                <div class="col-md-4">
                    <div class="blog-img"> @if($blog->image == null)
                                           <img src="{{ asset('frontend/images/services/20.jpeg') }}" alt="" />
                                           @else
                                           <img src="{{ asset('images/blogs/'.$blog->image)}}" alt="" />
                                           @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="page-blog">
                        <h3>{{ $blog->title }}</h3> <span>{{ $blog->updated_at->diffForHumans() }}</span>
                        <div class="share-btn share-pad-bot">
                        </div>
                        <p> {!! $blog->body !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
