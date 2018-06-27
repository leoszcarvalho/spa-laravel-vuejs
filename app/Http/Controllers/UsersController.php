<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersRequest;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Users::all();
    }

    public function store(UsersRequest $request)
    {
        $users = new Users();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();

        return $users;
    }

    public function update(UsersRequest $request, $id)
    {
        $users = Users::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        
        if ($request->password) {

            $users->password =  Hash::make($request->password);

        }
        
        $users->save();

        return $users;
    }

    public function destroy($id)
    {
        $users = Users::find($id);
        $users->delete();
    }
}
