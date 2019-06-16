<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use function GuzzleHttp\json_encode;
use App\Task;
use Carbon\Carbon;

class InvoiceTask extends Notification
{
    use Queueable;

    private $task;
    private $type;
    private $text;
    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Task $task, String $type , String $str)
    {
        $this->task = $task;
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
        return ['database','mail'];
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
                    ->line('Изменение в задаче '.$this->task->name)
                    ->action('Открыть список уведомлений', url('/user_managment/notification/index'))
                    ->line('Спасибо что пользуетесь нашим приложением');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // dd($this->describe);
        return [
            'task' => $this->task->id,
            'type' => $this->type,
            'text' => $this->text,
            'data' => $this->data
        ];
    }
}
