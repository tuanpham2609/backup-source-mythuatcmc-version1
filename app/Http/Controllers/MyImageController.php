<?php

namespace App\Http\Controllers;

use App\myImage;
use Illuminate\Http\Request;
use App\Models\myImages;
use Validator;
use File;

class MyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myImage = myImages::all();
        return response()->json([
            'data'=>$myImage
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
        $data = myImages::create([
            'name' => $request->name,
            'image' => $fileName,
        ]);
        return response()->json([
            'data' => $data,
            'message' => 'Thêm thành công'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\myImage  $myImage
     * @return \Illuminate\Http\Response
     */
    public function show(myImage $myImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\myImage  $myImage
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $data = myImages::find($id);
        return response()->json([
            'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\myImage  $myImage
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
        $data = myImages::find($id);
        if($request->image === $data->image){
            $data->update(
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

            $data->update(
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
     * @param  \App\myImage  $myImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(myImage $myImage)
    {
        //
    }
}
