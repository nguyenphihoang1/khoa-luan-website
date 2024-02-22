@extends('client.master')
@section('noi_dung')
<main id="app" class="content-for-layout">
    <div v-if="trang_thai == 1" class="login-page mt-100">
        <div class="container">
            <b>@{{ thong_bao }}</b>
            <form v-on:submit.prevent="add_1()" id="formdata_1" class="login-form common-form mx-auto">
                <div class="section-header mb-3 text-end">
                    <button type="button" class="btn btn-success" v-on:click="trang_thai = 0">Login</button>
                    <h2 class="section-heading text-center">Register</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Họ Lót</label>
                            <input required name="ho_lot" type="text" />
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Tên</label>
                            <input required name="ten_khach" type="text" />
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Email address</label>
                            <input required type="email" name="email" />
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Password</label>
                            <input required name="password" type="password" />
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Re Password</label>
                            <input required name="re_password" type="password" />
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Số Điện Thoại</label>
                            <input required name="so_dien_thoai" type="tel" />
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Giới Tính</label>
                            <select name="gioi_tinh">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                                <option value="2">Khác</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Ngày Sinh</label>
                            <input required name="ngay_sinh" type="date" />
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-primary d-block mt-3 btn-signin">REGISTER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div v-else class="login-page mt-100">
        <div class="container">
            <b>@{{ thong_bao }}</b>
            <form v-on:submit.prevent="login_1()" id="formdata_1" class="login-form common-form mx-auto">
                <div class="section-header mb-3 text-end">
                    <button type="button" class="btn btn-primary" v-on:click="trang_thai = 1">Register</button>
                    <h2 class="section-heading text-center">Login</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Email address</label>
                            <input required type="email" name="email" />
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Password</label>
                            <input required name="password" type="password" />
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-primary d-block mt-3 btn-signin">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
@section('js')
<script>
new Vue({
    el      :   '#app',
    data    :   {
        thong_bao   :   '',
        trang_thai  :   1,
    },
    created()   {

    },
    methods :   {
        add_1() {
            var paramObj = {};
            $.each($('#formdata_1').serializeArray(), function(_, kv) {
                if (paramObj.hasOwnProperty(kv.name)) {
                    paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                    paramObj[kv.name].push(kv.value);
                } else {
                    paramObj[kv.name] = kv.value;
                }
            });

            axios
                .post('/register', paramObj)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message);
                        this.thong_bao = res.data.message;
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        },
        login_1() {
            var paramObj = {};
            $.each($('#formdata_1').serializeArray(), function(_, kv) {
                if (paramObj.hasOwnProperty(kv.name)) {
                    paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                    paramObj[kv.name].push(kv.value);
                } else {
                    paramObj[kv.name] = kv.value;
                }
            });

            axios
                .post('/login', paramObj)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message, "Thành công!");
                        this.thong_bao = res.data.message;
                    } else {
                        toastr.error(res.data.message, "Error!");
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
