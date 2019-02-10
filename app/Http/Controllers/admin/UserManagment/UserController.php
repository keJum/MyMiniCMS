<?php

namespace App\Http\Controllers\Admin\UserManagment;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user_managment.user.index',[
            'users' => User::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_managment.user.create',[
            'user'=>['']
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
        
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role' => $request['role']
        ]);
        // $user = User::create($request->all());
        $user->developer()->create($request->only('appointment','specialty','skill','schedule'));

        // Mail::to($user)->send(new Welcome); 

        return redirect()->route('admin.user_managment.user.index');
    }


    public function showProfile(){

        $user = User::find(Auth::id());
        
        return view('admin.user_managment.user.show',[
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('admin.user_managment.user.show',[
            'user' => $user
        ]);
    }
    /**
     * При обновлении пользовтеля самому пользователем 
     */

    public function editProfile(Request $request)
    {
        $user = User::find($request->userId);
        return view('admin.user_managment.user.edit',[
            'user'=>$user
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view('admin.user_managment.user.edit',[
            'user'=>$user
        ]);
    }


    public function updateProfile(Request $request)
    {
        // dd($request);
        $user = User::find($request->userId);
        // dd($user);
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6', 'confirmed']
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        // $user->imageAvatar = $request['imageAvatar'];
        $request['password'] == null ? : $user->password = bcrypt($request['password']);
        // dd($request);

        if ($user->developer()->count()){
            $user->developer()->update($request->only('appointment','specialty','skill','schedule'));
        }
        else {
            $user->developer()->create($request->only('appointment','specialty','skill','schedule'));
        }
        
        $user->save();

        return redirect()->route('admin.user_managment.user.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6', 'confirmed']
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->imageAvatar = $request['imageAvatar'];
        $request['password'] == null ? : $user->password = bcrypt($request['password']);
        // dd($request);

        if ($user->developer()->count()){
            $user->developer()->update($request->only('appointment','specialty','skill','schedule'));
        }
        else {
            $user->developer()->create($request->only('appointment','specialty','skill','schedule'));
        }
        
        $user->save();

        return redirect()->route('admin.user_managment.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->developer()->delete();
        $user->delete();
        return redirect()->route('admin.user_managment.user.index');
    }

    /**
     * Image load file, avatar profile
     * Создать ссылку на дерикторию public [php .\artisan storage:link]
     * @param  \Illuminate\Http\Request  $request
     * @return boolean 
     */
    public function uploadImageAvatar(Request $request,User $user)
    {
        /**
         * необходимо прописать в маршруте путь /image/upload/{user}
         */
        $path = $request->file('image')->store('avatar','public');
        $user->imageAvatar = $path;
        $user->save();
        return redirect()->back();
    }
}
