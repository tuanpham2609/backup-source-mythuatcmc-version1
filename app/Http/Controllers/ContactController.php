<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Models\Contacts;
use Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contacts::paginate(10);
        return response()->json([
            'data' => $contact
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
            'email' => 'required|email',
            'phone' => 'required',
            'content' => 'required',
            'name' => 'required',
        ],
        [
            'required' => ':attribute không được bỏ trống',
            'email' => ':attribute phải là email',
        ],
        [
            'email' => 'Email',
            'name' => 'Tên',
            'content' => 'Nội dung',
            'phone' => 'Số điện thoại',
        ]
        );
        if($validator->fails()){
            return response()->json([
                'mes' => true,
                'err' => $validator->errors(),200
            ]);
        }
        $contact = Contacts::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'content' => $request->content,
            'email' => $request->email,
            'title' => $request->name
        ]);
        return response()->json([
            'data' => $contact,
            'message' => 'Thêm thành công'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
