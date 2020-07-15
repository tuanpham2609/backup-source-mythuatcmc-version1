@extends('admin.layouts.master')

@section('title')

    Thể loại | Mỹ thuật cmc

@endsection

@section('content')

    <div class="tuanpd" id="app">

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <div class="d-flex pull-rigth">

                        <h6 class="m-0 font-weight-bold text-primary">ảnh chung về Mỹ thuật CMC</h6>

                        <button class="btn btn-primary" data-toggle="modal" data-target="#create">Thêm mới </button>

                </div>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Name</th>

                                <th>Image</th>

                                <th>Chỉnh sửa</th>

                                <th>STT</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr v-for="(item, index) in my_images">

                                <td>@{{item.id}}</td>

                                <td>@{{item.name}}</td>

                                <td>

                                    <img :src="'img/'+item.image" width="20%" class="img-fluid">

                                </td>

                                <td>Hiển thị</td>

                                <td>

                                    <button class="btn btn-primary edit" data-toggle="modal" data-target="#edit" type="button" @click.stop.prevent="editCate(item.id)">

                                        <i class="fas fa-edit"></i>

                                    </button>

                                    <button class="btn btn-danger delete" type="button" @click.stop.prevent="removeCate(item.id)"> 

                                        <i class="fas fa-trash-alt"></i>

                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                    <div class="paginate">

                    

                    </div>

                </div>

            </div>

        </div>

        <!-- modal create -->

        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

            aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới banner</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="row" style="margin: 5px">

                            <div class="col-lg-12">

                                <form role="form">

                                    <fieldset class="form-group">

                                        <label>Tên banner:</label>

                                        <input class="form-control" placeholder="Nhập tên thể loại" v-model="my_image.name">

                                    </fieldset>

                                    <div v-if="!my_image.image">

                                        <p>Select an image</p>

                                        <input type="file" @change="onFileChange">

                                    </div>

                                    <div v-else>

                                        <img :src="my_image.image" class="img-fluid" />

                                        <button @click="removeImage">Remove image</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-success" @click.stop.prevent="addNew()">Save</button>

                        <button type="reset" class="btn btn-primary">Làm Lại</button>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    </div>

                </div>

            </div>

        </div>

        <!-- modal create -->

        <!-- modal edit -->

        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

            aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa: @{{my_image.name}}</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="row" style="margin: 5px">

                            <div class="col-lg-12">

                                <form role="form">

                                    <fieldset class="form-group">

                                        <label>Tên banner:</label>

                                        <input class="form-control" placeholder="Nhập tên thể loại" v-model="my_image.name">

                                    </fieldset>

                                    <div v-if="!my_image.image">

                                        <p>Select an image</p>

                                        <input type="file" @change="onFileChange">

                                    </div>

                                    <div v-else>

                                        <img :src="'img/'+my_image.image" v-if="!isShow"

                                            class="img-fluid" />

                                        <img :src="my_image.image" v-else

                                            class="img-fluid" />

                                        <button @click="removeImage">Remove image</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-success" @click.stop.prevent="updateCate()">Save</button>

                        <button type="reset" class="btn btn-primary">Làm Lại</button>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    </div>

                </div>

            </div>

        </div>

        <!-- modal edit -->

    </div>

@endsection

@section('script')

    <script>

        var app = new Vue({

            el:'#app',

            data:{

                my_images:[],

                my_image:{

                    name:'',

                    image:''

                },

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

                        vm.my_image.image = e.target.result;

                    };

                    reader.readAsDataURL(file);

                },

                removeImage: function (e) {

                    this.my_image.image = '';

                },

                getResults(page = 1) {

                    axios.get('admin/category?page=' + page)

                        .then(response => {

                            //this.categories = response.data;

                        });

                },

                getList: function(pagi){

                    var vm = this;

                    axios.get('admin/myimages')

                    .then(function (res) {

                        vm.my_images = res.data.data;

                    })

                    .catch(function (error) {

                        // handle error

                        console.log(error);

                    })

                },

                addNew: function(){

                    axios.post('admin/myimages',{name:this.my_image.name,image:this.my_image.image})

                    .then(function (res) {

                        if(res.data.err){

                            helper.showNotification(res.data.err.name[0] ,':(' , 'danger', 900);

                            helper.showNotification(res.data.err.image[0] ,':(' , 'danger', 900);

                            return;

                        }

                        $('#create').modal('hide');

                        location.reload();

                        helper.showNotification(res.data.message ,':)' , 'success', 9000);

                    })

                    .catch(function (error) {

                        console.log(error);

                    })

                },

                editCate: function(_id){

                    var vm = this;

                    axios.get('admin/myimages/'+_id+'/edit')

                    .then(function (res) {

                       $('#edit').modal('show');

                       vm.my_image = res.data.data;

                    })

                    .catch(function (error) {

                        // handle error

                        console.log(error);

                    })

                },

                updateCate(){

                    var vm = this;

                    var sen_data = {

                        name: vm.my_image.name,

                        image: vm.my_image.image,

                    }

                    axios.post('admin/myimagecmc/'+ vm.my_image.id,sen_data)

                    .then(function (res) {

                        if(res.data.err){

                            helper.showNotification(res.data.err.name[0] ,':(' , 'danger', 900);

                            helper.showNotification(res.data.err.image[0] ,':(' , 'danger', 900);

                            return;

                        }

                        $('#edit').modal('hide');

                        location.reload();

                        helper.showNotification(res.data.message ,':)' , 'success', 9000);

                    })

                    .catch(function (error) {

                        // handle error

                        console.log(error);

                    })

                },

                removeCate(_id){

                    var vm = this;

                    axios.post('admin/deletemyimage/'+ _id)

                    .then(function (res) {

                        helper.showNotification(res.data.mes ,':)' , 'success', 9000);

                        location.reload();

                    })

                    .catch(function (error) {

                        // handle error

                        console.log(error);

                    })

                }

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