<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Course;
use App\Notifications\ProcessingCommentNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class CommentsSection extends Component
{
     public $course;
    public $message;

    protected $rules = ['message' => 'required|string|min:2'];

    public function postComment() {
        $this->validate();
     $record = Comment::create([
            'course_id' => $this->course->id,
            'user_id' => Auth::id(),
            'message' => $this->message
        ]);
        $this->reset('message');
    
        Course::where('id',$record->course_id)->get();
     
      // Notification::send(Auth::user()->email, new ProcessingCommentNotification($record->message,$coursetitle->title, Auth::user()->name));

    }

    public function deleteComment($commentId) {
        $comment = Comment::findOrFail($commentId);
        if ($comment->user_id === Auth::id()) {
            $comment->delete();
        }
    }

    public function render() {
        $comments = $this->course->comments()->latest()->get();
        return view('livewire.comments-section', compact('comments'));
    }
}
