<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use Session;
use Purifier;
use Image;
use Storage;


class PageController extends Controller
{

    public function __construct() {
        $this->middleware(['auth:admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.index')->withpages($pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'body'          => 'required',
        ));

        // store in the database
        $page = new Page;

        $page->title = $request->title;
        $page->sub_title = $request->sub_title;
        $page->body = $request->body;

        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/pages/' . $filename);
            Image::make($image)->save($location);

            $page->image = $filename;

            $page->save();
        }

        $page->save();


        Session::flash('success', 'The page was successfully save!');

        return redirect()->route('admin.pages.show', $page->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = page::find($id);
        return view('admin.pages.show')->withpage($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the page in the database and save as a var
        $page = page::find($id);

        // return the view and pass in the var we previously created
        return view('admin.pages.edit')->withpage($page);
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
        // Validate the data
        $page = page::find($id);

        if ($request->input('slug') == $page->slug) {
            $this->validate($request, array(
                'title'         => 'required|max:255',
                'body'          => 'required',
            ));
        } else {
            $this->validate($request, array(
                'title'         => 'required|max:255',
                'body'          => 'required',
                'featured_img' => 'sometimes|image'
            ));
        }

        // Save the data to the database
        $page = page::find($id);

        $page->title = $request->input('title');
        $page->sub_title = $request->input('sub_title');
        $page->body = $request->input('body');

        if ($request->hasFile('featured_img')) {

            #Add new photo
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/pages/' . $filename);
            Image::make($image)->save($location);

            $oldFilename = $page->image;


            //here we update the database
            $page->image = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);

            $page->save();
        }

        $page->save();

        // set flash data with success message
        Session::flash('success', 'This page was successfully saved.');

        // redirect with flash data to pages.show
        return redirect()->route('admin.pages.show', $page->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = page::find($id);

        $page->delete();

        Session::flash('success', 'The page was successfully deleted.');
        return redirect()->route('admin.pages.index');
    }
}
