<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    private $teacher;
    const TEACHER_AVATAR_STORAGE = 'public/teacher/avatar';
    public function __construct(User $teacher)
    {
        $this->teacher = $teacher;
    }
    public function saveImage($request)
    {
        $image_name = time() . "." . $request->avatar->extension();
        $request->avatar->storeAs(self::TEACHER_AVATAR_STORAGE, $image_name);
        return $image_name;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers =  User::where('role_id', 2)->withTrashed()->latest()->get();
        return view('admin.teachers.display')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->teacher->avatar = $this->saveImage($request);
        $this->teacher->name = $request->name;
        $this->teacher->email = $request->email;
        $this->teacher->password = Hash::make($request->password);
        $this->teacher->role_id = 2;

        $this->teacher->save();

        return redirect()->back()->with('teacher-added', 'Teacher added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        //
    }
    public function bookedClasses()
    {
        $classes =  Classroom::withTrashed()->where('teacher_id', Auth::id())->get();

        return view('users.teachers.classes.index')
            ->with('classes', $classes);
    }
    public function endClass($class_id)
    {
        $class =  Classroom::findOrFail($class_id);
        $class->status = 'ended';
        $class->save();

        $class->delete();



        return redirect()->back()->with('class-end', 'Class has been ended');
    }
}
