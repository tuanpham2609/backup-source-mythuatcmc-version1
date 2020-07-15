<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\Sliders;
use App\Models\Aboutscmc;
use App\Models\studyCmcs;
use App\Models\teacherCmcs;
use App\Models\Customs;
use App\Models\myImages;

use Validator;
use File;

class mtCmcController extends Controller
{
    public function updateCate(Request $request, $id){
        $category = Categories::find($id);
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255'
            ],
            [
                'required'=>'Tên danh mục không được bỏ trống',
                'min'=>'Tên danh mục phải lớn hơn 2 kí tự',
                'max'=>'Tên danh mục phải nhỏ hơn 255 kí tự'
            ]
        );
        if($validator->fails()){
            return response()->json([
                'err' => $validator->errors(),200
            ]);
        };
        $category->update(
            [
                'name'=>$request->name,
                'slug'=>utf8tourl($request->name),
            ]
        );
        return response()->json([
            'message'=>'Đã sửa thành công!!'
        ]);
    }
    public function deleteCate($id){
        $category = Categories::find($id);
        $category->delete();
        return response()->json([
            'mes'=>'Đã xóa thành công!!'
        ]);
    }
    public function updatepost(Request $request, $id)
    {
        $post = Posts::find($id);
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255',
                'idCategory' => 'required',
                'description' => 'required|min:2',
                'new_highlights' => 'required',
                'image' => 'required',
                'short_content' => 'required|min:2',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'min' => ':attribute phải lớn hơn 2 kí tự',
                'max' => ':attribute phải nhỏ hơn 255 kí tự',
            ],
            [
                'name' => 'Tên bài viết',
                'idCategory' => 'thể loại',
                'description' => 'mô tả',
                'new_highlights' => 'tin nổi bật',
                'image' => 'hình',
                'short_content' => 'mô tả ngắn',
            ]
        );
        if($validator->fails()){
            return redirect('admin/tintuc')->with('thongbao','vui lòng điền đầy đủ thông tin (hình ảnh, nội dung thanh nhé !!) !!');
        }

        if($request->image === $post->image){
            $post->update(
                [
                    //
                    'name' => $request->name,
                    'image' => $post->image,
                    'idCategory' => $request->idCategory,
                    'short_content' => $request->short_content,
                    'description' => $request->description,
                    'new_highlights' => $request->new_highlights,
                    'slug' => utf8tourl($request->name)
                ]
            );
            return response()->json([
                'message'=>'Đã sửa thành công!!'
            ]);
        }
        else {
        
            if($request->hasFile('image')){
                $file = $request->file('image');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png'){
                    return back()->with('loi','Bạn chỉ được chọn ảnh đuôi jpg hoặc png!!! ');
                }
                $name = $file->getClientOriginalName();
                $image = str_random(6)."_". $name;
                while(file_exists("img/".$image)){
                    $image = str_random(6)."_". $name;
                }
                $file->move("img",$image);
                //unlink("img/".$post->image);
            } 

            $post->update(
                [
                    'name' => $request->name,
                    'image' => $image,
                    'idCategory' => $request->idCategory,
                    'short_content' => $request->short_content,
                    'description' => $request->description,
                    'new_highlights' => $request->new_highlights,
                    'slug' => utf8tourl($request->name)
                ]
            );
            return redirect('admin/tintuc')->with('thongbao','sửa thành công !!');
        }
    }
    public function deletepost($id)
    {
        $post = Posts::find($id);
        if(File::exists('img/'.$post->image)){
            unlink('img/'.$post->image);
        }
        $post->delete();
        return response()->json([
            'mes'=>'Đã xóa thành công!!'
        ]);
    }
    public function updateslider(Request $request, $id)
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
    public function deleteslider($id)
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
    public function updateabout(Request $request, $id)
    {
        $about = Aboutscmc::find($id);

        $validator = Validator::make($request->all(),
            [
                'content' => 'required|min:2',
                'image' => 'required',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'min' => ':attribute phải lớn hơn 2 kí tự',
            ],
            [
                'content' => 'Tên bài viết',
                'image' => 'hình',
            ]
        );
        if($validator->fails()){
            return response()->json([
                'err' => $validator->errors(),200
            ]);
        }

        if($request->image === $about->image){
            $about->update(
                [
                    'content'=>$request->content,
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

            $about->update(
                [
                    'content'=>$request->content,
                    'image' => $fileName,
                ]
            );
            return response()->json([
                'message'=>'Đã sửa thành công!!'
            ]);
        }
    }
    public function updatestudy(Request $request, $id)
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
    public function deletestudy($id)
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
    public function updateteacher(Request $request, $id)
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
    public function deleteteacher($id)
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
    public function updatecustom(Request $request, $id)
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

            $exploded2 = explode(',',$request->imgcustom);

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

            $exploded2 = explode(',',$request->imgcustom);

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
    public function updatemyimage(Request $request, $id) {
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
    public function deletemyimage($id) {
        $data = myImages::find($id);
        if(File::exists('img/'.$data->image)){
            unlink('img/'.$data->image);
        }
        $data->delete();
        return response()->json([
            'mes'=>'Đã xóa thành công!!'
        ]);
    }
}
