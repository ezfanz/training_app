<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Photo;

use App\Role;

class AdminUsersController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
//

$users = User::all();

//make users compact
return view('admin.users.index', compact('users'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//

$roles = Role::lists('name','id')->all();


return view('admin.users.create', compact('roles'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(UsersRequest $request)
{
//

$input = $request->all();

if ($file = $request->file('photo_id')) {
  // code...

$name = time() . $file->getClientOriginalName();

$file->move('images', $name);

//create the file
$photo = Photo::create(['file'=>$name]);

$input['photo_id'] = $photo->id;

}

$input['password'] = bcrypt($request->password);

User::create($input);


// return redirect('/admin/users');


// return $request->all();

// return view('admin.users.store');
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
return view('admin.users.show');
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
//
return view('admin.users.edit');
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
//
return view('admin.users.update');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
//
}
}
