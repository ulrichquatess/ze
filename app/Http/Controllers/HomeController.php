<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Listing;
use Auth;
use Image;
use Hash;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * Such that only validated user can login
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  //Here showing the listing on the dashboard of each user

        $listings = Auth::user()->listings()->orderBy('updated_at', 'desc')->paginate(5);
        return view('home')->with([
            'listings' => $listings
        ]);
    }

    public function getMyListings()
    { // showing all listing of that particular user under his restaurant listing

        $listings = Auth::user()->listings()->orderBy('created_at', 'desc')->paginate(10);

        return view('frontend/listings/my-listing', ['listings' => $listings]);
    }

    public function getCreate()
    { //Here creating a listing for a particular user
        $listing = new Listing();
        return view('frontend/listings/create', [
            'listing' => $listing
        ]);
    }

    public function Store(Request $request)
    { // Storing that listing of that particular user
        //VALIDATE DATA

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
            'slug' => 'required',
            'featured_img' => 'sometimes|image'
        ]);

        // STORE DATA TO THE DATABASE

        $listing = new Listing();

        $listing->name = $request->input('name');
        $listing->phone = $request->input('phone');
        $listing->slug = $request->input('slug');
        $listing->email = $request->input('email');
        $listing->location = $request->input('location');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->facebook = $request->input('facebook');
        $listing->food1 =    $request->input('food1');
        $listing->food2 =    $request->input('food2');
        $listing->user_id = Auth::user()->id;
        $listing->food3 =    $request->input('food3');
        $listing->food4 =    $request->input('food4');
        $listing->food5 =    $request->input('food5');
        $listing->food6 =    $request->input('food6');
        $listing->description = $request->input('description');

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_img')) {
            #Add new photo
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/listing/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $listing->image;

            //here we update the database
            $listing->image = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }

        //save
        $listing->save();

        flash('listing Created Successfully!')->success();

        return redirect()->route('listing.index');
    }

    // Getting the Account Of Each Individual

    public function getAccount()
    { // getting the account info of that user on his/her dashboard
        return view('frontend/user/account');
    }

    public function getChangePassword()
    {
        return view('frontend/user/changepassword');
    }

    public function postChangePassword(Request $request)           // updating his info
    {

        $this->validate($request, [
            'featured_image' => 'required'
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');

        if (isset($request->password) && $request->password != "") {
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
            } else {
                flash('Passwords do not match', 'error');
                return redirect()->back()->withInput($request->except(['password', 'password_confirmation']));
            }

        }

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_image')) {

            #Add new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/users/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $user->image;


            //here we update the database
            $user->image = $filename;
            # Delete the old photo
            Storage::delete($oldFilename);
        }

        $user->save();

        flash()->error('An error occured.');
        return redirect('change-password')->with('user', $user);
    }

    // when you search for an information what happens and how it display
    public function getSearch(Request $request)
    {

        $listing = new \App\Listing;
        $listing = $listing->where("approved", "=", true);

        if (!empty($request->keyword)) {
            $listing = $listing->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'. $request->keyword .'%')
                    ->orWhere('description', 'LIKE', '%'. $request->keyword .'%');
            });
        }

        if (!empty($request->address)) {
            $listing = $listing->where(function ($query) use ($request) {
                $query->where('location', 'LIKE', '%'. $request->location .'%')
                    ->orWhere('food1', 'LIKE', '%'. $request->food1 .'%')
                    ->orWhere('food2', 'LIKE', '%'. $request->food2 .'%')
                    ->orWhere('food3', 'LIKE', '%'. $request->food3 .'%');
            });
        }


        $result_count = $listing->count();   //storing the number of approved listing present

        $listings = $listing->orderBy('created_at', 'desc')->paginate(10);
        $listings->setPath('');



        return view('search', ['listings' => $listings, 'result_count' => $result_count]);
    }
}
