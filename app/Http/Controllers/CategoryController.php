<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\StoreCategoryRequest;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categories::paginate(10);
        return  response()->json([
            'data' => $category
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
        }
        $cate = Categories::create([
            'name' => $request->name,
            'slug' => utf8tourl($request->name)
        ]);
        return response()->json([
            'data' => $cate,
            'message' => 'Thêm thành công'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        return response()->json([
            'data' => $category 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return response()->json([
            'mes'=>'Đã xóa thành công!!'
        ]);
    }
}
