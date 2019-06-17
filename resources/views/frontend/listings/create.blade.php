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
                    <div class="db-list-com tz-db-table">
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <div class="">
                                <form action="{{ Url('submit-listing') }}" method="post" enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    @if (count($errors) > 0)
                                        <div class="input-field col s6">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $listing->id }}">


                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" class="validate" name="name" value="{{ (Request::old('name')) ? Request::old('name') : $listing->name }}" required>
                                            <label for="name">Restaurant Name</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="slug" type="text" class="validate" name="slug" value="{{ (Request::old('slug')) ? Request::old('slug') : $listing->slug }}" required>
                                            <label for="slug">Enter Slug</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="phone" name="phone" value="{{ (Request::old('phone')) ? Request::old('phone') : $listing->phone }}" required>
                                            <label for="phone">Phone</label>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="email" class="validate" id="email" name="email" value="{{ (Request::old('email')) ? Request::old('email') : $listing->email }}" required>
                                            <label for="email">Email</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="file" name="logo" id="logoupload" accept='image/*' class="validate">
                                            <label for="logo" ></label>
                                        </div>
                                        <img id="logopreview" class="img-responsive" alt="" src="{{ ($listing->logo != null)?URL::to('img/listing/logo/'.$listing->logo):'' }}" />
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="address" name="address" value="{{ (Request::old('address')) ? Request::old('address') : $listing->address }}">
                                            <label for="address">Address</label>
                                        </div>
                                    </div>


                                    <div class="row"> </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="description" name="description" class="materialize-textarea">{{ (Request::old('description')) ? Request::old('description') : $listing->description }}</textarea>
                                            <label for="description">Listing Descriptions</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="db-v2-list-form-inn-tit">
                                            <h5>Social Media Informations:</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="facebook" name="facebook" value="{{ (Request::old('facebook')) ? Request::old('facebook') : $listing->facebook }}" placeholder="e.g. http://www.facebook.com/example">
                                            <label for="facebook">www.facebook.com/directory</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="website" name="website" value="{{ (Request::old('website')) ? Request::old('website') : $listing->website }}" placeholder="e.g. http://www.example.com">
                                            <label for="website">Website</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="location" name="location" value="{{ (Request::old('location')) ? Request::old('location') : $listing->location }}" placeholder="e.g. Bonanjo">
                                            <label for="location">Location</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="food1" name="food1" value="{{ (Request::old('food1')) ? Request::old('food1') : $listing->food1 }}" placeholder="e.g. chicken">
                                            <label for="food1">food1</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="food1" name="food2" value="{{ (Request::old('food2')) ? Request::old('food2') : $listing->food2 }}" placeholder="e.g. fish">
                                            <label for="food2">food2</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="food3" name="food3" value="{{ (Request::old('food3')) ? Request::old('food3') : $listing->food3 }}" placeholder="e.g.com">
                                            <label for="food3">food3</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="food4" name="food4" value="{{ (Request::old('food4')) ? Request::old('food4') : $listing->food4 }}" placeholder="e.g.com">
                                            <label for="food4">food4</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="food5" name="food5" value="{{ (Request::old('food5')) ? Request::old('food5') : $listing->food5 }}" placeholder="e.g.com">
                                            <label for="food5">food5</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" id="food6" name="food6" value="{{ (Request::old('food6')) ? Request::old('food6') : $listing->food6 }}" placeholder="e.g.food6">
                                            <label for="food6">food6</label>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <button class="input-field col s12 v2-mar-top-40 btn-large full-btn" type="submit"> {!! ($listing->id)?'<i class="fa fa-check"></i> Save':'Submit' !!}</a> </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!--RIGHT SECTION-->
        </div>
    </section>
    <!--END DASHBOARD-->


@endsection
