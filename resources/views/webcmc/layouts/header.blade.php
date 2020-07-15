<header class="header">

    <div class="header-top">

        <div class="container">

            <div class="row">

                <div class="col-sm-4 hidden-xs">

                   

                </div>

                <div class="col-sm-8">

                    

                </div>

            </div>

        </div>

    </div>



    <div class="header-mid">

        <div class="container">

            <div class="row ed-flex-321">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="tuan">

                    <div class="logo">

                        <a href="/">

                            @foreach($customs as $value)

                                <img class="img-responsive" src="img/{{$value->logo}}">

                            @endforeach

                        </a>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">

                    <button class="btn btn-default btn-tuan hidden-xs"> 

                        <i class="fa fa-phone"></i>

                        <span>0968314416</span>

                    </button>

                    <a href="lien-he" class="btn btn-default btn-tuan">Đăng ký</a>

                </div>

            </div>

        </div>

    </div>



    <div class="header-navbar">

        <nav class="navbar navbar-inverse" id="scroll" role="navigation">

            <div class="container">

                <div class="ed-toggle-mobile">

                    <ul class="">

                        <li><h4>Danh mục</h4></li>

                        <li>

                            <div class="navbar-header">

                                <button type="button" class="navbar-toggle" id="btn-toggle">

                                    <span class="sr-only">Toggle navigation</span>

                                    <span class="icon-bar top-bar"></span>

                                    <span class="icon-bar middle-bar"></span>

                                    <span class="icon-bar bottom-bar"></span>

                                </button>

                            </div>

                        </li>

                    </ul>

                </div>

                <div class="navbar-collapse1" id="menu">

                    

                    <ul class="nav navbar-nav ed-ul">

                        <li class="">

                            <a href="/">Trang chủ</a>

                        </li>

                        <li>

                            <a href="gioi-thieu">Giới thiệu</a>

                        </li>

                        <li class="has-submenu">

                            <a href="tin-tuc">Tin tức <i class="fa fa-angle-down icon-first-submenu"></i></a>

                            <ul class="submenu-1 ed-ul">

                                @foreach($cate as $value)

                                    <li><a href="the-loai/{{$value->id}}/{{$value->slug}}.html">{{$value->name}}</a></li>

                                @endforeach

                            </ul>

                        </li>
                        
                        <li>

                            <a href="hinh-ve-cmc">Abum ảnh</a>

                        </li>

                        <li>

                            <a href="lien-he">Liên hệ</a>

                        </li>

                    </ul>

                </div>

            </div>

        </nav>

    </div>

    <!-- Modal -->

</header>

