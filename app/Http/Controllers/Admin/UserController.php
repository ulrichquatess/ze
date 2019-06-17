<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;
use Session;
use Image;
use Storage;

class UserController extends Controller
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
        
        $users = User::all();

        return view('admin/user/index', ['users' => $users]);
    }

    public function create()
    {
        $user = new User();
        return view('admin/user/create', ['user' => $user]);
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
        $user = new User;

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'logo' => 'sometimes|image'

        ]);

        // STORE DATA TO THE DATABASE

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->verified = $request->input('verified') ;

        if (isset($request->password) && $request->password != "") {
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
            } else {
                flash('Passwords do not match', 'error');
                return redirect()->back()->withInput($request->except(['password', 'password_confirmation']));
            }

        }

        $user->save();

        flash('User Was Successfully Created!', 'success');


        return redirect()->route('admin.users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user.show')->with('user', $user);
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
        $user = User::find($id);

        // Return the view page here
        return view('admin.user.edit')->with('user', $user);
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
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'logo' => 'sometimes|image'
        ]);


        // save the data to the database NOTE :: here it is different from the other once

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->verified = $request->input('verified');

        if (isset($request->password) && $request->password != "") {
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
            } else {
                flash('Passwords do not match', 'error');
                return redirect()->back()->withInput($request->except(['password', 'password_confirmation']));
            }

        }



        //HERE WE are checking if someone added a photo or not
        if ($request->hasFile('logo')) {

            #Add new photo
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/logo/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $user->image;


            //here we update the database
            $user->image = $filename;

            # Delete the old photo
            Storage::delete($oldFilename);
        }

        $user->save(); // this is the part that updates the changes


        flash('User Was Successfully Updated!', 'success');

        // Redirect to the post.show

        return redirect()->route('admin.users.show', $user->id);
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
        $user = User::find($id);
        Storage::delete($user->image);

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
