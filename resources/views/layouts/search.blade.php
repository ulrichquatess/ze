<form class="tourz-search-form" action="{{ URL::to('search') }}" method="get">
    <div class="input-field">
        <input type="text" name="location" title="Location" id="select-city" value="{{ Request::get('location') }}" class="autocomplete">
        <label for="location">Enter city</label>
    </div>
    <div class="input-field">
        <input type="text" id="select-search" class="autocomplete" name="keyword" title="Keyword" value="{{ Request::get('keyword') }}"  >
        <label for="select-search" class="search-hotel-type">Search your services like restaurant and more</label>
    </div>
    <div class="input-field">
        <input type="submit" id="btn-search" value="search" class="waves-effect waves-light tourz-sear-btn"> </div>
</form>


<!-- Searchbar -->

@section('scripts')

    {!! HTML::script('js/jquery.geocomplete.min.js') !!}

    <script>

        function initSearch(){
            $("#placesearch").geocomplete({ details: "#searchbar" });
        }


        $( "#btn-search" ).click(function() {
            var $this = $(this);
            $this.button('loading');
            setTimeout(function() {
                $this.button('reset');
            }, 150);
        });

    </script>

    @parent
@stop

