@extends('admin.layouts.master')

@section('title')

    Tin tuc | Mỹ thuật cmc

@endsection

@section('content')

    <div class="tuanpd" id="app">

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <div class="d-flex pull-rigth">

                    <h6 class="m-0 font-weight-bold text-primary">Tin tức</h6>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#create" @click.stop.prevent="loadCate()">Thêm mới tin</button>

                </div>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    @if(session('thongbao'))

                        <div class="alert alert-danger">

                            {{session('thongbao')}}

                        </div>

                    @endif

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Name</th>

                                <th>Mô tả ngắn</th>

                                <!-- <th>Nội dung</th> -->

                                <th>Hình</th>

                                <th>Tin nổi bật</th>

                                <th></th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr v-for="(item, index) in posts">

                                <td>@{{item.id}}</td>

                                <td>@{{item.name}}</td>

                                <td>@{{item.short_content}}</td>

                                <!-- <td v-html="item.description"></td> -->

                                <td> <img :src="'img/'+item.image" alt="" class="img-fluid" width="30%">

                                </td>

                                <td>@{{(item.new_highlights == 1)?'có':'không'}}</td>

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

                        <ul class="pagination">

                            <li v-if="pagination.current_page != 1" class="page-item"><a class="page-link" @click="getResults(pagination.fist_link)">Previous</a></li>

                            <li :class="(pagination.current_page == n)?'active':''"

                                    v-for="n in pagination.last_page" :key="n" class="page-item"><a class="page-link" @click="getResults(pagination.path_page + n)">@{{n}}</a></li>

                            <li v-if="pagination.current_page != pagination.last_page" class="page-item"><a class="page-link" @click="getResults(pagination.last_link)">Next</a></li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>
        <!-- modal create -->

        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

            aria-hidden="true">

            <div class="modal-dialog modal-full-tuan" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới tin tức</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="row" style="margin: 5px">

                            <div class="col-lg-12">

                                <form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <fieldset class="form-group">

                                        <label>Tên thể loại:</label>

                                        <select class="form-control" name="idCategory">

                                            <option >--Chọn tên thể loại--</option>

                                            <option v-for="(item) in category" :value="item.id">@{{item.name}}</option>

                                        </select>

                                    </fieldset>

                                    <fieldset class="form-group">

                                        <label>Tên:</label>

                                        <input class="form-control" placeholder="Nhập tên tin" name="name">

                                    </fieldset>

                                    <fieldset class="form-group">

                                        <label>Nội dung ngắn:</label>

                                        <input class="form-control" placeholder="Nhập tên noi dung" name="short_content">

                                    </fieldset>

                                    <fieldset class="form-group">

                                        <label for="">Tin nổi bật</label>

                                        <select class="form-control" name="new_highlights">

                                            <option >--vui Lòng chọn--</option>

                                            <option value="1">Có</option>

                                            <option value="0">Không</option>

                                        </select>

                                    </fieldset>

                                    <fieldset class="form-group">

                                        <div class="form-group">

                                            <label for="exampleFormControlTextarea1">Nội dung</label>

                                            <textarea name="description" class="form-control rounded-0" id="editor1" ></textarea>

                                        </div>

                                    </fieldset>

                                    <div>

                                        <p>chọn ảnh:</p>

                                        <input type="file" class="form-control" name="image">

                                    </div>

                                    <!-- <div v-else>

                                        <img :src="post.image" class="img-fluid" />

                                        <button @click="removeImage">Remove image</button>

                                    </div> -->

                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-success">Save</button>

                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- modal create -->

        <!-- modal edit -->

        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

            aria-hidden="true">

            <div class="modal-dialog modal-full-tuan" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="row" style="margin: 5px">

                            <div class="col-lg-12">

                                <form role="form" :action="'admin/postcmc/'+ post.id" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <fieldset class="form-group">

                                        <label>Tên thể loại:</label>

                                        <select class="form-control" name="idCategory" v-model="post.idCategory">

                                            <option >--Chọn tên thể loại--</option>

                                            <option v-for="(item) in category" :value="item.id">@{{item.name}}</option>

                                        </select>

                                    </fieldset>

                                    <fieldset class="form-group">

                                        <label>Tên:</label>

                                        <input class="form-control" placeholder="Nhập tên tin" name="name" v-model="post.name">

                                    </fieldset>

                                    <fieldset class="form-group">

                                        <label>Nội dung ngắn:</label>

                                        <input class="form-control" placeholder="Nhập tên noi dung" name="short_content" v-model="post.short_content">

                                    </fieldset>

                                    <fieldset class="form-group">

                                        <label for="">Tin nổi bật</label>

                                        <select class="form-control" name="new_highlights" v-model="post.new_highlights">

                                            <option >--vui Lòng chọn--</option>

                                            <option value="1">Có</option>

                                            <option value="0">Không</option>

                                        </select>

                                    </fieldset>

                                    <fieldset class="form-group">

                                        <div class="form-group">

                                            <label for="exampleFormControlTextarea1">Nội dung</label>

                                            <textarea name="description" class="form-control" id="editor2"></textarea>

                                        </div>

                                    </fieldset>

                                    <div v-if="post.image">

                                        <p>Select an image</p>

                                        <img :src="'img/'+post.image" alt="" class="img-fluid" width="40%">

                                        <input type="file" class="form-control" name="image" :class="post.image">

                                    </div>

                                    <!-- <div v-else>

                                        <img :src="'img/'+post.image" v-if="!isShow"

                                            class="img-fluid" />

                                        <img :src="post.image" v-else

                                            class="img-fluid" />

                                        <button @click="removeImage">Remove image</button>

                                    </div> -->

                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-success">Save</button>

                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- modal edit -->

    </div>

@endsection

@section('script')

    <script>

        // Vue.use( CKEditor );

        var app = new Vue({

            el:'#app',

            data:{

                posts:[],

                category:[],

                post:{

                    new_highlights: 0,

                    image:'',

                    name:'',

                    description:'',

                    idCategory:'',

                    short_content:''

                },

                isShow: false,

                pagination:{}

                // editor: ClassicEditor,

                // uploadUrl: 'http://localhost/mythuatcmc/public/img',

                // editorData: '<p>Content of the editor.</p>',

                // editorConfig: {

                //     // The configuration of the editor.

                // }

            },

            methods:{

                onFileChange(e) {

                    var files = e.target.files || e.dataTransfer.files;

                    if (!files.length)

                        return;

                    this.createImage(files[0]);

                },

                getResults(page) {

                    var vm = this;

                    axios.get(page)

                        .then(res=> {

                            vm.posts = res.data.data.data;

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

                createImage(file) {

                    var image = new Image();

                    var reader = new FileReader();

                    var vm = this;

                    vm.isShow = true;

                    reader.onload = (e) => {

                        vm.post.image = e.target.result;

                    };

                    reader.readAsDataURL(file);

                },

                removeImage: function (e) {

                    this.post.image = '';

                },

                loadCate(){

                    $('#create').modal('show');

                    var vm = this;

                    axios.get('admin/category')

                    .then(function (res) {

                        vm.category = res.data.data.data;

                    })

                    .catch(function (error) {

                        // handle error

                        console.log(error);

                    })

                },

                getList: function(pagi){

                    var vm = this;

                    axios.get('admin/post')

                    .then(function (res) {

                        vm.posts = res.data.data.data;

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

                addNew: function(){

                    var sen_data = {

                        name:this.post.name,

                        idCategory:this.post.idCategory,

                        short_content:this.post.short_content,

                        description:this.post.description,

                        image:this.post.image,

                        new_highlights:this.post.new_highlights,

                    }

                    axios.post('admin/post',sen_data)

                    .then(function (res) {

                        if(res.data.err){

                            helper.showNotification('Vui lòng điền đủ thông tin' ,':(' , 'danger', 900);

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

                loadEditPost(_id){

                    var vm = this;

                    axios.get('admin/post/'+_id+'/edit')

                    .then(function (res) {

                       vm.post = res.data.data;

                       CKEDITOR.instances['editor2'].setData(vm.post.description);

                    })

                    .catch(function (error) {

                        // handle error

                        console.log(error);

                    })

                },

                editCate: function(_id){

                    var vm = this;

                    axios.get('admin/category')

                    .then(function (res) {

                        vm.category = res.data.data.data;

                    })

                    .catch(function (error) {

                        // handle error

                        console.log(error);

                    })

                    $('#edit').modal('show');

                    vm.loadEditPost(_id);

                },

                updateCate(){

                    var vm = this;

                    var sen_data = {

                        name:this.post.name,

                        idCategory:this.post.idCategory,

                        short_content:this.post.short_content,

                        description:this.post.description,

                        image:this.post.image,

                        new_highlights:this.post.new_highlights,

                    }

                    axios.post('admin/postcmc/'+ vm.post.id,sen_data)

                    .then(function (res) {

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

                    axios.post('admin/deletepost/'+ _id)

                    .then(function (res) {

                        helper.showNotification(res.data.mes ,':)' , 'success', 9000);

                        location.reload();

                    })

                    .catch(function (error) {

                        // handle error

                        console.log(error);

                    })

                },

                getckedit(){

                    CKEDITOR.replace('editor1',

                        {

                            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',

                            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',

                            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',

                            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',

                            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',

                            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
                            toolbar : [
                                { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'Preview', 'Print', '-', 'Templates' ] },
                                { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },                            
                                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                                { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
                                '/',
                                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
                                { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                                { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
                                '/',
                                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                                { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }
                            ]
                        } 

                    ); 

                },

                getckedit1(){

                    CKEDITOR.replace('editor2',

                        {

                            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',

                            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',

                            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',

                            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',

                            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',

                            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'

                        } 

                    ); 

                }

            },

            mounted() {

                this.getckedit();

                this.getckedit1();
                $(document).on({'show.bs.modal': function () {
                    $(this).removeAttr('tabindex');
                } }, '.modal');

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