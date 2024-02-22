@extends('admin.share.master_page')
@section('noi_dung')
    <div class="row" id="app">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4><b>THÊM MỚI NHÀ CUNG CẤP</b></h4>
                </div>
                <form id="formdata" v-on:submit.prevent="add()">
                    <div class="card-body">
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Mã số thuế</label>
                            <input v-model="ma_so_thue" v-on:blur="timMST()" name="ma_so_thue" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Tên công ty</label>
                            <input v-model="ten_cong_ty" name="ten_cong_ty" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Tên người đại diện</label>
                            <input  name="ten_nguoi_dai_dien" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Số điện thoại</label>
                            <input name="so_dien_thoai" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Email</label>
                            <input name="email" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Địa chỉ</label>
                            <input v-model="dia_chi" name="dia_chi" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Tên gợi nhớ</label>
                            <input name="ten_goi_nho" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary">Thêm Mới</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><b>DANH SÁCH NHÀ CUNG CẤP</b></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">#</th>
                                    <th class="text-center align-middle">Mã số thuế</th>
                                    <th class="text-center align-middle">Tên công ty</th>
                                    <th class="text-center align-middle">Tên người đại diện</th>
                                    <th class="text-center align-middle">Số điện thoại</th>
                                    <th class="text-center align-middle">Email</th>
                                    <th class="text-center align-middle">Địa chỉ</th>
                                    <th class="text-center align-middle">Tên gợi nhớ</th>
                                    <th class="text-center align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list">
                                    <th class="align-middle text-center">@{{ key + 1 }}</th>
                                    <td class="align-middle">@{{ value.ma_so_thue }}</td>
                                    <td class="align-middle">@{{ value.ten_cong_ty }}</td>
                                    <td class="align-middle">@{{ value.ten_nguoi_dai_dien }}</td>
                                    <td class="align-middle">@{{ value.so_dien_thoai }}</td>
                                    <td class="align-middle">@{{ value.email }}</td>
                                    <td class="align-middle">@{{ value.dia_chi }}</td>
                                    <td class="align-middle">@{{ value.ten_goi_nho }}</td>
                                    <td class="align-middle text-nowrap text-center">
                                        <a v-bind:href="'/admin/nhap-kho/' + value.id" class="btn btn-primary">Nhập kho</a>
                                        <button class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#updateModal" v-on:click="edit = value">Chỉnh sửa</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" v-on:click="destroy = value">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xóa Nhà Cung Cấp</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn xóa nhà cung cấp @{{destroy.ten_cong_ty}} không!!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" v-on:click="DeleteNCC()">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Nhà Cung Cấp</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formdata_edit" v-on:submit.prevent="updateNCC()">
                                            <div class="card-body">
                                                <input v-model="edit.id" name="id" class="form-control mt-1" type="hidden">
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Mã số thuế</label>
                                                    <input v-model="edit.ma_so_thue" name="ma_so_thue" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Tên công ty</label>
                                                    <input v-model="edit.ten_cong_ty" name="ten_cong_ty" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Tên người đại diện</label>
                                                    <input v-model="edit.ten_nguoi_dai_dien" name="ten_nguoi_dai_dien" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Số điện thoại</label>
                                                    <input v-model="edit.so_dien_thoai" name="so_dien_thoai" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Email</label>
                                                    <input v-model="edit.email" name="email" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Địa chỉ</label>
                                                    <input v-model="edit.dia_chi" name="dia_chi" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label">Tên gợi nhớ</label>
                                                    <input v-model="edit.ten_goi_nho" name="ten_goi_nho" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Đóng</button>
                                                <button class="btn btn-primary">Cập Nhật</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            list        :   [],
            destroy     :   {},
            edit        :   {},
            ma_so_thue  :   '',
            ten_cong_ty :   '',
            dia_chi     :   '',
        },
        created()   {
            this.loadData();
        },
        methods :   {
            loadData() {
                axios
                    .get('/admin/nha-cung-cap/data')
                    .then((res) => {
                        this.list = res.data.data;
                    });
            },
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
                    .post('/admin/nha-cung-cap/create', paramObj)
                    .then((res) => {
                        toastr.success(res.data.message);
                        this.loadData();
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
            updateNCC() {
                console.log(123);
                var paramObj = {};
                $.each($('#formdata_edit').serializeArray(), function(_, kv) {
                    if (paramObj.hasOwnProperty(kv.name)) {
                        paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                        paramObj[kv.name].push(kv.value);
                    } else {
                        paramObj[kv.name] = kv.value;
                    }
                });

                axios
                    .post('/admin/nha-cung-cap/update', paramObj)
                    .then((res) => {
                        toastr.success(res.data.message);
                        this.loadData();
                        $('#updateModal').modal('hide');
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
            DeleteNCC() {
                axios
                    .post('/admin/nha-cung-cap/delete', this.destroy)
                    .then((res) => {
                        toastr.success(res.data.message);
                        this.loadData();
                        $('#deleteModal').modal('hide');
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
            timMST() {
                var paramObj = {
                    'mst'   :   this.ma_so_thue,
                };
                axios
                    .post('/admin/nha-cung-cap/check-mst', paramObj)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message);
                            this.ten_cong_ty = res.data.ten_cong_ty;
                            this.dia_chi = res.data.dia_chi;
                        } else {
                            toastr.error(res.data.message);
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            }
        },
    });
</script>
@endsection
