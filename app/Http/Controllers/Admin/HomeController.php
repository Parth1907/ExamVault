<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courses;
use App\Http\Controllers\Controller;
use App\Models\Subjects;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    public function showSchoolForm()
    {
        return view('admin.school');
    }
    public function storeSchool(Request $request)
    {
        $request->validate([
            'school' => 'required|max:255',
        ]);
        Courses::create([
            'school_name' => $request->input('school')
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'School Added Succesfully!');
    }
    public function showCourseForm()
    {
        $allSchools = Courses::select('school_name')->distinct()->get();
        return view('admin.course', ['schools' => $allSchools]);
    }
    public function storeCourse(Request $request)
    {
        $request->validate([
            'school' => 'required|max:255',
            'course' => 'required|max:255',
            'semesters' => 'required|max:11',
        ]);
        $conditions = ['school_name' => $request->input('school')];
        $data = [
            'course_name' => $request->input('course'),
            'no_of_semesters' => $request->input('semesters'),
        ];
        Courses::updateOrCreate($conditions,$data);
        return redirect()->route('admin.dashboard')->with('success', 'Course Added Succesfully!');
    }
    public function showBranchForm()
    {
        $allSchools = Courses::select('school_name')->distinct()->get();
        $courses = Courses::where('school_name')->distinct()->get();
        return view('admin.branch', [
            'schools'=>$allSchools,
            'courses'=>$courses
        ]);
    }
    public function storeBranch(Request $request)
    {
        $request->validate([
            'school' => 'required|max:255',
            'course' => 'required|max:255',
            'branch' => 'required|max:255',
        ]);
        Subjects::create([
            'course_name' => $request->input('branch'),
            'branch_name' => $request->input('branch')
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'School Added Succesfully!');
    }
    public function showSubjectForm()
    {
        return view('admin.subject');
    }
}
