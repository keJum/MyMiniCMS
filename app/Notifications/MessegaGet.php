<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Message;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\String_;

class MessegaGet extends Notification
{
    use Queueable;

    private $message;
    private $type;
    private $sender;
    private $text;
    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Message $message, String $type, String $str)
    {
        $this->message = $message;
        $this->sender = $message->userSender->name;
        $this->type = $type;
        $this->text = $str;
        $this->data = Carbon::now()->toDateString();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'sender' => $this->sender,
            'message' => $this->message,
            'text'=>$this->text,
            'type' => $this->type,
            'data' => $this->data
        ];
    }
}
