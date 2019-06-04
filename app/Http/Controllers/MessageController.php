<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MessegaGet;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $message[] = $user->messageRecipient;
        $message[] = $user->messageSeder;
        // dd($message);
        
        $array=[];
        foreach ($message as $item ){
            for ($i=0; $i < count($item); $i++) { 
                $array[] = $item[$i];
            }
        }
        $message = $array;
        $message = array_unique($message);
        natsort($message);
        $groupUser=[];
        foreach ($message as $item ){
            $groupUser[$item->userSender->name] = $item;
            // $groupUser[$item->]
        }
        // dd($groupUser);
        $message = $groupUser;

        return view('user_managment.message.index',[
            'user' => $user,
            'message' => $message
        ]);
    }

    public function create(User $user)
    {   
        $auth = User::find(Auth::id());

        $message[] = Message::where('sender_id', $auth->id)->where('recipient_id',$user->id)->get();
        $message[] = Message::where('recipient_id', $auth->id)->where('sender_id',$user->id)->get();


        $array=[];
        foreach ($message as $item ){
            for ($i=0; $i < count($item); $i++) { 
                $array[] = $item[$i];
            }
        }
        $message = $array;
        $message = array_unique($message);
        natsort($message);



        return view('user_managment.message.create',[
            'user' => $user,
            'message' => $message,
            'userSend' => $user
        ]);
    }
    public function update(Request $request , User $user)
    {
        $auth = User::find(Auth::id());
        $message = Message::create([
            'sender_id' => $auth->id,
            'recipient_id' => $user->id,
            'text' => $request['text']
        ]);

        Notification::send( $user ,new MessegaGet($message,'message','Новое сообщение'));
        return back();
    }

}
