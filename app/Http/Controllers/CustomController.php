<?php

namespace App\Http\Controllers;

use App\Custom;
use Illuminate\Http\Request;
use App\Models\Customs;
use Validator;

class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $exploded = explode(',',$request->logo);

        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], 'jpeg')){
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }
        $fileName = str_random().'.'.$extension;

        $path = public_path().'/img/'.$fileName;
        file_put_contents($path, $decoded);
        //logo
        $exploded1 = explode(',',$request->imgPr);

        $decoded1 = base64_decode($exploded1[1]);
        if(str_contains($exploded1[0], 'jpeg')){
            $extension1 = 'jpg';
        } else {
            $extension1 = 'png';
        }
        $fileName1 = str_random().'.'.$extension1;

        $path1 = public_path().'/img/'.$fileName1;
        file_put_contents($path1, $decoded1);
        //img pr

        $custom = Customs::create([
            'name1' => $request->name1,
            'name2' => $request->name2,
            'name3' => $request->name3,
            'name4' => $request->name4,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3,
            'content4' => $request->content4,
            'logo' => $fileName,
            'imgPr' => $fileName1,
        ]);
        return response()->json([
            'data' => $custom,
            'message' => 'Thêm thành công'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function show(Custom $custom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $custom = Customs::find($id);
        return response()->json([
            'data'=>$custom
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $custom = Customs::find($id);

        // $validator = Validator::make($request->all(),
        //     [
        //         'content' => 'required|min:2',
        //         'image' => 'required',
        //     ],
        //     [
        //         'required' => ':attribute không được bỏ trống',
        //         'min' => ':attribute phải lớn hơn 2 kí tự',
        //     ],
        //     [
        //         'content' => 'Tên bài viết',
        //         'image' => 'hình',
        //     ]
        // );
        // if($validator->fails()){
        //     return response()->json([
        //         'err' => $validator->errors(),200
        //     ]);
        // }

        if($request->logo === $custom->logo && $request->imgPr === $custom->imgPr && $request->imgcustom === $custom->imgcustom ){
            $custom->update(
                [
                    'content1'=>$request->content1,
                    'content2'=>$request->content2,
                    'content3'=>$request->content3,
                    'content4'=>$request->content4,
                    'name1'=>$request->name1,
                    'name2'=>$request->name2,
                    'name3'=>$request->name3,
                    'name4'=>$request->name4,
                    'logo' => $request->logo,
                    'imgPr' => $request->imgPr,
                    'imgcustom' => $request->imgcustom,
                ]
            );
            return response()->json([
                'message'=>'Đã sửa thành công!!'
            ]);
        }
        if($request->logo !== $custom->logo && $request->imgPr === $custom->imgPr && $request->imgcustom === $custom->imgcustom ){
            //LOGO
            $exploded = explode(',',$request->logo);

            $decoded = base64_decode($exploded[1]);
            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            } else {
                $extension = 'png';
            }
            $fileName = str_random().'.'.$extension;

            $path = public_path().'/img/'.$fileName;
            file_put_contents($path, $decoded);
            $custom->update(
                [
                    'content1'=>$request->content1,
                    'content2'=>$request->content2,
                    'content3'=>$request->content3,
                    'content4'=>$request->content4,
                    'name1'=>$request->name1,
                    'name2'=>$request->name2,
                    'name4'=>$request->name4,
                    'name3'=>$request->name3,
                    'logo' => $fileName,
                    'imgPr' => $request->imgPr,
                    'imgcustom' => $request->imgcustom,
                ]
            );
            return response()->json([
                'message'=>'Đã sửa thành công!!'
            ]);
        }
        if($request->logo === $custom->logo && $request->imgPr !== $custom->imgPr && $request->imgcustom === $custom->imgcustom ){

            $exploded1 = explode(',',$request->imgPr);

            $decoded1 = base64_decode($exploded1[1]);
            if(str_contains($exploded1[0], 'jpeg')){
                $extension1 = 'jpg';
            } else {
                $extension1 = 'png';
            }
            $fileName1 = str_random().'.'.$extension1;

            $path1 = public_path().'/img/'.$fileName1;
            file_put_contents($path1, $decoded1);
            //img pr
            $custom->update(
                [
                    'content1'=>$request->content1,
                    'content2'=>$request->content2,
                    'content3'=>$request->content3,
                    'content4'=>$request->content4,
                    'name1'=>$request->name1,
                    'name2'=>$request->name2,
                    'name3'=>$request->name3,
                    'name4'=>$request->name4,
                    'logo' => $request->logo,
                    'imgcustom' => $request->imgcustom,
                    'imgPr' => $fileName1,
                ]
            );
            return response()->json([
                'message'=>'Đã sửa thành công!!'
            ]);
        }
        if($request->logo === $custom->logo && $request->imgPr === $custom->imgPr && $request->imgcustom !== $custom->imgcustom ){

            $exploded2 = explode(',',$request->imgPr);

            $decoded2 = base64_decode($exploded2[1]);
            if(str_contains($exploded2[0], 'jpeg')){
                $extension2 = 'jpg';
            } else {
                $extension2 = 'png';
            }
            $fileName2 = str_random().'.'.$extension2;

            $path2 = public_path().'/img/'.$fileName2;
            file_put_contents($path2, $decoded2);
            //img pr
            $custom->update(
                [
                    'content1'=>$request->content1,
                    'content2'=>$request->content2,
                    'content3'=>$request->content3,
                    'content4'=>$request->content4,
                    'name1'=>$request->name1,
                    'name2'=>$request->name2,
                    'name3'=>$request->name3,
                    'name4'=>$request->name4,
                    'logo' => $request->logo,
                    'imgcustom' => $fileName2,
                    'imgPr' =>  $request->imgPr,
                ]
            );
            return response()->json([
                'message'=>'Đã sửa thành công!!'
            ]);
        }
        else {
            //LOGO
            $exploded = explode(',',$request->logo);

            $decoded = base64_decode($exploded[1]);
            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            } else {
                $extension = 'png';
            }
            $fileName = str_random().'.'.$extension;

            $path = public_path().'/img/'.$fileName;
            file_put_contents($path, $decoded);
            //logo
            $exploded1 = explode(',',$request->imgPr);

            $decoded1 = base64_decode($exploded1[1]);
            if(str_contains($exploded1[0], 'jpeg')){
                $extension1 = 'jpg';
            } else {
                $extension1 = 'png';
            }
            $fileName1 = str_random().'.'.$extension1;

            $path1 = public_path().'/img/'.$fileName1;
            file_put_contents($path1, $decoded1);
            //img pr

            $exploded2 = explode(',',$request->imgPr);

            $decoded2 = base64_decode($exploded2[1]);
            if(str_contains($exploded2[0], 'jpeg')){
                $extension2 = 'jpg';
            } else {
                $extension2 = 'png';
            }
            $fileName2 = str_random().'.'.$extension2;

            $path2 = public_path().'/img/'.$fileName2;
            file_put_contents($path2, $decoded2);
            $custom->update(
                [
                    'name1' => $request->name1,
                    'name2' => $request->name2,
                    'name3' => $request->name3,
                    'content1' => $request->content1,
                    'content2' => $request->content2,
                    'content3' => $request->content3,
                    'logo' => $fileName,
                    'imgPr' => $fileName1,
                    'imgcustom' => $fileName2,
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
     * @param  \App\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Custom $custom)
    {
        //
    }
}
