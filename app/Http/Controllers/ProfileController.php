<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Student;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //


    public function Student_Profile()
    {
        return view('Auth.Student_Profile');
    }

    public function Save_Student(Request $request)
    {

        $student = new Student();
        $student->name = $request['name'];
        $student->headline = $request['headline'];
        $student->email = $request['email'];
        $student->position = $request['position'];
        $student->education = $request['education'];
        $student->location = $request['location'];
        $student->mobile = $request['mobile'];
        $student->college = $request['college'];

        $result = $student->save();

        if ($result) {

            return redirect('/main_Profile');
        }
    }

    public function Save_Employee(Request $request)
    {

        $employee = new Employee();
        $employee->name = $request['name'];
        $employee->email = $request['email'];
        $employee->job_title = $request['job_title'];
        $employee->organization = $request['organization'];
        $employee->country = $request['country'];
        $employee->company = $request['company'];
        $employee->job_type = $request['job_type'];

        $employee->save();
    }

    public function get_Student()
    {
        $email = auth()->user()->email;

        $student= Student::where('email', '=', $email)->get();
        $data = compact('student');

        return view('Auth.Student_main')->with($data);
    }

    public function get_Employee($email)
    {
    }
}
