<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Crypt;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = DB::table('users')->paginate(3);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validateData = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8'
                ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.require' => 'Password is required and min lenght 8 characters'
        ]);
       $validateData['password'] = bcrypt($request->password);

        $user = User::create($validateData);
        return redirect('/users')
                        ->with('success', 'User Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8'
                ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.require' => 'Password is required and min lenght 8 characters'
        ]);
        $userUpdate = ['name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)];
        User::where('id', $id)->update($userUpdate);
        return redirect('/users')->with('success', 'User Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        User::where('id', $id)->delete();
        return redirect('/users')
                ->with('success', 'User Deleted Successfully');
    }

}
