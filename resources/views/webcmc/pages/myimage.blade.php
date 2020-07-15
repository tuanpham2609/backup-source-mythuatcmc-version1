@extends('webcmc.layouts.master')

@section('title')

Mỹ thuật cmc || Về chúng tôi || Trung tâm dạy vẽ mỹ thuật, hội họa...

@endsection

@section('keyword')

Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tam day ve tại TP.Hồ Chí Minh, dạy học vẽ, day hoc ve,
vẽ hội họa, ve hoi hoa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non,
người đi làm @endsection

@section('description')

Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tam day ve tại TP.Hồ Chí Minh, dạy học vẽ, day hoc ve,
vẽ hội họa, ve hoi hoa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non,
người đi làm

Mỹ thuật cmc | cmc trung tâm dạy mỹ thuật hàng đầu tại thành phố hồ chí minh|| cmc @endsection

@section('img')

resources/images/tuanpd.jpg @endsection

@section('metacontent')

Mỹ thuật cmc | trung tâm dạy mỹ thuật vẽ tại Thành Phố Hồ Chí Minh | trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh
@endsection

@section('metadescription')

Mỹ thuật CMC, trung tâm dạy vẽ tại Thành Phố Hồ Chí Minh, trung tam day ve tại TP.Hồ Chí Minh, dạy học vẽ, day hoc ve,
vẽ hội họa, ve hoi hoa, vẽ manga, học vẽ luyện thi khối v, h, luyện thi kiến trúc, mỹ thuật, dạy vẽ thiếu nhi, mầm non,
người đi làm @endsection

@section('metaurl')

http://mythuatcmc.com/gioi-thieu @endsection





@section('content')

<div class="link-back-home">

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <h4><a href="index.php">Home</a> Hình ảnh về mỹ thuật CMC</h4>

            </div>

        </div>

    </div>

</div>

<div class="about-page" id="app">
    <div class="container">
        <div class="items-tuan">
            <div class="item-tuan text-center" v-for="(item,index) in abouts">
                <a :href="'img/'+item.image" data-fancybox="gallery">
                    <img :src="'img/'+item.image" :alt="item.name" :title="item.name" class="img-responsive">
                    <p>Tác giả: @{{item.name}}</p>
                </a>
            </div>
        </div>
    </div>
    <!-- <div class="container container-myiamge">
            <div class="mastory-block">
                <div class="mastory-item" v-for="(item,index) in abouts">
                    <img :src="'img/'+item.image" :alt="item.name" :title="item.name">
                </div>
            </div>
            <ul>
                <li class="item red" v-for="(item,index) in abouts">
                    <a href="https://www.behance.net/gallery/Oscar-Wilde/9330545">
                        <img :src="'img/'+item.image" :alt="item.name" :title="item.name">
                        <p>Dewald Venter</p>
                    </a>
                </li>
            </ul>
        </div> -->
</div>

@endsection

@section('script')

<script>

    var app = new Vue({

        el: '#app',

        data: {

            abouts: [],

        },

        methods: {

            getList: function () {

                var vm = this;

                axios.get('anhchung-api')

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

        created: function () {

            var vm = this;

            this.getList();

        },
        mounted() {
            $('.mastory-block').masonry({
                itemSelector: '.mastory-item',
                percentPosition: true
            });
        },

        watch: {



        }

    })

</script>

@endsection