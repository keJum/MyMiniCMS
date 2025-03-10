<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use function GuzzleHttp\Promise\all;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role_managment.role.index',[
            'roles' => Role::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role_managment.role.create',[
            'role' => '',
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accessResult ='';
        foreach ( $request['access'] as $access ){
            $accessResult .= $access;
        }
        Role::create([
            'name' => $request['name'],
            'describe' => $request['describe'],
            'access' => $accessResult
        ]);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('role_managment.role.show',[
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('role_managment.role.edit',[
            'role' => $role,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        foreach($request['users'] as $idUser){
            $user = User::find($idUser);
            $user->role_id = $role->id;
        }

        $accessResult ='';
        foreach ( $request['access'] as $access ){
            $accessResult .= $access;
        }
        $role->name = $request['name'];
        $role->describe = $request['describe'];
        $role->access = $accessResult;

        $user->save();
        $role->save();

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->user()->role = '';
        $role->delete();
        return redirect()->route('role.index');
    }
}
