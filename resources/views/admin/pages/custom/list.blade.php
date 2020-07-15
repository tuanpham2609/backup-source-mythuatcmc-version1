@extends('admin.layouts.master')
@section('title')
    Tin tuc | Mỹ thuật cmc
@endsection
@section('content')
    <div class="tuanpd" id="app">
        <div class="card shadow mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cấu hình trang chủ</h6>
                </div>
                <div class="row" style="margin: 5px">
                    <div class="col-lg-8 offset-lg-2">
                        <form role="form">
                            <fieldset class="form-group">
                                <p>Cấu hình ảnh logo:</p>
                                <div v-if="!custom.logo">
                                    <p>Nhập ảnh logo:</p>
                                    <input type="file" @change="onFileChange">
                                </div>
                                <div v-else>
                                    <img :src="'img/'+custom.logo" v-if="!isShow"
                                        class="img-fluid" />
                                    <img :src="custom.logo" v-else
                                        class="img-fluid" />
                                    <div class="col-12"><button class="btn btn-success" @click="removeImage">Remove image</button></div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Tiêu đề 1:</label>
                                <input type="text" class="form-control" v-model="custom.name1">
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Nội dung 1:</label>
                                <textarea v-model="custom.content1" class="form-control" rows="3"></textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Tiêu đề 2:</label>
                                <input type="text" class="form-control" v-model="custom.name2">
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Nội dung 2:</label>
                                <textarea class="form-control" rows="3" v-model="custom.content2"></textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Tiêu đề 3:</label>
                                <input type="text" class="form-control" v-model="custom.name3">
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Nội dung 3:</label>
                                <textarea v-model="custom.content3" class="form-control" rows="3"></textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Tiêu đề 4:</label>
                                <input type="text" class="form-control" v-model="custom.name4">
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Nội dung 4:</label>
                                <textarea v-model="custom.content4" class="form-control" rows="4"></textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <p>Cấu hình ảnh quảng cáo:</p>
                                <div v-if="!custom.imgPr">
                                    <p>Nhập ảnh quảng cáo:</p>
                                    <input type="file" @change="onFileChange1">
                                </div>
                                <div v-else>
                                    <img :src="'img/'+custom.imgPr" v-if="!isShow1"
                                        class="img-fluid" />
                                    <img :src="custom.imgPr" v-else
                                        class="img-fluid" />
                                   <div class="col-12"> <button class="btn btn-success" @click="removeImage1">Remove image</button></div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <p>Cấu hình banner giáo viên:</p>
                                <div v-if="!custom.imgcustom">
                                    <p>Nhập ảnh :</p>
                                    <input type="file" @change="onFileChange2">
                                </div>
                                <div v-else>
                                    <img :src="'img/'+custom.imgcustom" v-if="!isShow2"
                                        class="img-fluid" />
                                    <img :src="custom.imgcustom" v-else
                                        class="img-fluid" />
                                   <div class="col-12"> <button class="btn btn-success" @click="removeImage2">Remove image</button></div>
                                </div>
                            </fieldset>
                            <button type="button" class="btn btn-success" @click.stop.prevent="updatecustom()">Lưu lại</button>
                            <button type="reset" class="btn btn-primary">Reset Button</button>
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
                custom:{
                    logo:'',
                    imgPr:'',
                    imgcustom:'',
                    name1:'',
                    content1:'',
                    name2:'',
                    content2:'',
                    name3:'',
                    content3:'',
                    name4:'',
                    content4:'',
                },
                isShow: false,
                isShow1: false,
                isShow2: false,
            },
            methods:{
                onFileChange(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.createImage(files[0]);
                },
                createImage(file) {
                    var image = new Image();
                    var reader = new FileReader();
                    var vm = this;
                    vm.isShow = true;
                    reader.onload = (e) => {
                        vm.custom.logo = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },
                removeImage: function (e) {
                    this.custom.logo = '';
                },
                onFileChange1(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.createImage1(files[0]);
                },
                createImage1(file) {
                    var image = new Image();
                    var reader = new FileReader();
                    var vm = this;
                    vm.isShow1 = true;
                    reader.onload = (e) => {
                        vm.custom.imgPr = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },
                removeImage1: function (e) {
                    this.custom.imgPr = '';
                },
                onFileChange2(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.createImage2(files[0]);
                },
                createImage2(file) {
                    var image = new Image();
                    var reader = new FileReader();
                    var vm = this;
                    vm.isShow2 = true;
                    reader.onload = (e) => {
                        vm.custom.imgcustom = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },
                removeImage2: function (e) {
                    this.custom.imgcustom = '';
                },
                loadEditcustom(_id){
                    var vm = this;
                    axios.get('admin/custom/'+1+'/edit')
                    .then(function (res) {
                       vm.custom = res.data.data;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                },
                updatecustom(){
                    var vm = this;
                    var sen_data = {
                        name1: this.custom.name1,
                        name2: this.custom.name2,
                        name3: this.custom.name3,
                        name4: this.custom.name4,
                        content1: this.custom.content1,
                        content2: this.custom.content2,
                        content3: this.custom.content3,
                        content4: this.custom.content4,
                        logo: this.custom.logo,
                        imgcustom: this.custom.imgcustom,
                        imgPr: this.custom.imgPr,
                    }
                    axios.post('admin/customcmc/'+ vm.custom.id,sen_data)
                    .then(function (res) {
                        if(res.data.err){
                            helper.showNotification(res.data.err.image[0] ,':(' , 'danger', 900);
                            return;
                        }
                        location.reload();
                        helper.showNotification(res.data.message ,':)' , 'success', 9000);
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                },
            },
            created: function(){
                var vm = this;
                vm.loadEditcustom();
            },
            watch: {
                
            }
        })
    </script>
@endsection