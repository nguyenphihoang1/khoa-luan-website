@extends('client.master')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">
        <div class="cart-page mt-100">
            <div class="container">
                <div class="cart-page-wrapper">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-12">
                            <table class="cart-table w-100">
                                <thead>
                                    <tr>
                                        <th class="cart-caption heading_18">Product</th>
                                        <th class="cart-caption heading_18"></th>
                                        <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                        <th class="cart-caption text-end heading_18">đơn giá</th>
                                        <th class="cart-caption text-end heading_18">Sub Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <template v-for="(value, key) in list">
                                        <tr class="cart-item">
                                            <td class="cart-item-media">
                                                <div class="mini-img-wrapper">
                                                    <img class="mini-img" v-bind:src="value?.hinh_anh.split(',')[0]"
                                                        alt="img">
                                                </div>
                                            </td>
                                            <td class="cart-item-details">
                                                <h2 class="product-title"><a target="_blank" v-bind:href="'/product/' + value.slug_san_pham + 'post' + value.id_san_pham">@{{ value.ten_san_pham }}</a>
                                                </h2>
                                            </td>
                                            <td class="cart-item-quantity">
                                                <div class="quantity d-flex align-items-center justify-content-between">
                                                    <button class="qty-btn dec-qty" v-on:click="value.so_luong--; update(value)"><img
                                                            src="/assets_client/img/icon/minus.svg" alt="minus"></button>
                                                    <input class="qty-input" type="number" name="qty" v-model="value.so_luong" v-on:change="update(value)"
                                                        min="0">
                                                    <button class="qty-btn inc-qty" v-on:click="value.so_luong++; update(value)"><img
                                                            src="/assets_client/img/icon/plus.svg" alt="plus" ></button>
                                                </div>
                                                <a href="#" class="product-remove mt-2 text-danger" v-on:click="destroy(value)">Remove</a>
                                            </td>
                                            <td class="cart-item-price text-end">
                                                <div class="product-price">@{{ numberformat(tinhGia(value.gia_ban, value.gia_khuyen_mai)) }}</div>
                                            </td>
                                            <td class="cart-item-price text-end">
                                                <div class="product-price">@{{ numberformat(tinhGia(value.gia_ban, value.gia_khuyen_mai) * value.so_luong) }}</div>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="cart-total-area">
                                <h3 class="cart-total-title d-none d-lg-block mb-0">Cart Totals</h4>
                                    <div class="cart-total-box mt-4">
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
                                        <p class="shipping_text">Shipping & taxes calculated at checkout</p>
                                        <div class="d-flex justify-content-center mt-4">
                                            <a href="/checkout" class="position-relative btn-primary text-uppercase">
                                                Procced to checkout
                                            </a>
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
                list    : [],
                sub     : 0,
                ship    : 0,
            },
            created() {
                this.loadData();
            },
            methods: {
                numberformat(number) {
                    return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number)
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
                    if(gia_khuyen_mai > 0) {
                        return gia_khuyen_mai;
                    }
                    return gia_ban;
                },
                tinhTong() {
                    var total = 0;
                    var count_ship = 0;
                    $.each(this.list, function(key, value) {
                        var don_gia = value.gia_ban;
                        if(value.gia_khuyen_mai > 0) {
                            don_gia = value.gia_khuyen_mai;
                        }
                        total +=  don_gia * value.so_luong;
                        count_ship += value.so_luong;
                    })
                    this.sub = total;
                    if(count_ship == 0) {
                        this.ship = 0;
                    } else if(count_ship < 3) {
                        this.ship = 30000;
                    } else {
                        this.ship = count_ship * 10000;
                    }
                },
                update(value) {
                    axios
                        .post('/update-cart', value)
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success(res.data.message, "Success!");
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, "Error!");
                                this.loadData();
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                destroy(value) {
                    axios
                        .post('/delete-cart', value)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, "Success!");
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, "Error!");
                                this.loadData();
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
