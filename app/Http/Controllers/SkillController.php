<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\SelfIntro;
use App\Models\Skill;
use App\Models\Video;
use Illuminate\Http\Request;
use LDAP\Result;

class SkillController extends Controller
{
    //
    public function get_Soft()
    {

        $skills = Skill::all();

        $data = compact('skills');

        return view('Pages.soft_skills')->with($data);
    }

    public function Skills_Details($id)
    {

        $skill = Skill::find($id);

        $data = compact('skill');

        return view('Pages.blog_details')->with($data);
    }


    public function get($id)
    {

        $skill = Skill::find($id);

        $data  = compact('skill');

        return view('superadmin.Update_Skills')->with($data);
    }


    public function Update($id, Request $request)
    {

        $skill = Skill::find($id);
        $skill->title = $request['title'];
        $skill->benefits = $request['benefits'];
        $skill->description = $request['description'];
        $skill->faq = $request['faq'];

        $skill->save();

        return redirect('/test');
    }

    public function get_self($id)
    {

        $skill = SelfIntro::find($id);

        $data  = compact('skill');

        return view('superadmin.Update')->with($data);
    }


    public function Update_self($id, Request $request)
    {

        $skill = SelfIntro::find($id);
        $skill->title = $request['title'];
        $skill->description = $request['description'];
        $skill->faq = $request['faq'];
        $skill->tag = $request['tag'];

        $skill->save();

        return redirect('/test');
    }

    public function get_resume($id)
    {

        $skill = Resume::find($id);

        $data  = compact('skill');

        return view('superadmin.Update')->with($data);
    }


    public function Update_resume($id, Request $request)
    {

        $skill = Resume::find($id);
        $skill->title = $request['title'];
        $skill->description = $request['description'];
        $skill->faq = $request['faq'];
        $skill->tag = $request['tag'];

        $skill->save();

        return redirect('/test');
    }

    public function get_video($id)
    {

        $skill = Video::find($id);

        $data  = compact('skill');

        return view('superadmin.Update')->with($data);
    }


    public function Update_video($id, Request $request)
    {

        $skill = Video::find($id);
        $skill->title = $request['title'];
        $skill->description = $request['description'];
        $skill->faq = $request['faq'];
        $skill->tag = $request['tag'];

        $skill->save();

        return redirect('/test');
    }

    public function Skill_delete($id)
    {
        $result = Skill::find($id)->delete();

        if($result){

            return redirect('/test');

        }
    }

    public function intro_delete($id)
    {
        $result = SelfIntro::find($id)->delete();

        if($result){

            return redirect('/test');

        }
    }

    public function resume_delete($id)
    {
        $result = Resume::find($id)->delete();

        if($result){

            return redirect('/test');

        }
    }

    public function video_delete($id)
    {
        $result = Video::find($id)->delete();

        if($result){

            return redirect('/test');

        }
    }
}
