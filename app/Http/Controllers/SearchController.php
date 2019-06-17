<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Listing;
use App\Service;
use App\Page;
use Auth;
use Image;
use Hash;
use Mail;
use Session;
use Storage;

class SearchController extends Controller
{

    // when you search for an information what happens and how it display
    public function getSearch(Request $request)
    {

        $listing = new Listing;
        $listing = $listing->where("verified", "=", true);

        if (!empty($request->keyword)) {
            $listing = $listing->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'. $request->keyword .'%')
                    ->orWhere('description', 'LIKE', '%'. $request->keyword .'%');
            });
        }

        if (!empty($request->location)) {
            $listing = $listing->where(function ($query) use ($request) {
                $query->where('location', 'LIKE', '%'. $request->location .'%')
                    ->orWhere('food1', 'LIKE', '%'. $request->location .'%')
                    ->orWhere('food2', 'LIKE', '%'. $request->location .'%')
                    ->orWhere('food3', 'LIKE', '%'. $request->location .'%');
            });
        }


        $result_count = $listing->count();   //storing the number of approved listing present

        $listings = $listing->orderBy('created_at', 'desc')->paginate(5);
        $listings->setPath('');



        return view('search', ['listings' => $listings, 'result_count' => $result_count]);
    }

    //Posting Contact Information to Owner Gmail
    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'min:10']);

        $data = array(
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('ulrichquatess@gmail.com');
            $message->subject("Smart Restaux");
        });

        Session::flash('success', 'Your Email was Sent!');

        return redirect('/');
    }

    public function Welcome()
    {
        $page1 = Page::find(1);
        $page2 = Page::find(2);
        $page3 = Page::find(3);
        $page4 = Page::find(4);

        $services = Service::all();
        $blogs = Blog::InRandomOrder()->take(3)->get();



        $list = Listing::where("published", "=", "1")->InRandomOrder()->take(2)->get();
        $lists = Listing::where("published", "=", "1")->InRandomOrder()->take(2)->get();

        return view('welcome')->with([
                'page1' => $page1,
                'page2' => $page2,
                'page3' => $page3,
                'page4' => $page4,
                'services' => $services,
                'blogs' => $blogs,
                'list' => $list,
                'lists' => $lists,
            ]);
    }

    public function getListing($slug) {

        $listing = Listing::where('slug', '=', $slug)->first(); //Getting Single Page

        $listings = Listing::where("verified", "=", '1')->InRandomOrder()->take(3)->get();

        $blogs = Blog::InRandomOrder()->take(3)->get();

        // return the view and pass in the post object
        return view('SingleListing')->with([
            'listing' => $listing,
            'listings' => $listings,
            'blogs' => $blogs
        ]);
    }

    public function getBlog($slug) {

        $blog = Blog::where('slug', '=', $slug)->first(); //Getting Single Page

        // return the view and pass in the post object
        return view('SingleBlog')->with([
            'blog' => $blog,
        ]);
    }

    public function Blogs(){

        $blogs = Blog::paginate(6);

        return view('blogs')->with('blogs', $blogs);
    }

}

