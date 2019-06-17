<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listing;
use App\Order;
use Hash;
use Auth;
use Session;
use Image;
use Storage;
use Sluggable;

class orderController extends Controller
{
    /**
     * Create a new controller instance.
     * Such that only validated user can login
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function index()
    {
        $orders = Order::all();

        return view('admin/orders/index', [
            'orders' => $orders
        ]);
    }

    public function create()
    {
        $order = new Order();
        $listings = Listing::all();
        return view('admin/orders/create', [
            'listings' => $listings,
            'order' => $order
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' =>           'required',
            'phone' =>           'required',
            'location' =>       'required'

        ]);

        // STORE DATA TO THE DATABASE

        $order = new Order();

        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->location = $request->input('location');
        $order->delivered = $request->input('delivered') ;



        $order->save();

        $order->listings()->sync($request->listings, false);

        flash('Order Was Successfully Created!', 'success');


        return redirect()->route('admin.orders.show', $order->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Assign or find the $id of each field
        $order = Order::findOrFail($id);
        $listings = Listing::all();
        $tags2 = array();
        foreach ($listings as $tag) {
            $tags2[$tag->id] = $tag->az;
        }
        $listings = Listing::all();


        // Return the view page here
        return view('admin.orders.edit')->withListings($listings)->withOrder($order)->withListing($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $order =  Order::findOrFail($id);

        $this->validate($request, [
            'name' =>           'required',
            'phone' =>           'required',
            'location' =>       'required'
        ]);


        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->location = $request->input('location');
        $order->delivered = $request->input('delivered') ;


        $order->save(); // this is the part that updates the changes


        flash('Order Was Successfully Updated!', 'success');

        $order->listings()->sync($request->listings, false);

        // Redirect to the post.show

        return redirect()->route('admin.orders.show', $order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Here we collect the $id
        $order = order::findOrFail($id);
        Storage::delete($order->image);

        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
