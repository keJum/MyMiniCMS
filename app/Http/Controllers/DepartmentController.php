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

        /**
         * Связь одни ко одному, так как нужен только одни руководитель 
         */
        // $department->responsible = $request['responsible'];
        
        /**
         * Свзязь один ко многим, несколько разработчиков
         */
        foreach ($request['taskRespon_id'] as $responsible){
            $user = User::find($responsible);
            $user->department = $department->id;
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {

        $department->name = $request->name;
        $department->description = $request->description;
        $department->imageAvatar = $request->imageAvatar;
        $department->save();
        
        if(isset($department->users)){
            foreach ($department->users as $user){
                $user->department = 'Не назначен';
                $user->save();
            }
        }
        if ($request['taskRespon_id']){
            foreach ($request['taskRespon_id'] as $userId){
                $user = User::find($userId);
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
        // foreach( $department->responsibles as $responsible){
        //     $responsible->department = 'не указанно';
        //     dd($responsible);
        // }
        if(isset($department->users)){
            foreach ($department->users as $user){
                $user->department = 'Не назначен';
                $user->save();
            }
        }

        $department->delete();
        
        return redirect()->route('department_managment.department.index');
    }
}
