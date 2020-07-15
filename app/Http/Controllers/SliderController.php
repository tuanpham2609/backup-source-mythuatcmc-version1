<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Models\Sliders;
use Validator;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Sliders::all();
        return response()->json([
            'data'=>$slider
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
        $slider = Sliders::create([
            'name' => $request->name,
            'slug' => utf8tourl($request->name),
            'image' => $fileName,
        ]);
        return response()->json([
            'data' => $slider,
            'message' => 'Thêm thành công'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $slider = Sliders::find($id);
        return response()->json([
            'data'=>$slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
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
        $slider = Sliders::find($id);
        if($request->image === $slider->image){
            $slider->update(
                [
                    'name'=>$request->name,
                    'slug'=>utf8tourl($request->name),
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

            $slider->update(
                [
                    'name'=>$request->name,
                    'slug'=>utf8tourl($request->name),
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
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Sliders::find($id);
        if(File::exists('img/'.$slider->image)){
            unlink('img/'.$slider->image);
        }
        $slider->delete();
        return response()->json([
            'mes'=>'Đã xóa thành công!!'
        ]);
    }
}
