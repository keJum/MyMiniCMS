<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use function GuzzleHttp\json_encode;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_managment.user.index',[
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
        return view('user_managment.user.create',[
            'user' => [''],
            'role' => Role::all(),
            'specialty' => Specialty::all()
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
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        // Mail::to($user)->send(new Welcome); 

        return redirect()->route('user.index');
    }


    public function showProfile(){

        $user = User::find(Auth::id());
        
        return view('user_managment.user.show',[
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

        return view('user_managment.user.show',[
            'user' => $user
        ]);
    }
    /**
     * При обновлении пользовтеля самому пользователем 
     */

    public function editProfile(Request $request)
    {
        $user = User::find($request->userId);
        return view('user_managment.user.edit',[
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
        
        return view('user_managment.user.edit',[
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
        $user->role_id = $request['role'];
        $request['password'] == null ? : $user->password = bcrypt($request['password']);

        if ($user->developer()->count()){
            $user->developer()->update($request->only('appointment','specialty','skill','schedule'));
        }
        else {
            $user->developer()->create($request->only('appointment','specialty','skill','schedule'));
        }
        
        $user->save();

        return redirect()->route('user.index');
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6', 'confirmed']
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        // $user->role_id = $request['role'] ? $request['role'] : $user->role_id;
        $request['password'] == null ? : $user->password = bcrypt($request['password']);
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        /**
         * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
         * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
         * Добавить привзяности 
         */
        $user->delete();
        return redirect()->route('user.index');
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
        $user->image_link = $path;
        $user->save();
        return redirect()->back();
    }
    
    /**
     * Функция списка всех уведолмения авторизированого пользователя 
     * 
     */
    public function notificationIndex(){

        $user = User::find(Auth::id());
        return view('user_managment.notification.index',[
            'user' => $user,
        ]);

    }
    public function notificationRead( User $user ){
        // $notification = Notification::find($notification);

        // dd($notification);
        // $notification->update(['read_at' => Carbon::now()]);;
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        $user = User::find(Auth::id());
        return view('user_managment.notification.index',[
            'user' => $user,
        ]);
    }

    /**
     * Ajax Vue.js
     */
    public function ajaxUser(){
        $user = Auth::user();
        return json_encode($user);
    }

    public function notificationReading( Notification $notification){
        dump($notification);
    }

    public function userList(){
        $users = User::all();
        foreach( $users as $user){
            $arr[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'department' => $user->department->name,
                'role' => $user->role->name
            ];
        }
        return json_encode($arr);
    }
}
