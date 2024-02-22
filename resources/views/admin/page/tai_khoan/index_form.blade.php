@extends('admin.share.master_page')
@section('noi_dung')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <form action="/admin/tai-khoan/create-form" method="post">
                @csrf
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
                <table class="table table-bordered">
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
                        @foreach ($data as $key => $value)
                        <tr>
                            <th class="text-center align-middle">{{ $key + 1 }}</th>
                            <td class="align-middle">{{ $value->ho_va_ten }}</td>
                            <td class="align-middle">{{ $value->email }}</td>
                            <td class="align-middle">{{ $value->so_dien_thoai }}</td>
                            <td class="align-middle">{{ $value->ngay_sinh }}</td>
                            <td class="text-center">
                                <button class="btn btn-info">Cập Nhật</button>
                                <button class="btn btn-danger">Xóa Bỏ</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
