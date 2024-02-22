@extends('admin.share.master_page')
@section('noi_dung')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <form id="taoTaiKhoan">
                <div class="card-header">
                    Thêm Mới Tài Khoản
                </div>
                <div class="card-body">
                    <label>Họ Và Tên</label>
                    <input name="ho_va_ten" class="form-control mt-1" type="text" placeholder="Nhập vào họ và tên">
                    <label>Email</label>
                    <input name="email" class="form-control mt-1" type="email" placeholder="Nhập vào email">
                    <label>Mật Khẩu</label>
                    <input name="password" class="form-control mt-1" type="password">
                    <label>Nhập Lại Mật Khẩu</label>
                    <input name="re_password" class="form-control mt-1" type="password">
                    <label>Số Điện Thoại</label>
                    <input name="so_dien_thoai" class="form-control mt-1" type="text" placeholder="Nhập vào số điện thoại">
                    <label>Ngày Sinh</label>
                    <input name="ngay_sinh" class="form-control mt-1" type="date" placeholder="Nhập vào ngày sinh">
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Thêm Mới Tài Khoản</button>
                </div>
            </form>
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
                        <tr>
                            <th class="text-center align-middle"></th>
                            <td class="align-middle">AAA</td>
                            <td class="align-middle">AAA</td>
                            <td class="align-middle">AAA</td>
                            <td class="align-middle">AAA</td>
                            <td class="text-center">
                                <button class="btn btn-info">Cập Nhật</button>
                                <button class="btn btn-danger">Xóa Bỏ</button>
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
$(document).ready(function() {
    function loadData() {
        $.ajax({
            'url'       :   '/admin/tai-khoan/data',
            'type'      :   'get',
            'success'   :   function(res) {
                var noi_dung = '';
                $.each(res.data, function(k, v) {
                    noi_dung += '<tr>';
                    noi_dung += '<th class="text-center align-middle">' + (k + 1) + '</th>';
                    noi_dung += '<td class="align-middle">'+ v.ho_va_ten  +'</td>';
                    noi_dung += '<td class="align-middle">'+ v.email  +'</td>';
                    noi_dung += '<td class="align-middle">'+ v.so_dien_thoai  +'</td>';
                    noi_dung += '<td class="align-middle">'+ v.ngay_sinh  +'</td>';
                    noi_dung += '<td class="text-center">';
                    noi_dung += '<button class="btn btn-info">Cập Nhật</button>';
                    noi_dung += '<button class="btn btn-danger">Xóa Bỏ</button>';
                    noi_dung += '</td>';
                    noi_dung += '</tr>';
                })

                $("#table tbody").html(noi_dung);
            }
        });
    }

    loadData();

    $("#them_moi").click(function() {
        var payload = {
            'ho_va_ten'     :   $("#ho_va_ten").val(),
            'email'         :   $("#email").val(),
            'so_dien_thoai' :   $("#so_dien_thoai").val(),
            'password'      :   $("#password").val(),
            're_password'   :   $("#re_password").val(),
            'ngay_sinh'     :   $("#ngay_sinh").val(),
        };

        $.ajax({
            'url'       :   '/admin/tai-khoan/create-ajax',
            'type'      :   'post',
            'data'      :   payload,
            'success'   :   function(res) {
                if(res.status) {
                    toastr.success("Đã thêm mới tài khoản!");
                    loadData();
                }
            }
        });
    });

    $("#taoTaiKhoan").submit(function(e) {
        e.preventDefault();
        var paramObj = {};
        $.each($('#taoTaiKhoan').serializeArray(), function(_, kv) {
            if (paramObj.hasOwnProperty(kv.name)) {
                paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                paramObj[kv.name].push(kv.value);
            }
            else {
                paramObj[kv.name] = kv.value;
            }
        });

        $.ajax({
            'url'       :   '/admin/tai-khoan/create-ajax',
            'type'      :   'post',
            'data'      :   paramObj,
            'success'   :   function(res) {
                if(res.status) {
                    toastr.success("Đã thêm mới tài khoản!");
                    loadData();
                }
            }
        });
    });
});
</script>
@endsection
