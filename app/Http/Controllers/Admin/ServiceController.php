<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use Session;
use Image;
use Storage;


class ServiceController extends Controller
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
        $services = Service::orderBy('id', 'desc')->paginate(10);
        return view('admin.services.index')->withservices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
        $service = new Service;

        $service->title = $request->title;
        $service->body = $request->body;

        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/services/' . $filename);
            Image::make($image)->save($location);

            $service->image = $filename;

            $service->save();
        }

        $service->save();

        Session::flash('success', 'The service was successfully save!');

        return redirect()->route('admin.services.show', $service->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('admin.services.show')->withservice($service);
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
        $service = Service::find($id);

        // return the view and pass in the var we previously created
        return view('admin.services.edit')->withservice($service);
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
        $service = Service::find($id);

        if ($request->input('slug') == $service->slug) {
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
        $service = Service::find($id);

        $service->title = $request->input('title');
        $service->body = $request->input('body');

        if ($request->hasFile('featured_img')) {

            #Add new photo
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/services/' . $filename);
            Image::make($image)->save($location);

            $oldFilename = $service->image;


            //here we update the database
            $service->image = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);

            $service->save();
        }

        $service->save();

        // set flash data with success message
        Session::flash('success', 'This service was successfully saved.');

        // redirect with flash data to services.show
        return redirect()->route('admin.services.show', $service->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();

        Session::flash('success', 'The service was successfully deleted.');
        return redirect()->route('admin.services.index');
    }
}
