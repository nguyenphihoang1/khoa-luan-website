@extends('admin.share.master_page')
@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-5">
        <div class="alert alert-primary" role="alert">
            @{{ thongbao }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-3">
            <button v-on:click="giatri--" class="btn btn-danger">-</button>
            <input type="text" class="form-control text-center" v-model="giatri">
            <button v-on:click="giatri++" class="btn btn-primary">+</button>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                Danh Sách Tài Khoản
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Họ Và Tên</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Số Điện Thoại</th>
                            <th class="text-center">Ngày Sinh</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(v, key) in listTK">
                            <tr>
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                <td class="align-middle">@{{ v.ho_va_ten }}</td>
                                <td class="align-middle">@{{ v.email }}</td>
                                <td class="align-middle">@{{ v.so_dien_thoai }}</td>
                                <td class="align-middle">@{{ v.ngay_sinh }}</td>
                                <td class="text-center">
                                    <button class="btn btn-info">Cập Nhật</button>
                                    <button class="btn btn-danger">Xóa Bỏ</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        new Vue({
            el      :   '#app',
            data    :   {
                thongbao : '',
                giatri   : 0,
                listTK   : [],
            },
            created()   {
                this.loadData();
                this.layTaiKhoan();
            },
            methods :   {
                loadData() {
                    axios
                        .get('/demo-data')
                        .then((res) => {
                            this.thongbao = res.data.message;
                            this.giatri   = res.data.gia_tri;
                        });
                },
                layTaiKhoan() {
                    axios
                        .get('/admin/tai-khoan/data')
                        .then((res) => {
                            this.listTK = res.data.data;
                        });
                },
            },
        });
    });
</script>
@endsection
