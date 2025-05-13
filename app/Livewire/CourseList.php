<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Enrollment;
use App\Notifications\EnrollmentNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithPagination;

class CourseList extends Component
{
    public $filter = 'all';
    use WithPagination;

    protected $paginationTheme = 'tailwind'; 

     protected $updatesQueryString = ['filter', 'page'];

    public function updatingFilter()
    {
        $this->resetPage();
    }
    public function render() {
        $query = Course::withCount('comments')->with('enrollments');

        if ($this->filter === 'enrolled') {
            $query->whereHas('enrollments', fn($q) => $q->where('user_id', Auth::id()));
        } elseif ($this->filter === 'not_enrolled') {
            $query->whereDoesntHave('enrollments', fn($q) => $q->where('user_id', Auth::id()));
        }

        return view('livewire.course-list', [
            'courses' => $query->paginate(10)
        ]);
    }

    public function enroll($courseId) {
       $record =  Enrollment::firstOrCreate(['user_id' => Auth::id(), 'course_id' => $courseId]);
       $coursetitle = Course::where('id',$record->course_id)->get();
     //  dd( Auth::user()->email);
    //    dd( $coursetitle);
     Notification::send(Auth::user()->email, new EnrollmentNotification($coursetitle->title,Auth::user()->name));


    }

    public function cancel($courseId) {
        Enrollment::where('user_id', Auth::id())->where('course_id', $courseId)->delete();
    }
   
}
