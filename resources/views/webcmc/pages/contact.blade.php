@extends('webcmc.layouts.master')

@section('title')

    Mỹ thuật cmc || Liên hệ || Trung tâm dạy vẽ mỹ thuật, hội họa..

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

http://mythuatcmc.com/lien-he @endsection



@section('content')

    <div class="link-back-home">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <h4><a href="index.php">Home</a> Liên hệ</h4>

                </div>

            </div>

        </div>

    </div>



    <div class="contact-page">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <div class="maps">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.20892743561!2d106.7059353152605!3d10.795304261795778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b1724ff499%3A0xd0284d10ae6460aa!2zMTgsIDQ3IE5ndXnhu4VuIEPhu611IFbDom4sIHBoxrDhu51uZyAxNywgQsOsbmggVGjhuqFuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1573715840837!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

                    </div>

                </div>

            </div>

        </div>

        <div class="tuan-contac" id="app">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12">

                        <div class="title-about-page">

                            <h4>Địa chỉ liên hệ</h4>

                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="contact-address">

                            <i class="fa fa-map-marker"></i>

                            <p> 18/47/10 Nguyễn Cửu Vân, phường 17, quận Bình Thạnh</p>

                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="contact-address">

                            <i class="fa fa-phone"></i>

                            <p>0968314416</p>

                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="contact-address">

                            <i class="fa fa-envelope"></i>

                            <p>thanhvo.info96@gmail.com</p>

                        </div>

                    </div>

                    <div class="col-sm-6 col-sm-offset-3">

                        <form class="form-contact">

                            <div class="form-group">

                                <label for="">Họ tên:</label>

                                <input type="text" class="form-control" v-model="contact.name" placeholder="Nhập tên">

                            </div>

                            <div class="form-group">

                                <label for="">Email:</label>

                                <input type="text" class="form-control" v-model="contact.email" placeholder="Nhập email">

                            </div>

                            <div class="form-group">

                                <label for="">Số điện thoại:</label>

                                <input type="text" class="form-control" v-model="contact.phone" placeholder="Nhập số điện thoại">

                            </div>

                            <div class="form-group">

                                <label for="">Nội dung:</label>

                                <textarea class="form-control" v-model="contact.content" placeholder="Nội dung" cols="30" rows="10"></textarea>

                            </div>

                            <div class="text-center">

                                <button type="button" @click.stop.prevent="addNews()" class="btn btn-green btn-tuan">GỬI NGAY</button>

                            </div>

                        </form>

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

                contact:{},

            },

            methods:{

                addNews(){

                    var vm = this;

                    sen_data = {

                        name: vm.contact.name,

                        phone: vm.contact.phone,

                        content: vm.contact.content,

                        email: vm.contact.email,

                    }

                    axios.post('contact',sen_data)

                    .then(function (res) {

                        console.log(res.data.mes)

                        if(res.data.mes){

                            helper.showNotification('Vui lòng điền đúng thông tin',' :( ' , 'danger', 900);

                            return;

                        }

                        location.reload();

                        helper.showNotification(res.data.message ,':)' , 'success', 9000);

                    })

                    .catch(function (error) {

                        console.log(error);

                    })

                }

            },

            watch: {

                

            }

        })

    </script>

@endsection