<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('department_managment.department.index',[
            'departments' => Department::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department_managment.department.create',[
            'department'=>[''],
            'users'=> User::all()
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
        $department = Department::create([
            'name'=> $request['name'],
            'description'=> $request['description'],
            'imageAvatar' => $request['imageAvatar'],
        ]);
        foreach ($request['users_id'] as $user_id){
            $user = User::find($user_id);
            $user->department_id = $department->id;
            $user->save();
        }

        $department->save();
        return redirect()->route('department_managment.department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('department_managment.department.show',[
            'department' => $department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {     
        return view('department_managment.department.edit',[
            'department'=>$department,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {

        $department->name = $request->name;
        $department->description = $request->description;
        $department->imageAvatar = $request->imageAvatar;
        $department->save();
        
        if(isset($department->user)){
            foreach ($department->user as $user){
                $user->department_id = 'Не назначен';
                $user->save();
            }
        }
        if ($request['users_id']){
            foreach ($request['users_id'] as $userId){
                $user = User::find($userId);
                $user->department_id = $department->id;
                $user->save();
            }
        }
        return redirect()->route('department_managment.department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        if(isset($department->user)){
            foreach ($department->user as $user){
                $user->department_id = 'Не назначен';
                $user->save();
            }
        }
        $department->delete();
        return redirect()->route('department_managment.department.index');
    }
}
