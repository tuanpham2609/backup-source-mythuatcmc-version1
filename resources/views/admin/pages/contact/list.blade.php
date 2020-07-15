@extends('admin.layouts.master')
@section('title')
    Thể loại | Mỹ thuật cmc
@endsection
@section('content')
    <div class="tuanpd" id="app">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex pull-rigth">
                        <h6 class="m-0 font-weight-bold text-primary">Liên hệ</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Nội dung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in contact">
                                <td>@{{item.id}}</td>
                                <td>@{{item.name}}</td>
                                <td>@{{item.email}}</td>
                                <td>@{{item.phone}}</td>
                                <td>@{{item.content}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="paginate">
                    
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
                contact:[],
            },
            methods:{
                getListCate: function(pagi){
                    var vm = this;
                    axios.get('contact')
                    .then(function (res) {
                        vm.contact = res.data.data.data;
                    })
                    .catch(function (error) {
                        // handle error
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