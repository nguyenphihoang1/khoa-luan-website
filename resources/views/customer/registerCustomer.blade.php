<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="/assets_admin/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="/assets_admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/assets_admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/assets_admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="/assets_admin/css/pace.min.css" rel="stylesheet" />
	<script src="/assets_admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="/assets_admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets_admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="/assets_admin/css/app.css" rel="stylesheet">
	<link href="/assets_admin/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper" id="app">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="/assets_admin/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Đăng Ký</h3>
										<p>Bạn có sẳn sàng để đăng ký một tài khoản? <a href="/customer/login">Đăng Nhập Tại Đây</a>
										</p>
									</div>
									<div class="form-body">
										<form v-on:submit.prevent="dangKy()" id="formdata" class="row g-3">
											<div class="col-sm-6">
												<label class="form-label">Họ Và Tên</label>
												<input name="ho_va_ten" type="text" class="form-control"  placeholder="Nhập vào họ và tên">
											</div>
											<div class="col-sm-6">
												<label class="form-label">Số Điện Thoại</label>
												<input name="so_dien_thoai" type="number" class="form-control"  placeholder="Nhập vào số điện thoại">
											</div>
											<div class="col-12">
												<label class="form-label">Email</label>
												<input name="email" type="email" class="form-control"  placeholder="example@user.com">
											</div>
											<div class="col-12">
												<label class="form-label">Password</label>
												<div class="input-group">
													<input name="password" type="password" class="form-control border-end-0" placeholder="Nhập vào mật khẩu"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
                                            <div class="col-12">
												<label class="form-label">Ngày Sinh</label>
												<div class="input-group">
													<input name="ngay_sinh" type="date" class="form-control border-end-0" placeholder="Nhập vào ngày sinh">
												</div>
											</div>
											<div class="col-12">
												<label class="form-label">Giới Tính</label>
												<select class="form-select" name="gioi_tinh" aria-label="Default select example">
													<option value="0">Nam</option>
													<option value="1">Nữ</option>
													<option value="2">Chưa xác định</option>
												</select>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Đăng Ký</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="/assets_admin/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/assets_admin/js/jquery.min.js"></script>
	<script src="/assets_admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="/assets_admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="/assets_admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="/assets_admin/js/app.js"></script>
    <script>
        new Vue({
            el      :   '#app',
            data    :   {

            },
            created()   {

            },
            methods :   {
                dangKy() {
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
                        .post('/customer/register', paramObj)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                            } else {
                                toastr.error("Tài khoản hoặc mật khẩu không đúng!");
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
</body>

</html>
