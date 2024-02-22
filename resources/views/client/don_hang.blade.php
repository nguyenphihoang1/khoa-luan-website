@extends('client.master')
@section('noi_dung')
<main id="MainContent" class="content-for-layout">
    <div class="checkout-page mt-100">
        <div class="container">
            <div class="checkout-page-wrapper">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                        <div class="section-header mb-3">
                            <h2 class="section-heading">Danh Sách Đơn Hàng</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Tiền hàng</th>
                            <th>Phí Ship</th>
                            <th>Địa Chỉ</th>
                            <th>Thanh Toán</th>
                            <th>Giao Hàng</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(value, index) in list">
                            <tr>
                                <th class="text-center align-middle">@{{ index +  1}}</th>
                                <td class="text-center align-middle">@{{ value.hash_don_hang }}</td>
                                <td class="text-end align-middle">@{{ numberformat(value.tien_hang) }}</td>
                                <td class="text-end align-middle">@{{ numberformat(value.phi_ship) }}</td>
                                <td class="text-start align-middle">@{{ value.dia_chi }}</td>
                                <td class="text-center align-middle">
                                    <button v-if="value.thanh_toan == - 1" class="btn btn-danger">Chưa Thanh Toán</button>
                                    <button v-else-if="value.thanh_toan == 0" class="btn btn-success">Thanh Toán Online</button>
                                    <button v-else class="btn btn-info">Thanh Toán Tiền Mặt</button>
                                </td>
                                <td class="text-center align-middle">
                                    <button v-if="value.giao_hang == 0" class="btn btn-danger">Chưa Giao</button>
                                    <button v-else-if="value.giao_hang == 1" class="btn btn-success">Đang Vận Chuyển</button>
                                    <button v-else class="btn btn-info">Đã Nhận</button>
                                </td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#chiTietDonhang" v-on:click="chiTietDonHang(value.id)">Chi Tiết</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
        <div class="modal fade" id="chiTietDonhang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                       <h3>Danh Sách Sản Phẩm</h3>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr v-for="(value, key) in list_san_pham">
                                <td>
                                    <div class="minicart-item d-flex">
                                        <div class="mini-img-wrapper">
                                            <img class="mini-img" v-bind:src="value?.hinh_anh.split(',')[0]"
                                                alt="img">
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a target="_blank"
                                                    v-bind:href="'/product/' + value.slug_san_pham + 'post' + value.id_san_pham">@{{ value.ten_san_pham }}</a>
                                            </h2>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @{{ numberformat(tinhGia(value.gia_ban, value.gia_khuyen_mai)) }} x @{{ value.so_luong }}
                                </td>
                                <td>
                                    @{{ numberformat(tinhGia(value.gia_ban, value.gia_khuyen_mai) * value.so_luong ) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection
@section('js')
<script>
    new Vue({
        el: '#MainContent',
        data: {
            list: [],
            list_san_pham: [],
            sub: 0,
            ship: 0,
        },
        created() {
            this.loadData();
        },
        methods: {
            numberformat(number) {
                return new Intl.NumberFormat('vi-VI', {
                    style: 'currency',
                    currency: 'VND'
                }).format(number)
            },
            loadData() {
                axios
                    .get('/don-hang/data')
                    .then((res) => {
                        this.list = res.data.data;
                        console.log(this.list);
                    });
            },
            chiTietDonHang(id) {
                axios
                    .get('/don-hang/' + id)
                    .then((res) => {
                        this.list_san_pham = res.data.data;
                    });
            },

            tinhGia(gia_ban, gia_khuyen_mai) {
                if (gia_khuyen_mai > 0) {
                    return gia_khuyen_mai;
                }
                return gia_ban;
            },
        },
    });
</script>
@endsection
