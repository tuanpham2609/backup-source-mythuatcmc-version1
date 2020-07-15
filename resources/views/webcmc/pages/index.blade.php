@extends('webcmc.layouts.master')
@section('title')
Mỹ thuật cmc || Trung tâm dạy vẽ mỹ thuật tại Thành Phố Hồ Chí Minh || Trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh @endsection
@section('keyword')
Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, dạy học vẽ, vẽ hội họa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non, người đi làm @endsection
@section('description')
Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, dạy học vẽ, vẽ hội họa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non, người đi làm Mỹ thuật CMC || CMC trung tâm dạy mỹ thuật hàng đầu tại Thành Phố Hồ Chí Minh || CMC @endsection
@section('img')
http://mythuatcmc.com/resources/images/tuanpd.jpg @endsection
@section('metacontent')
Mỹ thuật CMC || trung tâm dạy mỹ thuật vẽ tại Thành Phố Hồ Chí Minh || trung tâm dạy vẽ tại tại Thành Phố Hồ Chí Minh @endsection
@section('metadescription')
Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, dạy học vẽ, vẽ hội họa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non, người đi làm @endsection
@section('metaurl')
http://mythuatcmc.com/@endsection

@section('content')
    <div id="app">
        <section class="banner-home">
            <div class="container-fuild" >
                <section class="regular1 slider" id="layerslider" v-if="slider">
                    <div class="items-1" v-for="(item,index) in slider" :key="index">
                        <a href="#">
                            <img class="img-responsive" :src="'img/'+item.image" :alt="item.slug" :item="item.slug">
                        </a>
                    </div>
                </section>
            </div>
        </section>        

        <section class="our-product tuan-50">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="title-page" v-for="(item,index) in customcmc">
                            <h3>@{{item.name1}}</h3>
                            <p>@{{item.content1}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <div class="row" style="display: flex; flex-wrap: wrap;">
                                    <div class="col-lg-3 col-md-4 col-sm-6" v-for="(item, index) in postLight">
                                        <div class="box-prod">
                                            <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'" class="pic-prd">
                                                <img :src="'img/'+ item.image" :alt="item.slug" :title="item.slug">
                                            </a>
                                            <div class="txt-prd">
                                                <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'"><h4>@{{item.name}}</h4></a>
                                                <p> @{{item.short_content}}
                                                </p>
                                                <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'" class="btn btn-default btn-tuan">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" v-for="(item,index) in customcmc">
                        <a href="#"><img :src="'img/'+item.imgPr" class="img-responsive" title="cmc-mythuat" alt="cmc-mythuat"></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="discount-home">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="title-page" v-for="(item,index) in customcmc">
                            <h3>@{{item.name2}}</h3>
                            <p>@{{item.content2}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="blog-partner" v-if="teacher.length > 0">
                            <div class="item" v-for="(item,index) in teacher" :key="index">
                                <div class="img-parner">
                                    <img :src="'img/'+item.image" :alt="item.name" :title="item.name">
                                </div>
                                <h4 class="uppercase m-t-20">@{{item.name}}</h4>
                                <p class="font-weight-bold text-center">
                                    @{{item.description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-left" v-for="(item,index) in customcmc">
                            <img :src="'img/'+item.imgcustom" class="img-responsive" title="cmc-mythuat" alt="cmc-mythuat">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="our-product tuan-50">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="title-page" v-for="(item,index) in customcmc">
                            <h3>@{{item.name3}}</h3>
                            <p>@{{item.content3}}</p>
                            <a href="gioi-thieu" class="btn btn-default btn-tuan">Xem thêm về chúng tôi</a href="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="new-books-home-t">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="title-page" v-for="(item,index) in customcmc">
                            <h3>@{{item.name4}}</h4>
                            <p>@{{item.content4}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6" v-for="(item,index) in study">
                        <div class="box-prod-t">
                            <a href="#" class="pic-prd">
                                <img :src="'img/'+item.image" :alt="item.name">
                            </a>
                            <div class="txt-prd-t">
                                <a href="#"><h4>@{{item.name}}</h4></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="book-top news-home">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-6">
                        <div class="row">
                            <div class="col-sm-6" v-for="(item,index) in postcmc1">
                                <div class="news-box-home">
                                    <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'" class="pic-news-home">
                                        <img :src="'img/'+item.image" class="img-responsive" :alt="item.name">
                                    </a>
                                    <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'">
                                        <h4>@{{item.name}}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="socical-tuan">
                            <div class="item">
                                <img src="resources/images/news/logo2.png" alt="">
                            </div>
                            <div class="item">
                                <img src="resources/images/news/logo3.png" alt="">
                            </div>
                            <div class="item">
                                <img src="resources/images/news/logo4.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="resources/images/news/logo5.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="resources/images/news/logo6.png" alt="">
                            </div>
                            <div class="item">
                                <img src="resources/images/news/tdt.png" alt="">
                            </div>
                            <div class="item">
                                <img src="resources/images/news/logo2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="ed-shape">
                            <div class="triangle-shape">
                                <!-- <div id="triangle-up"></div> -->
                            </div>
                            <h3>Đăng ký nhận thông báo mới nhất</h3>
                            <p>Bạn có thể luôn được cập nhật với của hàng của chúng tôi!</p>
                            <form>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Nhập email của bạn..." id="email">
                                </div>
                                <button type="button">Gửi ngay</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="news-home">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 text-center">
                        <div class="title-page">
                            <h3>Tin tức về Mỹ thuật cmc</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4" v-for="(item,index) in postcmc">
                        <div class="news-box-home">
                            <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'" class="pic-news-home">
                                <img :src="'img/'+item.image" class="img-responsive" :title="item.slug" :alt="item.slug">
                                <!-- <ul>
                                    <li>19</li>
                                    <li>T.7</li>
                                </ul> -->
                            </a>
                            <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'">
                                <h4>@{{item.name}}</h4>
                            </a>
                            <p>@{{item.short_content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var app = new Vue({
            el:'#app',
            data:{
                slider:[],
                study:[],
                teacher:[],
                postLight:[],
                postcmc:[],
                postcmc1:[],
                customcmc:[]
            },
            methods:{
                getList: function(pagi){
                    var vm = this;
                    axios.get('trangchu-api')
                    .then(function (res) {
                        vm.slider = res.data.slider;
                        vm.teacher = res.data.teacher;
                        vm.study = res.data.study;
                        vm.postLight = res.data.postLight;
                        vm.postcmc = res.data.postcmc;
                        vm.postcmc1 = res.data.postcmc1;
                        vm.customcmc = res.data.customCmc;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                },
            },
            created: function(){
                var vm = this;
                this.getList();
            },
            updated(){
                $("#layerslider").slick({
                    dots: true,
                    infinite: true,
                    speed: 900,
                    prevArrow: false,
                    nextArrow: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    responsive: [
                        {
                            breakpoint: 1199,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });
                $('.blog-partner').slick({
                    infinite: true,
                    speed: 600,
                    autoplaySpeed: 3000,
                    autoplay: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    margin: 20,
                    dots: false,
                });
            },
            watch: {
                
            }
        })
    </script>
@endsection