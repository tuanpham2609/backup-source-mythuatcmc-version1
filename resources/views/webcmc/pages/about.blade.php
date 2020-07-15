@extends('webcmc.layouts.master')

@section('title') 

Mỹ thuật cmc || Về chúng tôi || Trung tâm dạy vẽ mỹ thuật, hội họa...

@endsection

@section('keyword')

Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tam day ve tại TP.Hồ Chí Minh, dạy học vẽ, day hoc ve, vẽ hội họa, ve hoi hoa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non, người đi làm @endsection

@section('description')

Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tam day ve tại TP.Hồ Chí Minh, dạy học vẽ, day hoc ve, vẽ hội họa, ve hoi hoa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non, người đi làm

Mỹ thuật cmc | cmc trung tâm dạy mỹ thuật hàng đầu tại thành phố hồ chí minh|| cmc @endsection

@section('img')

resources/images/tuanpd.jpg @endsection

@section('metacontent')

Mỹ thuật cmc | trung tâm dạy mỹ thuật vẽ tại Thành Phố Hồ Chí Minh | trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh @endsection

@section('metadescription')

Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tam day ve tại TP.Hồ Chí Minh, dạy học vẽ, day hoc ve, vẽ hội họa, ve hoi hoa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non, người đi làm @endsection

@section('metaurl')

http://mythuatcmc.com/gioi-thieu @endsection





@section('content')

    <div class="link-back-home">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <h4><a href="index.php">Home</a> Giới thiệu</h4>

                </div>

            </div>

        </div>

    </div>



    <div class="about-page" id="app">

        <div class="container">

            <div class="row" v-for="(item,index) in abouts">

                <div class="col-md-6">

                    <div class="about-page-left">

                        <p v-html="item.content"></p>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="about-page-right">

                        <img :src="'img/'+item.image" class="img-responsive">

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

                abouts:[],

            },

            methods:{

                getList: function(){

                    var vm = this;

                    axios.get('gioithieu-api')

                    .then(function (res) {

                        vm.abouts = res.data.data;

                        console.log(vm.abouts)

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

            watch: {

                

            }

        })

    </script>

@endsection