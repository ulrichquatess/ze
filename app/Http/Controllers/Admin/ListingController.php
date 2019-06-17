<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Listing;
use Hash;
use Auth;
use Session;
use Image;
use Storage;
use Sluggable;

class ListingController extends Controller
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
        $listings = Listing::all();

        return view('admin/listings/index', [
            'listings' => $listings
        ]);
    }

    public function create()
    {
        $listing = new Listing();
        $users =  User::all();
        return view('admin/listings/create', [
            'listing' => $listing,
            'users' => $users
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
            'email' =>          'required',
            'description' =>    'required',
            'location' =>       'required'

        ]);

        // STORE DATA TO THE DATABASE

        $listing = new Listing();

        $listing->name = $request->input('name');
        $listing->slug = $request->input('slug');
        $listing->description = $request->input('description');
        $listing->address =  $request->input('address');
        $listing->location = $request->input('location');
        $listing->email =    $request->input('email');
        $listing->food1 =    $request->input('food1');
        $listing->food2 =    $request->input('food2');
        $listing->food3 =    $request->input('food3');
        $listing->food4 =    $request->input('food4');
        $listing->food5 =    $request->input('food5');
        $listing->food6 =    $request->input('food6');
        $listing->website = $request->input('website');
        $listing->user_id = Auth::user()->id;
        $listing->facebook = $request->input('facebook');
        $listing->phone = $request->input('phone');
        $listing->verified = $request->input('verified') ;
        $listing->published = $request->input('published');
        $listing->approved = $request->input('approved') ;

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_one')) {
            #Add new photo
            $image = $request->file('featured_one');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_one;

            //here we update the database
            $listing->featured_one  = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_two')) {
            #Add new photo
            $image = $request->file('featured_two');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_two;


            //here we update the database
            $listing->featured_two = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_three')) {
            #Add new photo
            $image = $request->file('featured_three');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_three;


            //here we update the database
            $listing->featured_three = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_four')) {
            #Add new photo
            $image = $request->file('featured_four');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_four;


            //here we update the database
            $listing->featured_four = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_five')) {
            #Add new photo
            $image = $request->file('featured_five');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_five;

            //here we update the database
            $listing->featured_five = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_six')) {
            #Add new photo
            $image = $request->file('featured_six');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_six;


            //here we update the database
            $listing->featured_six = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }


        $listing->save();

        flash('Listing Was Successfully Created!', 'success');


        return redirect()->route('admin.listings.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::findOrFail($id);

        return view('admin.listings.show')->with('listing', $listing);
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
        $listing = Listing::findOrFail($id);
        $users =  User::all();

        // Return the view page here
        return view('admin.listings.edit')->with([
            'listing'=> $listing,
            'users'=> $users
        ]);
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

        $this->validate($request, [
            'name' =>           'required',
            'email' =>          'required',
            'description' =>    'required',
            'location' =>       'required'
        ]);

        $listing =  Listing::findOrFail($id);

        $listing->name = $request->input('name');
        $listing->slug = $request->input('slug');
        $listing->description = $request->input('description');
        $listing->address =  $request->input('address');
        $listing->location = $request->input('location');
        $listing->email =    $request->input('email');
        $listing->food1 =    $request->input('food1');
        $listing->food2 =    $request->input('food2');
        $listing->food3 =    $request->input('food3');
        $listing->food4 =    $request->input('food4');
        $listing->food5 =    $request->input('food5');
        $listing->food6 =    $request->input('food6');
        $listing->website = $request->input('website');
        $listing->facebook = $request->input('facebook');
        $listing->phone = $request->input('phone');
        $listing->user_id = Auth::user()->id;
        $listing->verified = $request->input('verified');
        $listing->published = $request->input('published');
        $listing->approved = $request->input('approved');



        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_one')) {

            #Add new photo
            $image = $request->file('featured_one');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_one;


            //here we update the database
            $listing->featured_one = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);

            $listing->save(); // this is the part that updates the changes
        }


        if ($request->hasFile('featured_two')) {

            #Add new photo
            $image = $request->file('featured_two');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_two;


            //here we update the database
            $listing->featured_two = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);

            $listing->save(); // this is the part that updates the changes
        }

        if ($request->hasFile('featured_three')) {

            #Add new photo
            $image = $request->file('featured_three');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_three;


            //here we update the database
            $listing->featured_three = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);

            $listing->save(); // this is the part that updates the changes
        }

        if ($request->hasFile('featured_four')) {

            #Add new photo
            $image = $request->file('featured_four');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_four;


            //here we update the database
            $listing->featured_four = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);

            $listing->save(); // this is the part that updates the changes
        }

        if ($request->hasFile('featured_five')) {

            #Add new photo
            $image = $request->file('featured_five');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_five;


            //here we update the database
            $listing->featured_five = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);

            $listing->save(); // this is the part that updates the changes
        }

        if ($request->hasFile('featured_six')) {

            #Add new photo
            $image = $request->file('featured_six');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->featured_six;


            //here we update the database
            $listing->featured_six = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);

            $listing->save(); // this is the part that updates the changes
        }

        $listing->save(); // this is the part that updates the changes


        flash('Listing Was Successfully Updated!', 'success');

        // Redirect to the post.show

        return redirect()->route('admin.listings.show', $listing->id);
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
        $listing = Listing::findOrFail($id);
        Storage::delete($listing->image);

        $listing->delete();

        return redirect()->route('admin.listings.index');
    }
}
