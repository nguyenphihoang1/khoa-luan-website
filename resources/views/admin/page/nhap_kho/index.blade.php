@extends('admin.share.master_page')
@section('noi_dung')
<div class="row" id="app">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                Danh Sách Sản Phẩm
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="100%">
                                <input v-on:keyup="timSP()" v-model="search_sp" type="text" class="form-control" placeholder="Nhập vào sản phẩm cần tìm">
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Sản Phẩm</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(v, key) in dsSanPham">
                            <th class="text-center align-middle">@{{ key + 1 }}</th>
                            <td class="align-middle">@{{ v.ten_san_pham }}</td>
                            <td class="align-middle text-center">
                                <button class="btn btn-sm btn-primary" v-on:click="add(v.id, v.ten_san_pham)">Thêm</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                Chi tiết đơn hàng
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Sản Phẩm</th>
                            <th class="text-center">Số Lượng</th>
                            <th class="text-center">Đơn Giá</th>
                            <th class="text-center">Thành Tiền</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(v, k) in dsNhapKho">
                            <th class="text-center align-middle">@{{ k + 1 }}</th>
                            <td class="align-middle">@{{ v.ten_san_pham }}</td>
                            <td class="align-middle">
                                <input type="number" class="form-control" v-model="v.so_luong_nhap" v-on:blur="update(v)">
                            </td>
                            <td class="align-middle">
                                <input type="number" class="form-control" v-model="v.don_gia_nhap" v-on:blur="update(v)">
                            </td>
                            <td class="align-middle">
                                @{{ format(v.so_luong_nhap * v.don_gia_nhap) }}
                            </td>
                            <td class="align-middle text-center">
                                <button class="btn btn-danger" v-on:click="destroy(v)">Xóa Dòng</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="100%">
                                <textarea class="form-control" v-model="ghi_chu" cols="30" rows="5" placeholder="Nhập vào ghi chú đơn hàng"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <button v-on:click="nhapKho()" class="btn btn-primary">Nhập Kho</button>
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
        dsSanPham               : [],
        search_sp               : '',
        dsNhapKho               : [],
        id_hoa_don_nhap_kho     : {{ $id_hoa_don }},
        ghi_chu                 : '',
    },
    created()   {
        this.loadSanPham();
        this.loadNhapKho();
    },
    methods :   {
        nhapKho() {
            var paramObj = {
                'id'        :   this.id_hoa_don_nhap_kho,
                'ghi_chu'   :   this.ghi_chu,
            };
            axios
                .post('/admin/nhap-kho/real', paramObj)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message);
                        window.location.href = '/admin/nha-cung-cap/index';
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        format(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
        },
        loadSanPham() {
            axios
                .get('/admin/san-pham/data')
                .then((res) => {
                    this.dsSanPham = res.data.data;
                });
        },
        loadNhapKho() {
            axios
                .get('/admin/nhap-kho/data/' + this.id_hoa_don_nhap_kho)
                .then((res) => {
                    this.dsNhapKho = res.data.data;
                });
        },
        timSP() {
            var payload = {
                'search_sp_serve' : this.search_sp,
            };
            axios
                .post('/admin/san-pham/search', payload)
                .then((res) => {
                    this.dsSanPham = res.data.data;
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        add(id, name) {
            var paramObj = {
                'id_san_pham'       :   id,
                'id_hoa_don_nhap'   :   this.id_hoa_don_nhap_kho,
                'ten_san_pham'      :   name,
            };
            axios
                .post('/admin/nhap-kho', paramObj)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message);
                        this.loadNhapKho();
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        update(v) {
            axios
                .post('/admin/nhap-kho/update', v)
                .then((res) => {
                    if(res.data.status) {
                        // toastr.success(res.data.message);
                        this.loadNhapKho();
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        destroy(v) {
            axios
                .post('/admin/nhap-kho/delete', v)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message);
                        this.loadNhapKho();
                    } else {
                        toastr.error(res.data.message);
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
    },
});
</script>
@endsection
