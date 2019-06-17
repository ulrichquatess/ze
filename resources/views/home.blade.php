@extends('layouts.frontend.app')

@section('content')


    <!--TOP SEARCH SECTION-->
    <section class="bottomMenu dir-il-top-fix">
        @include('layouts.inc')
    </section>
    <!--DASHBOARD-->
    <section>
        <div class="tz">
            <!--LEFT SECTION-->
            @include('layouts.frontend.sidebar')
            <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Manage Booking</h4>
                    <div class="tz-2-main-com">
                        <div class="tz-2-main-1">
                            <div class="tz-2-main-2"> <img src="{{ asset('frontend/images/icon/d1.png') }}" alt="" /><span>All Listings</span>
                                <p>All the Lorem Ipsum generators on the</p>
                                <h2>04</h2> </div>
                        </div>
                        <div class="tz-2-main-1">
                            <div class="tz-2-main-2"> <img src="{{ asset('frontend/images/icon/d2.png') }}" alt="" /><span>Review</span>
                                <p>All the Lorem Ipsum generators on the</p>
                                <h2>69</h2> </div>
                        </div>
                        <div class="tz-2-main-1">
                            <div class="tz-2-main-2"> <img src="{{ asset('frontend/images/icon/d3.png') }}" alt="" /><span>Messages</span>
                                <p>All the Lorem Ipsum generators on the</p>
                                <h2>53</h2> </div>
                        </div>
                    </div>

                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Listings</h2>
                            <p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
                        </div>
                        <div class="tz-mess">
                            <ul>
                                @foreach($listings as $listing)
                                <li class="view-msg">
                                    <h5><img src="{{ asset('frontend/images/users/1.png') }}" alt="" />{{ $listing->name }}
                                        @if($listing->verified == null)
                                            <span class="tz-msg-un-read">un verified</span></h5>
                                        @else
                                           <span class="tz-msg-un-read">verified</span></h5>
                                       @endif
                                    <p>{!! $listing->description !!}</p>
                                    <div class="hid-msg"><a href="#"><i class="fa fa-eye" title="view"></i></a><a href="#"><i class="fa fa-trash" title="delete"></i></a>
                                    </div>
                                </li>
                               @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!--RIGHT SECTION-->
        </div>
    </section>
    <!--END DASHBOARD-->


@endsection
