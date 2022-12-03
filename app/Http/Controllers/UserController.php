<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    //User register And Login===========================================>

    public function User_Register_View()
    {

        return view('Auth.User_Register');
    }


    public function User_Login_View()
    {
        return view('Auth.User_Login');
    }

    public function Error_Page()

    {
        return view('Pages.error');
    }



    public function User_DashBoard()
    {
        return view('Pages.User_Dash_Board');
    }


    public function Register(Request $request)
    {

        $valiDateData = $request->validate([

            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'types' => 'required',
            'password' => 'required'
        ]);

        $valiDateData['password'] = bcrypt($valiDateData['password']);

        $Users = User::create($valiDateData);

        auth()->login($Users);


        return redirect('/User_Login');
    }


    public function Login(Request $request)
    {

        $valiDateData = $request->validate([

            'email' => 'required|email',
            'password' => 'required',
        ]);

        // return $valiDateData;

        $position = $request['position'];
        $email = $request['email'];


        if (Auth::attempt($valiDateData)) {

            if ($position == 'student') {

                $Users = Student::where('email', '=', $email)->get();
                $Data = compact('Users');

                if (blank($Users)) {


                    return redirect('/Student_Profile');
                } else {

                    return redirect('/main_Profile');
                }
            } else {

                echo "hello";
            }
        }
    }



    // public function Student_save(Request $request)
    // {

    //     $student = new Student();

    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];

    //     $result = $student ->save();

    //     if($result)
    //     {

    //     }



    // }

    // public function Student_save(Request $request)
    // {

    //     $student = new Student();

    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];

    //     $result = $student ->save();

    //     if($result)
    //     {

    //     }



    // }


    // public function Student_save(Request $request)
    // {

    //     $student = new Student();

    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];
    //     $stduent->name = $request['name'];

    //     $result = $student ->save();

    //     if($result)
    //     {

    //     }



    // }


    public function Logout()
    {
        auth()->logout();
        return view('Pages.Homepage');
    }
}
