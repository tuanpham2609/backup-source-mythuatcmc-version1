@extends('webcmc.layouts.master')

@section('title')

    Mỹ thuật cmc | Tin tức || Trung tâm dạy vẽ mỹ thuật, hội họa..

@endsection

@section('keyword')

Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tam day ve tại Thành Phố Hồ Chí Minh, dạy học vẽ, day hoc ve, vẽ hội họa, ve hoi hoa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non, người đi làm @endsection

@section('description')

Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tam day ve tại Thành Phố Hồ Chí Minh, dạy học vẽ, day hoc ve, vẽ hội họa, ve hoi hoa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non, người đi làm

Mỹ thuật cmc | cmc trung tâm dạy mỹ thuật hàng đầu tại Thành Phố Hồ Chí Minh|| cmc @endsection

@section('img')

resources/images/tuanpd.jpg @endsection

@section('metacontent')

Mỹ thuật cmc | trung tâm dạy mỹ thuật vẽ tại Thành Phố Hồ Chí Minh | trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh @endsection

@section('metadescription')

Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tam day ve tại Thành Phố Hồ Chí Minh, dạy học vẽ, day hoc ve, vẽ hội họa, ve hoi hoa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non, người đi làm @endsection

@section('metaurl')

http://mythuatcmc.com/tin-tuc @endsection





@section('content')

    <div class="link-back-home">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <h4><a href="index.php">Home</a> Tin tức</h4>

                </div>

            </div>

        </div>

    </div>



    <div class="news-page" id="app">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-4">

                    <div class="left-news">

                        <!-- <ul class="category-news">

                            <h4>Danh mục tin tức</h4>

                            <li class="has-submenu">

                                <a href="product.html">Tin tức mới nhất <i class="fa fa-angle-down icon-first-submenu"></i></a>

                                <ul class="submenu-1 ed-ul">

                                    <li class="has-second-submenu"><a href="product.php">Tin tức mới nhất <i class="fa fa-angle-down icon-second-submenu"></i></a>

                                        <ul class="submenu-2 ed-ul">

                                            <li><a href="product.php"> Tin tức mới nhất 1</a></li>

                                        </ul>

                                    </li>

                                    <li class="has-second-submenu"><a href="product.php">Tin tức gần đây <i class="fa fa-angle-down icon-second-submenu"></i></a>

                                        <ul class="submenu-2 ed-ul">

                                            <li><a href="product.php"> Tin tức gần đây 1</a></li>

                                            <li><a href="product.php"> Tin tức gần đây 2</a></li>

                                        </ul>

                                    </li>

                                    <li><a href="product.php">Tin tức khác </a></li>

                                </ul>

                            </li>

                            <li class="has-submenu">

                                <a href="product.html">Tin tức đọc nhiều nhất <i class="fa fa-angle-down icon-first-submenu"></i></a>

                                <ul class="submenu-1 ed-ul">

                                    <li class="has-second-submenu"><a href="product.php">Tin tức mới nhất <i class="fa fa-angle-down icon-second-submenu"></i></a>

                                        <ul class="submenu-2 ed-ul">

                                            <li><a href="product.php"> Tin tức mới nhất 1</a></li>

                                        </ul>

                                    </li>

                                    <li class="has-second-submenu"><a href="product.php">Tin tức gần đây <i class="fa fa-angle-down icon-second-submenu"></i></a>

                                        <ul class="submenu-2 ed-ul">

                                            <li><a href="product.php"> Tin tức gần đây 1</a></li>

                                            <li><a href="product.php"> Tin tức gần đây 2</a></li>

                                        </ul>

                                    </li>

                                    <li><a href="product.php">Tin tức khác </a></li>

                                </ul>

                            </li>

                            <li class="has-submenu">

                                <a href="product.html">Tin tức xem nhiều</a>

                            </li>

                            <li class="has-submenu">

                                <a href="product.html">Tin tức đọc nhiều</a>

                            </li>

                        </ul> -->



                        <div class="pic-advertise-news">

                            <a href="#"><img src="resources/images/quangcao/qc-1.jpg" class="img-responsive"></a>

                        </div>

                    </div>

                </div>

                <div class="col-md-9 col-sm-8">

                    <div class="right-news">

                        @foreach($postNew as $tinnoibat)

                            <div class="box-news-page">

                                <a href="tin-tuc/{{$tinnoibat->id}}/{{$tinnoibat->slug}}.html" class="pic-news-page">

                                    <img src="img/{{$tinnoibat->image}}" class="img-responsive">

                                </a>

                                <ul class="date-box-news-page">

                                    <li>{{$tinnoibat->created_at->format('d')}}</li>

                                    <li>{{$tinnoibat->created_at->format('d/m/Y')}}</li>

                                </ul>

                                <div class="txt-box-news-page">

                                    <a href="tin-tuc/{{$tinnoibat->id}}/{{$tinnoibat->slug}}.html">

                                        <h4>{{$tinnoibat->name}}</h4>

                                    </a>

                                    <ul>

                                        <li>Đăng bởi: Tấn Thanh</li>

                                        <li>Ngày đăng: {{$tinnoibat->created_at->format('d/m/Y')}}</li>

                                    </ul>

                                    <p>{{$tinnoibat->short_content}}</p>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection