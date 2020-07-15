<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//web cmc pdt
Route::get('/', 'cmcapi@indexcmc');
Route::get('gioi-thieu', 'cmcapi@gioithieucmc');
Route::get('tin-tuc', 'cmcapi@tintuccmc');
Route::get('lien-he', 'cmcapi@lienhecmc');
Route::get('hinh-ve-cmc', 'cmcapi@hinhchungcmc');

Route::get('tin-tuc/{id}/{TenKhongDau}.html','cmcapi@getPostDetail');
Route::get('the-loai/{id}/{TenKhongDau}.html','cmcapi@getPost');
//web cmc pdt
//api web
Route::get('trangchu-api','cmcapi@getApiCmc');
Route::get('tintuc-api','cmcapi@getApiNew');
Route::get('gioithieu-api','cmcapi@getaboutapi');
Route::get('anhchung-api','cmcapi@getmyimageapi');
Route::get('theloai-api','cmcapi@getcateapi');
//contac
Route::resource('contact','ContactController');
//api web
//login
Route::get('admin/login','cmcapi@login');
Route::post('admin/loginPost','cmcapi@postLogin');
Route::get('admin/logout','cmcapi@logoutCmc');
//login
Route::group(['prefix' => 'admin','middleware'=>'loginCmc'],function(){
    //category
    Route::resource('category','CategoryController');
    Route::get('theloai',function(){
        return view('admin.pages.category.list');
    });
    //slider
    Route::resource('slider','SliderController');
    Route::get('banner',function(){
        return view('admin.pages.slider.list');
    });
    //post
    Route::resource('post','PostController');
    Route::get('tintuc',function(){
        return view('admin.pages.post.list');
    });
    // about
    Route::resource('about','AboutController');
    Route::get('vechungtoi',function(){
        return view('admin.pages.about.list');
    });
    //study
    Route::resource('studycmc','StudyCmcController');
    Route::get('cauhinhhocsinh',function(){
        return view('admin.pages.study.list');
    });
    //teacher
    //study
    Route::resource('teachercmc','TeacherCmcController');
    Route::get('cauhinhgiaovien',function(){
        return view('admin.pages.teacher.list');
    });
    //study
    Route::resource('myimages','MyImageController');
    Route::get('hinhanhchung',function(){
        return view('admin.pages.myimage.list');
    });
    //
    Route::get('lienhe',function(){
        return view('admin.pages.contact.list');
    });
    ///
    Route::resource('users','UserController');
    Route::get('user-admin',function(){
        return view('admin.pages.user.list');
    });
    ///custom
    Route::resource('custom','CustomController');
    Route::get('cauhinhtrangchu',function(){
        return view('admin.pages.custom.list');
    });
    //api custom edit delete
    Route::post('cate/{id}','mtCmcController@updateCate');
    Route::post('deletecate/{id}','mtCmcController@deleteCate');
    //post
    Route::post('postcmc/{id}','mtCmcController@updatepost');
    Route::post('deletepost/{id}','mtCmcController@deletepost');
    //slider
    Route::post('slidercmc/{id}','mtCmcController@updateslider');
    Route::post('deleteslider/{id}','mtCmcController@deleteslider');
    //about
    Route::post('aboutcmc/{id}','mtCmcController@updateabout');
    //study
    Route::post('studycmc/{id}','mtCmcController@updatestudy');
    Route::post('deletestudy/{id}','mtCmcController@deletestudy');
    //teacher
    Route::post('teachercmc/{id}','mtCmcController@updateteacher');
    Route::post('deleteteacher/{id}','mtCmcController@deleteteacher');
    //myimage
    Route::post('myimagecmc/{id}','mtCmcController@updatemyimage');
    Route::post('deletemyimage/{id}','mtCmcController@deletemyimage');
    //custom
    Route::post('customcmc/{id}','mtCmcController@updatecustom');
});
//web cmc
