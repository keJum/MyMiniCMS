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
        // dd($request);
        $department = Department::create([
            'name'=> $request['name'],
            'description'=> $request['description'],
            'imageAvatar' => $request['imageAvatar'],
        ]);
        for( $i = 0 ; $i < count($request['taskRespon_id']) ; $i++){
            $user = User::find($request['taskRespon_id'][$i]);
            $user->department = $department->id;
            $user->save();
        }


        // $department->developer()->create([
        //     'department_id' => $department->id
        // ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {

        // dd($request);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->imageAvatar = $request->imageAvatar;

        // $department->users()->update([
        //     'department_id' => 'не указанно',
        // ]);

        // $department->user

        foreach($department->users as $user){
            $user->department = 'не указанно';
            $user->save();
        }
        
        $department->save();
        
        
        if ($request['taskRespon_id']){
            foreach ($request['taskRespon_id'] as $depUser){
                $user = User::find($depUser);
                $user->department = $department->id;
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
        foreach( $department->users as $user){
            $user->department = 'не указанно';
        }
        $department->delete();
        
        return redirect()->route('department_managment.department.index');
    }
}
