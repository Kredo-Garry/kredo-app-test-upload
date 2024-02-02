<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    private $student;
    const STUDENT_AVATAR_STORAGE = 'public/student/avatar';

    public function __construct(User $student)
    {
        $this->student = $student;
    }

    public function saveImage($request){
        $image_name = time().".".$request->avatar->extension();
        $request->avatar->storeAs(self::STUDENT_AVATAR_STORAGE,$image_name);
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
        $students = User::where('role_id',3)->withTrashed()->latest()->get();
        return view('admin.students.index')
                ->with('students',$students);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.students.create');
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
        $this->student->avatar = $this->saveImage($request);
        $this->student->name = $request->name;
        $this->student->email = $request->email;
        $this->student->password = Hash::make($request->password);
        $this->student->role_id = 3;

        $this->student->save();

        return redirect()->back()->with('student-added','Student added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
