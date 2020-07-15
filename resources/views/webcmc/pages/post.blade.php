@extends('webcmc.layouts.master')

@section('title')

    Mỹ thuật cmc | Tin tức | Trung tâm dạy vẽ mỹ thuật, hội họa..

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

                        <div class="news-highlights">

                            <h4>Tin tức nổi bật</h4>

                            <div class="box-news-hl-full" v-if="newPost.length > 0">

                                <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'" class="box-news-hl" v-for="(item,index) in newPost">

                                    <div class="ed-img-news-hl">

                                        <img :src="'img/'+item.image" :alt="item.slug" :title="item.slug">

                                    </div>

                                    <p>@{{item.short_content}}</p>

                                </a>

                            </div>

                        </div>



                        <div class="pic-advertise-news">

                            <a href="#"><img src="resources/images/quangcao/qc-1.jpg" class="img-responsive"></a>

                        </div>

                    </div>

                </div>

                <div class="col-md-9 col-sm-8">

                    <div class="right-news">

                        <div class="box-news-page" v-for="(item, index) in posts">

                            <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'" class="pic-news-page">

                                <img :title="item.slug" :alt="item.slug" :src="'img/'+item.image" class="img-responsive">

                            </a>

                            <ul class="date-box-news-page">

                                <li>#@{{index+1}}</li>

                                <li>cmc mythuat</li>

                            </ul>

                            <div class="txt-box-news-page">

                                <a :href="'tin-tuc/'+item.id+'/'+item.slug+'.html'">

                                    <h4>@{{item.name}}</h4>

                                </a>

                                <ul>

                                    <li>Đăng bởi: Tấn Thanh</li>

                                    <!-- <li>Ngày đăng: @{{item.created_at}}</li> -->

                                </ul>

                                <p>@{{item.short_content}}</p>

                            </div>

                        </div>

                    </div>



                    <div class="ed-pagination">

                        <!-- <ul class="pagination setting-ul">

                            <li class="disabled"><span><i class="fa fa-angle-left"></i></span></li>

                            <li class="active"><span>1</span></li>

                            <li><a href="#">2</a></li>

                            <li><a href="#">3</a></li>

                            <li><a href="#" rel="next"><i class="fa fa-angle-right"></i></a></li>

                        </ul> -->

                        <ul class="pagination" v-if="pagination.last_page > 1">

                            <li v-if="pagination.current_page != 1" class="page-item"><a class="page-link" @click="getResults(pagination.fist_link)">Previous</a></li>

                            <li :class="(pagination.current_page == n)?'active':''"

                                    v-for="n in pagination.last_page" :key="n" class="page-item"><a class="page-link" @click="getResults(pagination.path_page + n)">@{{n}}</a></li>

                            <li v-if="pagination.current_page != pagination.last_page" class="page-item"><a class="page-link" @click="getResults(pagination.last_link)">Next</a></li>

                        </ul>

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

                posts:[],

                newPost:[],

                pagination:{}

            },

            methods:{

                getList: function(pagi){

                    var vm = this;

                    axios.get('tintuc-api')

                    .then(function (res) {

                        vm.posts = res.data.data.data;

                        vm.newPost = res.data.newPost;

                        vm.pagination = {

                            current_page: res.data.data.current_page,

                            last_page: res.data.data.last_page,

                            from_page: res.data.data.from,

                            to_page: res.data.data.to,

                            total_page: res.data.data.total,

                            path_page: res.data.data.path+"?page=",

                            fist_link: res.data.data.first_page_url,

                            last_link: res.data.data.last_page_url,

                        }

                    })

                    .catch(function (error) {

                        // handle error

                        console.log(error);

                    })

                },

                getResults(page) {

                    var vm = this;

                    axios.get(page)

                        .then(res=> {

                            vm.posts = res.data.data.data;

                            console.log(vm.posts)

                            vm.pagination = {

                                current_page: res.data.data.current_page,

                                last_page: res.data.data.last_page,

                                from_page: res.data.data.from,

                                to_page: res.data.data.to,

                                total_page: res.data.data.total,

                                path_page: res.data.data.path+"?page=",

                                fist_link: res.data.data.first_page_url,

                                last_link: res.data.data.last_page_url,

                            }

                        });

                },

            },

            created: function(){

                var vm = this;

                this.getList();

            },

            watch: {

                

            }

        })

    </script>

@endsection