@extends('layouts.frontend.app')

@section('content')

    <!--TOP SEARCH SECTION-->
    @include('layouts.frontend.top1')
    <section class="dir-alp dir-pa-sp-top">
        <div class="container">
            <div class="row">
                <div class="dir-alp-tit">
                    <h1>Search Results ({{$result_count}})</h1>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a> </li>
                        <li class="active">All Restaurant</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="dir-alp-con">
                    <div class="col-md-12 dir-alp-con-right">
                        <div class="dir-alp-con-right-1">
                            <div class="row">

                                <!-- Listing Not Found-->
                                @if(count($listings) == 0)
                                    <div class="panel panel-default" style="margin-top: 20px;">
                                        <div class="panel-body">
                                           <h1> No Restaurant Found </h1>
                                        </div>
                                    </div>
                                @endif


                                <!--LISTINGS-->
                                @foreach($listings as $listing)
                                <div class="home-list-pop list-spac">
                                    <!--LISTINGS IMAGE-->
                                    <div class="col-md-3 list-ser-img"> <img src="{{ (isset($listing) && $listing->logo != null)?URL::to('img/listing/logo/'.$listing->logo):URL::to('frontend/images/services/s10.jpeg') }}" alt="" /> </div>
                                    <!--LISTINGS: CONTENT-->
                                    <div class="col-md-9 home-list-pop-desc inn-list-pop-desc"> <a href="{{ url('listings/'.$listing->slug) }}"><h3>{{ $listing->name }}</h3></a>
                                        <h4>Powered By Yuscard</h4>
                                        <p><b>Description:</b><br> {!! substr(strip_tags($listing->description), 0, 200) !!} {!! strlen(strip_tags($listing->description)) > 200 ? "...." : "" !!}</p>
                                        <p><b>Address:</b> {{ $listing->address }}</p>
                                        <div class="list-number">
                                            <ul>
                                                <li><img src="{{ asset('frontend/images/icon/phone.png') }}" alt=""> {{ $listing->phone }}</li>
                                                <li><img src="{{ asset('frontend/images/icon/mail.png') }}" alt=""> {{ $listing->email }}</li>
                                            </ul>
                                        </div>

                                        @if($listing->verified != null)
                                            <span class="home-list-pop-rat">Verified</span>
                                        @endif
                                        <div class="list-enqu-btn">
                                            <ul>
                                                <li><a href="#!"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{ $listing->location }}</a> </li>
                                                <li><a href="#!">{{ $listing->website }}</a> </li>
                                                <li><a href="{{ url('listings/'.$listing->slug) }}" ><i class="fa fa-book" aria-hidden="true"></i> Read More</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--LISTINGS END-->

                            </div>
                            <div class="row">
                                {!! $listings->appends( Request::all() )->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
