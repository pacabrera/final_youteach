<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class GradedNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $grade;
    public function __construct($grade)
    {
        $this->grade = $grade;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
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
                    ->line('You have a new grade from ' . $this->grade->klase->class_name .'!')
                    ->action('View Grades', url(route('grades', $this->grade->klase->class_id )))
                    ->line('Thank you for using Youteach!');
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
            'data' => 'graded your ' . $this->grade->type . '!',
             'user' => $this->grade->user->user_profile->given_name .' '. $this->grade->user->user_profile->family_name ,
             'url' =>  route('grades', $this->grade->klase->class_id ),
              'class' => $this->grade->klase->class_name,
        ];
    }
}
