<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{
    //
    private $classroom;
    private $user;

    public function __construct(Classroom $classroom,User $user)
    {
        $this->classroom = $classroom;
        $this->user = $user;
    }

    public function index(){
        $all_class = Classroom::all();


        return view('users.teachers.booking.index')->with('all_class',$all_class);
    }

    public function teacherBookClass($classID){
       $class =  $this->classroom->findOrFail($classID);
       $class->teacher_id = Auth::id();
        $class->save();

        return redirect()->back()->with('book-success','Class successfully booked');
    }
    public function studentBookClass($classID){
       $class =  $this->classroom->findOrFail($classID);
       $class->student_id = Auth::id();
       $class->status = 'booked';
       $class->save();

        return redirect()->back()->with('book-success','Class successfully booked');
    }


}
