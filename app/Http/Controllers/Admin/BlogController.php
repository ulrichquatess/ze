<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Blog;
use Session;
use Image;
use Storage;


class BlogController extends Controller
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
        $blogs = Blog::orderBy('id', 'desc')->paginate(10);
        return view('admin.blogs.index')->withBlogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
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
        $blog = new Blog();

        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->body = $request->body;

        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/blogs/' . $filename);
            Image::make($image)->save($location);

            $blog->image = $filename;

            $blog->save();
        }

        $blog->save();

        Session::flash('success', 'The post was successfully save!');

        return redirect()->route('admin.blogs.show', $blog->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.show')->withBlog($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the service in the database and save as a var
        $blog = Blog::findOrFail($id);

        // return the view and pass in the var we previously created
        return view('admin.blogs.edit')->withBlog($blog);
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
        $blog =  Blog::find($id);

        if ($request->input('slug') == $blog->slug) {
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
        $blog = Blog::find($id);

        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->slug = $request->input('slug');

        if ($request->hasFile('featured_img')) {

            #Add new photo
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/blogs/' . $filename);
            Image::make($image)->save($location);

            $oldFilename = $blog->image;


            //here we update the database
            $blog->image = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);

            $blog->save();
        }

        $blog->save();

        // set flash data with success message
        Session::flash('success', 'This post was successfully saved.');

        // redirect with flash data to $blogs.show
        return redirect()->route('admin.blogs.show', $blog->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('admin.blogs.index');
    }
}
