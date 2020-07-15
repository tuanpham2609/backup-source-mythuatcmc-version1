<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\studyCmcs;
use App\Models\teacherCmcs;
use App\Models\Posts;
use App\Models\Customs;
use App\Models\Aboutscmc;
use App\Models\Categories;
use App\Models\myImages;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class cmcapi extends Controller
{   
    public function __construct(){
        $customs = Customs::all();
        $cate = Categories::take(4)->get();
        view()->share('customs',$customs);
        view()->share('cate',$cate);
    }
    public function indexcmc(){
        return view('webcmc.pages.index');
    }
    public function gioithieucmc(){
        return view('webcmc.pages.about');
    }
    public function lienhecmc(){
        return view('webcmc.pages.contact');
    }
    public function hinhchungcmc(){
        return view('webcmc.pages.myimage');
    }
    public function tintuccmc(){
        return view('webcmc.pages.post');
    }
    public function getApiCmc(){
        $slider = Sliders::all();
        $study = studyCmcs::all();
        $teacher = teacherCmcs::all();
        $postLight = Posts::where('new_highlights',1)->take(12)->get();
        $postcmc = Posts::where('new_highlights',0)->take(6)->get();
        $postcmc1 = Posts::where('new_highlights',0)->take(2)->get();
        $customs = Customs::all();
        $cate = Categories::take(4)->get();
        return response()->json([
            'slider'=>$slider,
            'study'=>$study,
            'teacher'=>$teacher,
            'postLight'=> $postLight,
            'postcmc' => $postcmc,
            'postcmc1' => $postcmc1,
            'customCmc' => $customs,
            'catecmc' => $cate,
        ]);
    }
    public function getApiNew(){
        $post = Posts::paginate(8);
        $newPost = Posts::where('new_highlights',0)->take(8)->get();
        return  response()->json([
            'data' => $post,
            'newPost'=>$newPost
        ]);
    }
    public function getPostDetail($id){
        $post = Posts::find($id);
        $tuancmc = Posts::where('new_highlights',0)->take(3)->get();
        return view('webcmc.pages.postdetail',compact('post','tuancmc'));
    }
    public function getPost($id){
        $postNew = Posts::where('idCategory',$id)->get();
        return view('webcmc.pages.postSearch',compact('postNew'));
    }
    public function getaboutapi(){
        $about = Aboutscmc::all();
        return response()->json([
            'data'=>$about
        ]);
    }
    public function getmyimageapi(){
        $myimage = myImages::all();
        return response()->json([
            'data'=>$myimage
        ]);
    }
    //
    public function login(){
        return view('webcmc.pages.login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('admin/theloai');
        } else {
            return redirect('admin/login')->with('thongbao','Đăng nhập thất bại !!');
        }
    }
    public function logoutCmc(){
        Auth::logout();
        return redirect('admin/login');
    }
}
