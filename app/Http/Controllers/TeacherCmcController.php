<?php

namespace App\Http\Controllers;

use App\teacherCmc;
use Illuminate\Http\Request;
use App\Models\teacherCmcs;
use Validator;
use File;

class TeacherCmcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = teacherCmcs::all();
        return response()->json([
            'data'=>$teacher
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255',
                'image' => 'required',
                'description' => 'required',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'min' => ':attribute phải lớn hơn 2 kí tự',
                'max' => ':attribute phải nhỏ hơn 255 kí tự',
            ],
            [
                'name' => 'Tên ',
                'image' => 'hình',
                'description' => 'Nội dung',
            ]
        );
        if($validator->fails()){
            return response()->json([
                'err' => $validator->errors(),200
            ]);
        }
        $exploded = explode(',',$request->image);

        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], 'jpeg')){
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }
        $fileName = str_random().'.'.$extension;

        $path = public_path().'/img/'.$fileName;
        file_put_contents($path, $decoded);
        $teacher = teacherCmcs::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $fileName,
        ]);
        return response()->json([
            'data' => $teacher,
            'message' => 'Thêm thành công'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacherCmc  $teacherCmc
     * @return \Illuminate\Http\Response
     */
    public function show(teacherCmc $teacherCmc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacherCmc  $teacherCmc
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $teacher = teacherCmcs::find($id);
        return response()->json([
            'data'=>$teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacherCmc  $teacherCmc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255',
                'image' => 'required',
                'description' => 'required',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'min' => ':attribute phải lớn hơn 2 kí tự',
                'max' => ':attribute phải nhỏ hơn 255 kí tự',
            ],
            [
                'name' => 'Tên ',
                'image' => 'hình',
                'description' => 'Nội dung',
            ]
        );
        if($validator->fails()){
            return response()->json([
                'err' => $validator->errors(),200
            ]);
        }
        $teacher = teacherCmcs::find($id);
        if($request->image === $teacher->image){
            $teacher->update(
                [
                    'name'=>$request->name,
                    'description'=>$request->description,
                    'image' => $request->image,
                ]
            );
            return response()->json([
                'message'=>'Đã sửa thành công!!'
            ]);
        }
        else {
        
            $exploded = explode(',',$request->image);

            $decoded = base64_decode($exploded[1]);
            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            } else {
                $extension = 'png';
            }
            $fileName = str_random().'.'.$extension;

            $path = public_path().'/img/'.$fileName;
            file_put_contents($path, $decoded);

            $teacher->update(
                [
                    'name'=>$request->name,
                    'description'=>$request->description,
                    'image' => $fileName,
                ]
            );
            return response()->json([
                'message'=>'Đã sửa thành công!!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacherCmc  $teacherCmc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = teacherCmcs::find($id);
        if(File::exists('img/'.$teacher->image)){
            unlink('img/'.$teacher->image);
        }
        $teacher->delete();
        return response()->json([
            'mes'=>'Đã xóa thành công!!'
        ]);
    }
}
