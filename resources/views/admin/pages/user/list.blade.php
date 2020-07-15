@extends('admin.layouts.master')
@section('title')
    Thể loại | Mỹ thuật cmc
@endsection
@section('content')
    <div class="tuanpd" id="app">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex pull-rigth">
                        <h6 class="m-0 font-weight-bold text-primary">User</h6>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#create">Thêm mới</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in users">
                                <td>@{{item.id}}</td>
                                <td>@{{item.name}}</td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới thể loại</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin: 5px">
                            <div class="col-lg-12">
                                <form role="form">
                                    <fieldset class="form-group">
                                        <label>Tên người dùng:</label>
                                        <input class="form-control" placeholder="Nhập tên" v-model="user.email">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Mật khẩu:</label>
                                        <input class="form-control" placeholder="Nhập tên" v-model="user.password">
                                    </fieldset>
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
    </div>
@endsection
@section('script')
    <script>
        var app = new Vue({
            el:'#app',
            data:{
                users:[],
                user:{}
            },
            methods:{
                getListCate: function(pagi){
                    var vm = this;
                    axios.get('admin/users')
                    .then(function (res) {
                        vm.users = res.data.data.data;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                },
                addNew: function(){
                    axios.post('admin/users',{email:this.user.email,password:this.user.password})
                    .then(function (res) {
                        $('#create').modal('hide');
                        location.reload();
                        helper.showNotification(res.data.message ,':)' , 'success', 9000);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                },
            },
            created: function(){
                var vm = this;
                this.getListCate();
            },
            watch: {
                
            }
        })
    </script>
@endsection