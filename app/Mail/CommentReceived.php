<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;
use App\Models\User;
use App\Models\Team;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;

    private $comment;
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Team $team, Comment $comment,User $user)
    {
      $this->team = $team;  
      $this->comment = $comment;
      $this->user = $user;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.comment-received')->from('cirilaimetodij14@gmail.com')->with(
            [
        'comment' => $this->comment->content,
        'team' =>$this->team->name,
        'user' => $this->user->name
        ]
    );
    }
}
