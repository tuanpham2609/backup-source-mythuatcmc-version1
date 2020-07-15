<?php

namespace App\Http\Controllers;

use App\studyCmc;
use Illuminate\Http\Request;
use App\Models\studyCmcs;
use Validator;
use File;

class StudyCmcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $study = studyCmcs::all();
        return response()->json([
            'data'=>$study
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'min' => ':attribute phải lớn hơn 2 kí tự',
                'max' => ':attribute phải nhỏ hơn 255 kí tự',
            ],
            [
                'name' => 'Tên ',
                'image' => 'hình',
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
        $study = studyCmcs::create([
            'name' => $request->name,
            'image' => $fileName,
        ]);
        return response()->json([
            'data' => $study,
            'message' => 'Thêm thành công'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\studyCmc  $studyCmc
     * @return \Illuminate\Http\Response
     */
    public function show(studyCmc $studyCmc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\studyCmc  $studyCmc
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $study = studyCmcs::find($id);
        return response()->json([
            'data'=>$study
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\studyCmc  $studyCmc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255',
                'image' => 'required',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'min' => ':attribute phải lớn hơn 2 kí tự',
                'max' => ':attribute phải nhỏ hơn 255 kí tự',
            ],
            [
                'name' => 'Tên ',
                'image' => 'hình',
            ]
        );
        if($validator->fails()){
            return response()->json([
                'err' => $validator->errors(),200
            ]);
        }
        $study = studyCmcs::find($id);
        if($request->image === $study->image){
            $study->update(
                [
                    'name'=>$request->name,
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

            $study->update(
                [
                    'name'=>$request->name,
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
     * @param  \App\studyCmc  $studyCmc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study = studyCmcs::find($id);
        if(File::exists('img/'.$study->image)){
            unlink('img/'.$study->image);
        }
        $study->delete();
        return response()->json([
            'mes'=>'Đã xóa thành công!!'
        ]);
    }
}
