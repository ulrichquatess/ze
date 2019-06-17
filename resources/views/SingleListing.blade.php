@extends('layouts.frontend.app')

@section('content')
    <!--TOP SEARCH SECTION-->
    @include('layouts.frontend.top1')

    <section>
        <div class="v3-list-ql">
            <div class="container">
                <div class="row">
                    <div class="v3-list-ql-inn">
                        <ul>
                            <li class="active"><a href="#ld-abour"><i class="fa fa-user"></i> About</a>
                            </li>
                            <li><a href="#ld-ser"><i class="fa fa-cog"></i> Services</a>
                            </li>
                            <li><a href="#ld-roo"><i class="fa fa-times-circle"></i> Other Listing</a>
                            </li>
                            <li><a href="#ld-rew"><i class="fa fa-edit"></i> Write Review</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--LISTING DETAILS-->
    <section class="pg-list-1">
        <div class="container">
            <div class="row">
                <div class="pg-list-1-left"> <a href="#"><h3>{{ $listing->name }}</h3></a>
                    <div class="list-rat-ch"> <span>Verified</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> </div>
                    <h4></h4>
                    <p><b>Address:</b> {{ $listing->address }}</p>
                    <div class="list-number pag-p1-phone">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i> {{ $listing->phone }}</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> {{ $listing->email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="pg-list-1-right">
                    <div class="list-enqu-btn pg-list-1-right-p1">
                        <ul>
                            <li><a href="#ld-rew"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{ $listing->location }}</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="list-pg-bg">
        <div class="container">
            <div class="row">
                <div class="com-padd">
                    <div class="list-pg-lt list-page-com-p">
                        <!--LISTING DETAILS: LEFT PART 1-->
                        <div class="pglist-p1 pglist-bg pglist-p-com" id="ld-abour">
                            <div class="pglist-p-com-ti">
                                <h3><span>About</span> {{ $listing->name }}</h3> </div>
                            <div class="list-pg-inn-sp">
                                <div class="share-btn">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i> {{ $listing->facebook }}</a> </li>
                                        <li><a href="#"><i class="fa fa-twitter tw1"></i> {{ $listing->website }}</a> </li>
                                    </ul>
                                </div>
                                <p> {{ $listing->description }} </p>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 1-->
                        <!--LISTING DETAILS: LEFT PART 2-->
                        <div class="pglist-p2 pglist-bg pglist-p-com" id="ld-ser">
                            <div class="pglist-p-com-ti">
                                <h3><span>Services</span> Offered</h3> </div>
                            <div class="list-pg-inn-sp">
                                <p>Taj Luxury Hotels & Resorts provide 24-hour Business Centre, Clinic, Internet Access Centre, Babysitting, Butler Service in Villas and Seaview Suite, House Doctor on Call, Airport Butler Service, Lobby Lounge </p>
                                <div class="row pg-list-ser">
                                    <ul>
                                        <li class="col-md-4">
                                            <div class="pg-list-ser-p1"><img src="{{ asset('frontend/images/services/ser1.jpg') }}" alt="" /> </div>
                                            <div class="pg-list-ser-p2">
                                                <h4>Restaurant and Bar</h4> </div>
                                        </li>
                                        <li class="col-md-4">
                                            <div class="pg-list-ser-p1"><img src="{{ asset('frontend/images/services/ser2.jpg') }}" alt="" /> </div>
                                            <div class="pg-list-ser-p2">
                                                <h4>Other Listing</h4> </div>
                                        </li>
                                        <li class="col-md-4">
                                            <div class="pg-list-ser-p1"><img src="{{ asset('frontend/images/services/ser3.jpg') }}" alt="" /> </div>
                                            <div class="pg-list-ser-p2">
                                                <h4>Corporate Events</h4> </div>
                                        </li>
                                        <li class="col-md-4">
                                            <div class="pg-list-ser-p1"><img src="{{ asset('frontend/images/services/ser4.jpg') }}" alt="" /> </div>
                                            <div class="pg-list-ser-p2">
                                                <h4>Wedding Hall</h4> </div>
                                        </li>
                                        <li class="col-md-4">
                                            <div class="pg-list-ser-p1"><img src="{{ asset('frontend/images/services/ser5.jpg') }}" alt="" /> </div>
                                            <div class="pg-list-ser-p2">
                                                <h4>Travel & Transport</h4> </div>
                                        </li>
                                        <li class="col-md-4">
                                            <div class="pg-list-ser-p1"><img src="{{ asset('frontend/images/services/ser6.jpg') }}" alt="" /> </div>
                                            <div class="pg-list-ser-p2">
                                                <h4>All Amenities</h4> </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 2-->

                        <!--LISTING DETAILS: LEFT PART 4-->
                        <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-roo">
                            <div class="pglist-p-com-ti">
                                <h3><span>Other</span>Listing</h3> </div>
                            <div class="list-pg-inn-sp">
                                @foreach($listings as $listings)
                                <div class="home-list-pop list-spac list-spac-1 list-room-mar-o">
                                    <!--LISTINGS IMAGE-->
                                    <div class="col-md-3"> <img src="{{ (isset($listing) && $listing->logo != null)?URL::to('img/listing/logo/'.$listing->logo):URL::to('frontend/images/room/3.jpg') }}" alt=""> </div>
                                    <!--LISTINGS: CONTENT-->
                                    <div class="col-md-9 home-list-pop-desc inn-list-pop-desc list-room-deta"> <a href="{{ url('listings/'.$listings->slug) }}"><h3>{{ $listings->name }}</h3></a>
                                        <div class="list-rat-ch list-room-rati"> <span>Verified</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>   </div>
                                        <div class="list-room-type list-rom-ami">
                                           <p> {{ substr(strip_tags($listings->description), 0, 150) }}{{ strlen(strip_tags($listings->description)) > 150 ? "..." : "" }}</p>
                                        </div> <span class="home-list-pop-rat list-rom-pric">$420</span>
                                        <div class="list-enqu-btn">
                                            <ul>
                                                <li><a ><i class="fa fa-location-arrow" aria-hidden="true"></i> {{ $listings->location }} </a> </li>
                                                <li><a href="{{ url('listings/'.$listings->slug) }}"><i class="fa fa-book" aria-hidden="true"></i> Read More</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!--END 360 DEGREE MAP: LEFT PART 8-->
                        <!--LISTING DETAILS: LEFT PART 6-->
                        <div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rew">
                            <div class="pglist-p-com-ti">
                                <h3><span>Write Your</span> Reviews</h3> </div>
                            <div class="list-pg-inn-sp">
                                <div class="list-pg-write-rev">
                                    <form class="col">
                                        <p>Writing great reviews may help others discover the places that are just apt for them. Here are a few tips to write a good review:</p>



                                        <div id="disqus_thread"></div>
                                        <script>

                                            /**
                                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                                            var disqus_config = function () {
                                            this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                                            this.page.identifier = {{ $listing->slug }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                            };

                                            (function() { // DON'T EDIT BELOW THIS LINE
                                                var d = document, s = d.createElement('script');
                                                s.src = 'https://smartrestaux.disqus.com/embed.js';
                                                s.setAttribute('data-timestamp', +new Date());
                                                (d.head || d.body).appendChild(s);
                                            })();
                                        </script>
                                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 6-->
                    </div>
                    <div class="list-pg-rt">
                        <!--LISTING DETAILS: LEFT PART 7-->
                        <div class="pglist-p3 pglist-bg pglist-p-com">
                            <div class="pglist-p-com-ti pglist-p-com-ti-right">
                                <h3><span>Our</span> Blog</h3> </div>
                            <div class="list-pg-inn-sp">
                                <div class="list-pg-guar">
                                    @foreach($blogs as $blog)
                                    <ul>
                                        <li>
                                            <div class="list-pg-guar-img"> <img src="{{ asset('images/blogs/'.$blog->image)}}" width="45" height="45" alt="" /> </div>
                                            <h4>{{ $blog->title }}</h4>
                                            <p>{{ $blog->created_at->format('F j, Y') }}</p>
                                        </li>

                                    </ul>
                                    @endforeach
                                <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="{{ Url('blog') }}" >View All Blog</a> </div>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 7-->
                        <!--LISTING DETAILS: LEFT PART 7-->
                        <div class="pglist-p3 pglist-bg pglist-p-com">
                            <div class="pg-list-user-pro"> <img src="{{ asset('frontend/images/users/8.png') }}" alt=""> </div>
                            <div class="list-pg-inn-sp">
                                <div class="list-pg-upro">
                                    <h5>Kevin Jack</h5>
                                    <p>Member since July 2017</p> <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Contact User</a> </div>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 7-->
                        <!--LISTING DETAILS: LEFT PART 8-->
                        <div class="pglist-p3 pglist-bg pglist-p-com">
                            <div class="pglist-p-com-ti pglist-p-com-ti-right">
                                <h3><span>Our</span> Location</h3> </div>
                            <div class="list-pg-inn-sp">
                                <div class="list-pg-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290413.804893654!2d-93.99620524741552!3d39.66116578737809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1469954001005" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 8-->


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
