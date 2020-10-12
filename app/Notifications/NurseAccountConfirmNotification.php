<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NurseAccountConfirmNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $data = array();
    public $email_data = array();
    public function __construct($data,$email_data)
    {
        $this->data = $data;
        $this->email_data = $email_data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->greeting($this->email_data['greeting'].$this->data['name'])
                    ->subject($this->email_data['subject'])
                    ->line($this->email_data['line'])
                    ->line($this->email_data['otp_code'].$this->data['code'])
                    ->action($this->email_data['action'], url(route('nurse.account.verify',['verify_token'=>$this->data['verify_token']])))
                    ->line($this->email_data['finish_line']);
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
            //
        ];
    }
}
