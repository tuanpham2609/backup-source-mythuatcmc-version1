@extends('admin.layouts.master')
@section('title')
    Tin tuc | Mỹ thuật cmc
@endsection
@section('content')
    <div class="tuanpd" id="app">
        <div class="card shadow mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">About</h6>
                </div>
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <form role="form">
                            <fieldset class="form-group">
                                <label>Nội dung:</label>
                                <textarea v-model="about.content" class="form-control" rows="3"></textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <div v-if="!about.image">
                                    <p>Nhập ảnh:</p>
                                    <input type="file" @change="onFileChange">
                                </div>
                                <div v-else>
                                    <img :src="'img/'+about.image" v-if="!isShow"
                                        class="img-fluid" />
                                    <img :src="about.image" v-else
                                        class="img-fluid" />
                                    <button class="btn btn-success" @click="removeImage">Remove image</button>
                                </div>
                            </fieldset>
                            <button type="button" class="btn btn-success" @click.stop.prevent="updateAbout()">Lưu lại</button>
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
                abouts:[],
                about:{},
                isShow: false
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
                        vm.about.image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },
                removeImage: function (e) {
                    this.about.image = '';
                },
                loadEditabout(_id){
                    var vm = this;
                    axios.get('admin/about/'+1+'/edit')
                    .then(function (res) {
                       vm.about = res.data.data;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                },
                updateAbout(){
                    var vm = this;
                    var sen_data = {
                        content:this.about.content,
                        image:this.about.image,
                    }
                    axios.post('admin/aboutcmc/'+ vm.about.id,sen_data)
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
                vm.loadEditabout();
            },
            watch: {
                
            }
        })
    </script>
@endsection