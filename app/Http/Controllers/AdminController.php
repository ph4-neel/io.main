<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resume;
use App\Models\SelfIntro;
use App\Models\Skill;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RequestStack;

class AdminController extends Controller
{
    //

    public function Admin_Login()
    {

        return view('Auth.Admin_login');
    }

    public function Super_Admin()
    {
        return view('superadmin.admin');
    }

    public function Admin_Register(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        Admin::create($attributes);

        return redirect('/');
    }

    public function Login(Request $request)
    {
        // $email = $request['email'];

        // $Users = Admin::where('email', '=', $email)->get();
        // $Data = compact('Users');



        // if (blank($Users)) {


        //     return view('Auth.Admin_login');
        // } else {

        //     return redirect('/Super_admin');
        // }

        $ValidateData = $request->validate([

            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('admin')->attempt($ValidateData)) {

            return redirect('/');
        }
    }

    public function Save_Skills(Request $request)
    {


        $skill = new Skill();
        $skill->type = $request['type'];
        $skill->title = $request['title'];
        $skill->path = $request->file('image')->store('uploads');
        $skill->benefits = $request['benefits'];
        $skill->description = $request['description'];
        $skill->faq = $request['faq'];


        $result = $skill->save();

        if ($result) {
            return redirect('/test');
        }
    }

    public function getSkills()
    {
        $skills = Skill::all();

        $data = compact('skills');

        return view('superadmin.Admin_Skills')->with($data);
    }


    public function getSelf()
    {
        $intro = SelfIntro::all();

        $data = compact('intro');

        return view('superadmin.self')->with($data);
    }

    public function getresume()
    {
        $resume = Resume::all();

        $data = compact('resume');

        return view('superadmin.resume')->with($data);
    }

    public function getUser()
    {
        $user = User::all();

        $data = compact('user');

        return view('superadmin.User_list')->with($data);
    }


    public function getVideo()
    {
        $video = Video::all();

        $data = compact('video');

        return view('superadmin.video')->with($data);
    }

    public function Save_Intro(Request $request)
    {
        $intro = new SelfIntro();
        $intro->title = $request['title'];
        $intro->type = $request['type'];
        $intro->image = $request->file('image')->store('pic');
        $intro->description = $request['description'];
        $intro->faq = $request['faq'];
        $intro->tag = $request['tag'];

        $result = $intro->save();

        if ($result) {
            return redirect('/test');
        }
    }

    public function Save_resume(Request $request)
    {
        $resume = new Resume();
        $resume->title = $request['title'];
        $resume->type = $request['type'];
        $resume->image = $request->file('image')->store('pic');
        $resume->description = $request['description'];
        $resume->faq = $request['faq'];
        $resume->tag = $request['tag'];

        $result = $resume->save();

        if ($result) {
            return redirect('/test');
        }
    }

    public function Save_Video(Request $request)
    {
        $video = new Video();
        $video->title = $request['title'];
        $video->type = $request['type'];
        $video->image = $request->file('image')->store('pic');
        $video->description = $request['description'];
        $video->faq = $request['faq'];
        $video->tag = $request['tags'];

        $result = $video->save();

        if ($result) {
            return redirect('/test');
        }
    }
}
