@extends('layouts.frontend.app')

@section('content')


    <!--BANNER AND SERACH BOX-->
    <section id="background" class="dir1-home-head">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="dir-ho-tl">
                        <ul>
                            <li>
                                <a href="/"><img src="{{ asset('frontend/images/logo.png') }}" alt=""> </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="dir-ho-tr">
                        <ul>
                            <li><a href="{{ route('register') }}">Register</a> </li>
                            <li><a href="{{ route('login') }}">Sign In</a> </li>
                            <li><a href="{{ Url('submit-listing') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container dir-ho-t-sp">
            <div class="row">
                <div class="dir-hr1">
                    <div class="dir-ho-t-tit">
                        <h1>{{ $page3->title }}</h1>
                        <p>{{ $page3->body }}<br></p>
                    </div>
                    @include('layouts.search')
                </div>
            </div>
        </div>
    </section>

    @include('layouts.frontend.top')

    <!--HOME PROJECTS-->
    <section class="proj mar-bot-red-m30" style="margin-bottom: 20px;">
        <div class="container">
            <div class="row">
                <!--HOME PROJECTS: 1-->
                @foreach($services as $service)
                <div class="col-md-4 col-sm-7">
                    <div class="hom-pro"> <img src="{{ asset('images/services/'.$service->image)}}" alt="" />
                        <h4>{{ $service->title }}</h4>
                        <p>{{ $service->body }}</p> <a></a> </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--BEST THINGS-->
    <section class="com-padd com-padd-redu-bot1">
        <div class="container dir-hom-pre-tit">
            <div class="row">
                <div class="com-title">
                    <h2>{{ $page4->title }}</h2>
                    <p>{{ $page4->body }}</p>
                </div>
                <div class="col-md-6">
                    <div>
                        <!--POPULAR LISTINGS-->
                        @foreach($list as $list)
                        <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> <img src="{{ asset('frontend/images/services/tr1.jpg') }}" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> <a href="{{ url('listings/'.$list->slug) }}"><h3>{{ $list->name }}</h3></a>
                                <h4>{{ $list->address }}</h4>
                                <p>{{ substr(strip_tags($list->description), 0, 100) }}{{ strlen(strip_tags($list->description)) > 100 ? "..." : "" }}</p>
                                @if($list->verified != null)
                                    <span class="home-list-pop-rat">Published</span>
                                @endif
                                <div class="hom-list-share">
                                    <ul>
                                        <li><a href="#!"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{ $list->location }}</a> </li>
                                        <li><a href="#!"><i class="fa fa-email" aria-hidden="true"></i> 570</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <!--POPULAR LISTINGS-->
                        @foreach($lists as $list)
                        <div class="home-list-pop">
                            <!--POPULAR LISTINGS IMAGE-->
                            <div class="col-md-3"> <img src="{{ asset('frontend/images/services/s5.jpeg') }}" alt="" /> </div>
                            <!--POPULAR LISTINGS: CONTENT-->
                            <div class="col-md-9 home-list-pop-desc"> <a href="{{ url('listings/'.$list->slug) }}"><h3>{{ $list->name }}</h3></a>
                                <h4>{{ $list->address }}</h4>
                                <p>{{ substr(strip_tags($list->description), 0, 100) }}{{ strlen(strip_tags($list->description)) > 100 ? "..." : "" }}</p>
                                @if($list->verified != null)
                                    <span class="home-list-pop-rat">Published</span>
                                @endif
                                <div class="hom-list-share">
                                    <ul>
                                        <li><a href="#!"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{ $list->location }}</a> </li>
                                        <li><a href="#!"><i class="fa fa-email" aria-hidden="true"></i> 570</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--ADD BUSINESS-->
    <section class="com-padd home-dis" style="margin-bottom: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><span>Great </span> Promote Your Restaurant with us <a href="{{ URL::to('submit-listing') }}">Add My Business</a></h2> </div>
            </div>
        </div>
    </section>

    <!--CREATE FREE ACCOUNT-->
    <section class="com-padd sec-bg-white com-padd-redu-top">
        <div class="container">
            <div class="row">
                <div class="com-title">
                    <h2>{{ $page1->title }}</h2>
                    <p>{{ $page1->body }}</p>
                </div>
                <div class="col-md-6">
                    <div class="hom-cre-acc-left">
                        <h3>{{ $page2->title }} <span>{{ $page2->sub_title }}</span></h3>
                        <p>{{ $page2->body }}</p>
                        <ul>
                            @foreach($blogs as $blog)
                            <li> <img src="{{ asset('images/blogs/'.$blog->image)}}" alt="Service Image">
                                <div>
                                    <h5><a href="{{ url('blogs/'.$blog->slug) }}"> {{ $blog->title }} </a></h5>
                                    <p>{{ substr(strip_tags($blog->body), 0, 100) }} {{ strlen(strip_tags($blog->body)) > 100 ? "...." : "" }} </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Here if the contact section-->

                <div class="col-md-6">
                    <div class="hom-cre-acc-left hom-cre-acc-right">
                        <form action="{{ url('contact') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-name" name="name" type="text" class="validate">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-mob" name="phone" type="number" class="validate">
                                    <label for="phone">Mobile</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="acc-mail" name="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="message" name="message"></textarea>
                                    <label for="message">Mesage</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12"> <button type="submit" class="waves-effect waves-light btn-large full-btn" href="#!">Submit Now</button> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection