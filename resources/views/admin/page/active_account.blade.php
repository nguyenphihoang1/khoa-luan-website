@extends('admin.share.master_page')
@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Danh Sách Khách Hàng
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Tên Khách Hàng</th>
                            <th class="text-center">Số Điện Thoại</th>
                            <th class="text-center">Giới Tính</th>
                            <th class="text-center">Active Account</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(value, key) in listKhachHang">
                            <th class="text-center align-middle">1</th>
                            <td class="align-middle">@{{ value.email }}</td>
                            <td class="align-middle">@{{ value.ho_va_ten }}</td>
                            <td class="align-middle">@{{ value.so_dien_thoai }}</td>
                            <td class="text-center">
                                <span v-if="value.gioi_tinh == 0">Nữ</span>
                                <span v-else-if="value.gioi_tinh == 1">Nam</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-success" v-on:click="changeStatus(value.id)" v-if="value.is_active == 1">Đã Kích Hoạt Tài Khoản</button>
                                <button class="btn btn-danger" v-on:click="changeStatus(value.id)" v-else>Chưa Kích Hoạt Tài Khoản</button>
                            </td>
                        </tr>
                    </tbody>
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
            listKhachHang : [],
        },
        created()   {
            this.loadKhachHang();
        },
        methods :   {
            loadKhachHang(){
                axios
                    .get('/admin/kich-hoat-tk/data')
                    .then((res) => {
                        this.listKhachHang = res.data.data;

                    });
            },
            changeStatus(id){
            axios
                .get('/admin/kich-hoat-tk/change-status/' + id)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message);
                        this.loadKhachHang();
                    }else{
                        toastr.success(res.data.message);
                    }
                })
        },
        },
    });
</script>

@endsection
