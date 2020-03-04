<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Departaments;
use App\User;

class DepartamentsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $departaments = \App\Departaments::with('users')->get();
        $collection = (new Collection($departaments))->paginate(4);
        return view('departaments.index', ['departaments' => $collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $users = User::all();
        return view('departaments.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
         $request->validate([
          'title'=>'required|unique:departaments|min:4',
          'description'=>'required|min:10',
          'file'=>'mimes:jpeg,jpg,png,gif|required|max:250',
          'checkbox' =>'accepted'
          ]); 
        $image = $request->file('file');
        $extension = $image->clientExtension();
        Storage::disk('images')->put($image->getFilename() . '.' . $extension, File::get($image));
        $departament = new Departaments();
        $departament->title = $request->title;
        $departament->description = $request->description;
        $departament->logo = $image->getFilename() . '.' . $extension;
        $departament->save();
        $usersIds = $request->all()['user_id'];
        $insertRecords = [];
        foreach ($usersIds as $userId) {
            $insertRecords[] = [
                'user_id' => $userId,
                'departament_id' => $departament->id,
            ];
        }
        $userDepartaments = DB::table('users_departaments')
                ->insert($insertRecords);

        return redirect()->route('departaments.index')
                        ->with('success', 'Departament added successfully...');
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
        
        $departament = \App\Departaments::find($id);
        $users = User::all();
        return view('departaments.edit', ['departament' => $departament,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $logo = DB::table('departaments')
                        ->where('id', $id)->value('logo');
        $image = $request->file('file');
        $extension = $image->clientExtension();
        $storage = Storage::disk('images');
        $storage->put($image->getFilename() . '.' . $extension, File::get($image));
        $storage->delete($logo);
        $departament = new Departaments();
        $departament->title = $request->title;
        $departament->description = $request->description;
        $departament->logo = $image->getFilename() . '.' . $extension;
        $departament->save();
        $usersIds = $request->all()['user_id'];
        $insertRecords = [];
        foreach ($usersIds as $userId) {
            $insertRecords[] = [
                'user_id' => $userId,
                'departament_id' => $departament->id,
            ];
        }
        $userDepartaments = DB::table('users_departaments')
                ->insert($insertRecords);

        return redirect()->route('departaments.index')
                        ->with('success', 'Departament added successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Departaments::where('id', $id)->delete();
        return redirect('/departaments')
                        ->with('success', 'Departaments Deleted Successfully');
    }

}
