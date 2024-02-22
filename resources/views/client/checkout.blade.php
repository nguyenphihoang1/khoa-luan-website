@extends('client.master')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">
        <div class="checkout-page mt-100">
            <div class="container">
                <div class="checkout-page-wrapper">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                            <div class="section-header mb-3">
                                <h2 class="section-heading">Check out</h2>
                            </div>

                            <div class="shipping-address-area">
                                <h2 class="shipping-address-heading pb-1">Shipping address</h2>
                                <div class="shipping-address-form-wrapper">
                                    <form v-on:submit.prevent="process()" id="formdata"
                                        class="shipping-address-form common-form">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">First name</label>
                                                    <input name="ho_lot" type="text" value="{{ $khachHang->ho_lot }}" />
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Last name</label>
                                                    <input name="ten_khach" type="text"
                                                        value="{{ $khachHang->ten_khach }}" />
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Email address</label>
                                                    <input name="email" type="email" value="{{ $khachHang->email }}" />
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Phone number</label>
                                                    <input name="so_dien_thoai" type="text"
                                                        value="{{ $khachHang->so_dien_thoai }}" />
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Address 1</label>
                                                    <input name="dia_chi" type="text" value="" />
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Chọn Phương Thức Thanh Toán</label>
                                                    <select class="form-control" name="thanh_toan">
                                                        <option value="0">Thanh toán tự động</option>
                                                        <option value="-1">Thanh toán tiền mặt</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="shipping-address-area billing-area">
                                            <div
                                                class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                                <a href="/list-cart" class="checkout-page-btn minicart-btn btn-secondary">BACK TO
                                                    CART</a>
                                                {{-- <button type="button" v-if="check_thanh_toan == 0" class="checkout-page-btn minicart-btn btn-primary" data-bs-toggle="modal" data-bs-target="#thanhtoanModal">PROCEED TO
                                                    SHIPPING</button> --}}
                                                {{-- <button type="submit" v-else class="checkout-page-btn minicart-btn btn-primary">PROCEED TO
                                                    SHIPPING</button> --}}
                                                <button type="submit" class="checkout-page-btn minicart-btn btn-primary">PROCEED TO
                                                        SHIPPING</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="thanhtoanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-danger">
                                  <h5 class="modal-title text-white" id="exampleModalLabel">Thanh Toán Đơn Hàng</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn vui lòng chuyển khoản tới số tài khoản: xxxxxxxxxxxx <br>
                                    Để thanh toán đơn hàng của bạn.
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                            <div class="cart-total-area checkout-summary-area">
                                <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Chi Tiết</h4>
                                    <template v-for="(value, key) in list">
                                        <div class="minicart-item d-flex">
                                            <div class="mini-img-wrapper">
                                                <img class="mini-img" v-bind:src="value?.hinh_anh.split(',')[0]"
                                                    alt="img">
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a target="_blank"
                                                        v-bind:href="'/product/' + value.slug_san_pham + 'post' + value.id_san_pham">@{{ value.ten_san_pham }}</a>
                                                </h2>
                                                <p class="product-vendor">@{{ numberformat(tinhGia(value.gia_ban, value.gia_khuyen_mai)) }} x @{{ value.so_luong }}
                                                </p>
                                            </div>
                                        </div>
                                    </template>
                                    <div class="cart-total-box mt-4 bg-transparent p-0">
                                        <div class="subtotal-item subtotal-box">
                                            <h4 class="subtotal-title">Subtotals:</h4>
                                            <p class="subtotal-value">@{{ numberformat(sub) }}</p>
                                        </div>
                                        <div class="subtotal-item shipping-box">
                                            <h4 class="subtotal-title">Shipping:</h4>
                                            <p class="subtotal-value">@{{ numberformat(ship) }}</p>
                                        </div>
                                        <hr />
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Total:</h4>
                                            <p class="subtotal-value">@{{ numberformat(ship + sub) }}</p>
                                        </div>
                                    </div>
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
                sub: 0,
                ship: 0,
                check_thanh_toan : 0,
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
                        .get('/list-cart/data')
                        .then((res) => {
                            this.list = res.data.data;
                            this.tinhTong();
                        });
                },
                tinhGia(gia_ban, gia_khuyen_mai) {
                    if (gia_khuyen_mai > 0) {
                        return gia_khuyen_mai;
                    }
                    return gia_ban;
                },
                tinhTong() {
                    var total = 0;
                    var count_ship = 0;
                    $.each(this.list, function(key, value) {
                        var don_gia = value.gia_ban;
                        if (value.gia_khuyen_mai > 0) {
                            don_gia = value.gia_khuyen_mai;
                        }
                        total += don_gia * value.so_luong;
                        count_ship += value.so_luong;
                    })
                    this.sub = total;
                    if (count_ship < 3) {
                        this.ship = 30000;
                    } else {
                        this.ship = count_ship * 10000;
                    }
                },
                process() {
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
                        .post('/process', paramObj)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                location.reload();
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
