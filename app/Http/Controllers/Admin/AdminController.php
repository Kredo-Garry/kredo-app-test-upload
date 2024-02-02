<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function index(){

        return view('admin.index');
    }

    public function deleteTeacher($id){
        User::findOrFail($id)->delete();

        return redirect()->back();
    }
    public function restoreTeacher($id){
        User::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }

    public function deactivateStudent($id){
        User::findOrFail($id)->delete();

        return redirect()->back();
    }
}
