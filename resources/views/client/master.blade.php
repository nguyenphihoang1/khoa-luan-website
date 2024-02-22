<!doctype html>
<html lang="en" class="no-js">

<head>
    @include('client.css')
</head>

<body>
    <div class="body-wrapper">
        @include('client.header')
        @include('client.menu')

        @yield('noi_dung')

        @include('client.footer')

        @include('client.js')
        @yield('js')

        <!-- Modal -->
        <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <button v-if="trang_thai == 1" class="btn btn-primary" v-on:click="trang_thai = 0">Login</button>
                            <button v-else class="btn btn-primary" v-on:click="trang_thai = 1">Register</button>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div v-if="trang_thai == 1" class="login-page">
                            <b>@{{ thong_bao }}</b>
                            <form style="max-width: 100% !important;" v-on:submit.prevent="add()" id="formdata" class="login-form common-form mx-auto">
                                <h2 class="section-heading text-center">Register</h2>
                                <div class="row">
                                    <div class="col-6">
                                        <fieldset>
                                            <label class="label">Họ Lót</label>
                                            <input required name="ho_lot" type="text" />
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset>
                                            <label class="label">Tên</label>
                                            <input required name="ten_khach" type="text" />
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset>
                                            <label class="label">Email address</label>
                                            <input required type="email" name="email" />
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset>
                                            <label class="label">Password</label>
                                            <input required name="password" type="password" />
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset>
                                            <label class="label">Re Password</label>
                                            <input required name="re_password" type="password" />
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset>
                                            <label class="label">Số Điện Thoại</label>
                                            <input required name="so_dien_thoai" type="tel" />
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset>
                                            <label class="label">Giới Tính</label>
                                            <select name="gioi_tinh">
                                                <option value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                                <option value="2">Khác</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
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
                        <div v-else class="login-page">
                            <b>@{{ thong_bao }}</b>
                            <form v-on:submit.prevent="login()" id="formdata" class="login-form common-form mx-auto">
                                <div class="section-header mb-3 text-end">
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
                                    <div class="mt-2">
                                        <a href="/forgetpw">Forget password</a>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button data-bs-dismiss="modal" type="submit" class="btn-primary d-block mt-3 btn-signin">LOGIN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    new Vue({
        el      :   '#authModal',
        data    :   {
            thong_bao   :   '',
            trang_thai  :   0,
        },
        created()   {

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
                    .post('/register', paramObj)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message);
                            this.thong_bao = res.data.message;
                            $('#authModal').modal('hide');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
            login() {
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
                    .post('/login', paramObj)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message, "Thành công!");
                            this.thong_bao = res.data.message;
                            location.reload();
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
    <script>
        $(document).ready(function() {
            $("#addtocart_me").click(function() {
                var paramObj = {
                    'id_san_pham'   : $("#id_san_pham").val(),
                    'so_luong'      : $("#so_luong").val(),
                };
                axios
                    .post('/add-to-cart', paramObj)
                    .then((res) => {
                        if(res.data.status == 1) {
                            toastr.success(res.data.message, "Success!");
                        } else if(res.data.status == 2) {
                            toastr.warning(res.data.message, "Success!");
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            })
        });
    </script>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/641c53514247f20fefe79278/1gs7aauc8';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
    <!--End of Tawk.to Script-->
</html>
