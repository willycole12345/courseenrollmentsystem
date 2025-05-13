<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CourseDetails extends Component
{
    public Course $course;
 
    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.course-details');
    }
}
