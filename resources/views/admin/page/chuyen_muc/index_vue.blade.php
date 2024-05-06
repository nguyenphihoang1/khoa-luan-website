@extends('admin.share.master_page')
@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Thêm Mới Chuyên Mục
            </div>
            <form id="formdata" v-on:submit.prevent="add()">
                <div class="card-body">
                    <label>Tên Chuyên Mục</label>
                    <input class="form-control mt-1" type="text" name="ten_chuyen_muc">
                    <label class="mt-3">Slug Chuyên Mục</label>
                    <input class="form-control mt-1" v-model="slug" type="text" name="slug_chuyen_muc">
                    <label class="mt-3">Tình Trạng</label>
                    <select class="form-control mt-1" name="tinh_trang">
                        <option value="1">Hiển Thị</option>
                        <option value="0">Tạm Tắt</option>
                    </select>
                    <label class="mt-3">Chuyên Mục Cha</label>
                    <select class="selectt form-control mt-1" name="id_chuyen_muc_cha">
                        <option value="0">Root</option>
                        <template v-for="(value, key) in listChuyenMuc">
                            <option v-bind:value="value.id" v-if="value.id_chuyen_muc_cha == 0">@{{ value.ten_chuyen_muc }}</option>
                        </template>
                    </select>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Danh Sách Chuyên Mục
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table_chuyen_muc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Chuyên Mục</th>
                            <th class="text-center">Tình Trạng</th>
                            <th class="text-center">Chuyên Mục Cha</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(value, key) in listChuyenMuc">
                            <th class="text-center align-middle">@{{ key + 1 }}</th>
                            <td class="align-middle">@{{ value.ten_chuyen_muc }}</td>
                            <td class="text-center">
                                <button class="btn btn-success" v-on:click="changeStatus(value.id)" v-if="value.tinh_trang == 1">Hiển Thị</button>
                                <button class="btn btn-danger" v-on:click="changeStatus(value.id)" v-else>Tạm tắt</button>
                            </td>
                            <td class="align-middle">@{{ value.ten_chuyen_muc_cha == null ? 'Root' : value.ten_chuyen_muc_cha }}</td>
                            <td class="text-center">
                                <button class="btn btn-primary" v-on:click="edit = value" data-bs-toggle="modal" data-bs-target="#editModal">Cập nhật</button>
                                <button class="btn btn-danger" v-on:click="edit = value" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                            </td>
                        </tr>

                    </tbody>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Delete Chuyên Mục</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <input class="form-control" type="hidden" id="delete_id" placeholder="Nhập vào id cần xóa">
                            <p>Bạn hãy chắc chắn là sẽ xóa Chuyên Mục này. Việc này không thể hoàn tác!</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button v-on:click="deleteChuyenMuc()" type="button" class="btn btn-danger">Đồng Ý Xóa</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Cập Nhật Chuyên Mục</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label>Tên Chuyên Mục</label>
                                <input class="form-control mt-1" v-on:keyup="chuyenThanhSlugEdit()" v-model="edit.ten_chuyen_muc" type="text">
                                <label class="mt-3">Slug Chuyên Mục</label>
                                <input class="form-control mt-1" v-model="edit.slug_chuyen_muc" type="text">
                                <label class="mt-3">Tình Trạng</label>
                                <select class="form-control mt-1" v-model="edit.tinh_trang">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Tạm Tắt</option>
                                </select>
                                <label class="mt-3">Chuyên Mục Cha</label>
                                <select v-model="edit.id_chuyen_muc_cha" class="form-control mt-1">
                                    <option value="0">Root</option>
                                    <template v-for="(value, key) in listChuyenMuc">
                                        <option v-bind:value="value.id" v-if="value.id_chuyen_muc_cha == 0">@{{ value.ten_chuyen_muc }}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" v-on:click="updateChuyenMuc()" class="btn btn-primary">Cập Nhật</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    new Vue({
    el      :   '#app',
    data    :   {
        listChuyenMuc       : [],
        edit                : {},
        slug                : '',
        ten_chuyen_muc      : '',
    },
    created()   {
        this.loadData();
        this.loadChuyenMucCha();
    },
    methods :   {

        add() {
            var paramObj = {};
            $.each($('#formdata').serializeArray(), function(_, kv) {
                if (paramObj.hasOwnProperty(kv.name)) {
                    paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                    paramObj[kv.name].push(kv.value);
                } else {
                    paramObj[kv.name] = kv.value;
                }
            });

            axios
                .post('/admin/chuyen-muc/create', paramObj)
                .then((res) => {
                    if(res.data.xxx) {
                        toastr.success(res.data.message);
                        this.loadData();
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },

        updateChuyenMuc(){
            axios
                .post('/admin/chuyen-muc/update', this.edit)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message);
                        $('#editModal').modal('hide');
                        this.loadData();
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },

        changeStatus(id){
            axios
                .get('/admin/chuyen-muc/change-status/' + id)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message);
                        this.loadData();
                    }else{
                        toastr.success(res.data.message);
                    }
                })
        },



        deleteChuyenMuc(){
            axios
                .get('/admin/chuyen-muc/delete/' + this.edit.id)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message);
                        $('#deleteModal').modal('hide');
                        this.loadData();
                    }else{
                        toastr.success(res.data.message);
                    }
                })
        },

        loadData(){
            axios
                .get('/admin/chuyen-muc/data')
                .then((res) => {
                    this.listChuyenMuc = res.data.list;
                })
        },

        toSlug(str) {
            str = str.toLowerCase();
            str = str
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '');
            str = str.replace(/[đĐ]/g, 'd');
            str = str.replace(/([^0-9a-z-\s])/g, '');
            str = str.replace(/(\s+)/g, '-');
            str = str.replace(/-+/g, '-');
            str = str.replace(/^-+|-+$/g, '');

            return str;
        },

        chuyenThanhSlug(){
            this.slug = this.toSlug(this.ten_chuyen_muc);
        },

        chuyenThanhSlugEdit(){
            this.edit.slug_chuyen_muc = this.toSlug(this.edit.ten_chuyen_muc);
        }
    },
});
</script>
@endsection
