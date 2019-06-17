<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use Session;
use Image;
use Storage;

class  SlideController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        return view('backend.slide.index')->with([
            'slide' => $slide
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDATE DATA

        $this->validate($request, [
            'title' => 'required',
            'featured_img' => 'sometimes|image'
        ]);

        // STORE DATA TO THE DATABASE

        $slide = new Slide();

        $slide->title = $request->input('title');
        $slide->content = $request->input('content');

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_img')) {
            #Add new photo
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/slide/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $slide->image;

            //here we update the database
            $slide->image = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }

        //save
        $slide->save();

        flash('Slide Created Successfully!')->success();

        return redirect()->route('slide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);

        return view('backend.slide.edit')->with('slide', $slide);
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
        $slide = Slide::find($id);

        $this->validate($request, [
            'title' => 'required',
            'featured_img' => 'sometimes|image'
        ]);


        $slide->title = $request->input('title');
        $slide->content = $request->input('content');

        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('featured_img')) {

            #Add new photo
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/slide/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $slide->image;


            //here we update the database
            $slide->image = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }

        $slide->save(); // this is the part that updates the changes


        flash('Slide Was Successfully Updated!', 'success');

        // Redirect to the post.show

        return redirect()->route('slide.index');
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
        $slide = Slide::find($id);
        Storage::delete($slide->image);

        $slide->delete();

        flash('Slide Was Successfully Deleted!', 'info');

        return redirect()->route('slide.index');
    }
}
