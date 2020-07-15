<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Models\Posts;
use Validator;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::paginate(10);
        return  response()->json([
            'data' => $post
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
        } 
        $post = Posts::create([
            'name' => $request->name,
            'image' => $image,
            'idCategory' => $request->idCategory,
            'short_content' => $request->short_content,
            'description' => $request->description,
            'new_highlights' => $request->new_highlights,
            'slug' => utf8tourl($request->name)
        ]);
        return redirect('admin/tintuc')->with('thongbao','Thêm mới thành công !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $post = Posts::find($id);
        return response()->json([
            'data'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Posts::find($id);
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255',
                'idCategory' => 'required',
                'description' => 'required|min:2|max:255',
                'new_highlights' => 'required',
                'image' => 'required',
                'short_content' => 'required|min:2|max:255',
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
            return response()->json([
                'err' => $validator->errors(),200
            ]);
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

            $post->update(
                [
                    'name' => $request->name,
                    'image' => $fileName,
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
}
