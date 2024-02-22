@extends('admin.share.master_page')
@section('noi_dung')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Thêm Mới Chuyên Mục
            </div>
            <div class="card-body">
                <label>Tên Chuyên Mục</label>
                <input class="form-control mt-1" type="text" id="ten_chuyen_muc">
                <label class="mt-3">Slug Chuyên Mục</label>
                <input class="form-control mt-1" type="text" id="slug_chuyen_muc">
                <label class="mt-3">Tình Trạng</label>
                <select class="form-control mt-1" id="tinh_trang">
                    <option value="1">Hiển Thị</option>
                    <option value="0">Tạm Tắt</option>
                </select>
                <label class="mt-3">Chuyên Mục Cha</label>
                <select class="selectt form-control mt-1" id="id_chuyen_muc_cha">

                </select>
            </div>
            <div class="card-footer text-end">
                <button id="themMoi" class="btn btn-primary">Thêm Mới</button>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Danh Sách Chuyên Mục
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table_chuyen_muc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Chuyên Mục</th>
                            <th class="text-center">Tình Trạng</th>
                            <th class="text-center">Chuyên Mục Cha</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Chuyên Mục</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <input class="form-control" type="hidden" id="delete_id" placeholder="Nhập vào id cần xóa">
                            <p>Bạn hãy chắc chắn là sẽ xóa Chuyên Mục này. Việc này không thể hoàn tác!</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="accpectDelete" type="button" class="btn btn-danger">Đồng Ý Xóa</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Chuyên Mục</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input class="form-control mt-1" type="hidden" id="update_id">
                                <label>Tên Chuyên Mục</label>
                                <input class="form-control mt-1" type="text" id="update_ten_chuyen_muc">
                                <label class="mt-3">Slug Chuyên Mục</label>
                                <input class="form-control mt-1" type="text" id="update_slug_chuyen_muc">
                                <label class="mt-3">Tình Trạng</label>
                                <select class="form-control mt-1" id="update_tinh_trang">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Tạm Tắt</option>
                                </select>
                                <label class="mt-3">Chuyên Mục Cha</label>
                                <select class="selectt form-control mt-1" id="update_id_chuyen_muc_cha">
                                    <option value="0">Chuyên Mục Root</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="accpectUpdate" type="button" class="btn btn-danger">Cập Nhật</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        // $("#ten_chuyen_muc").keyup(function() {
        $("body").on('keyup', '#ten_chuyen_muc', function() {
            // var noi_dung = $(this).val();
            var noi_dung = $("#ten_chuyen_muc").val();
            var slug = toSlug(noi_dung);
            $("#slug_chuyen_muc").val(slug);
        });

        $("body").on('keyup', '#update_ten_chuyen_muc', function() {
            // var noi_dung = $(this).val();
            var noi_dung = $("#update_ten_chuyen_muc").val();
            var slug = toSlug(noi_dung);
            $("#update_slug_chuyen_muc").val(slug);
        });

        function toSlug(str) {
            // Chuyển chuỗi sang chữ thường
            str = str.toLowerCase();

            // Xóa dấu
            str = str.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            str = str.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            str = str.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            str = str.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            str = str.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            str = str.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            str = str.replace(/đ/gi, 'd');

            // Xóa khoảng trắng và ký tự đặc biệt
            str = str.replace(/\s+/g, '-'); // Thay khoảng trắng bằng dấu gạch ngang
            str = str.replace(/[^a-z0-9-]/gi, ''); // Xóa ký tự đặc biệt

            return str;
        }

        $("body").on('click', '#accpectUpdate', function() {
            var id                  = $("#update_id").val();
            var ten_chuyen_muc      = $("#update_ten_chuyen_muc").val();
            var slug_chuyen_muc     = $("#update_slug_chuyen_muc").val();
            var tinh_trang          = $("#update_tinh_trang").val();
            var id_chuyen_muc_cha   = $("#update_id_chuyen_muc_cha").val();

            var z = {
                'id'                    : id,
                'ten_chuyen_muc'        : ten_chuyen_muc,
                'slug_chuyen_muc'       : slug_chuyen_muc,
                'tinh_trang'            : tinh_trang,
                'id_chuyen_muc_cha'     : id_chuyen_muc_cha
            };

            // Gửi lên chuyên mục trên backend để tạo chuyên mục
            $.ajax({
                'url'       :   '/admin/chuyen-muc/update',
                'type'      :   'post',
                'data'      :   z,
                'success'   :   function(res) {
                    if(res.status) {
                        toastr.success("Đã cập nhật chuyên mục thành công!");
                        hienThiTable();
                        $('#editModal').modal('hide');
                    } else {
                        toastr.error("Có lỗi không mong muốn xảy ra!");
                    }
                },
            });
        });
        // $("#accpectDelete").click()
        $("body").on('click', '#accpectDelete', function() {
            var id = $("#delete_id").val();
            $.ajax({
                'url'       :   '/admin/chuyen-muc/delete/' + id,
                'type'      :   'get',
                'success'   :   function(res) {
                    if(res.status == 1) {
                        // Thông báo, load table mới, tắt modal
                        toastr.success("Đã xóa chuyên mục thành công!");
                        hienThiTable();
                        $('#deleteModal').modal('hide');
                    } else {
                        // Thông báo rồi kệ nó
                        toastr.error("Dữ liệu không tồn tại!");
                    }
                },
            });
        });

        $("body").on('click', '.xoa', function() {
            var xxx = $(this).data('id');
            $("#delete_id").val(xxx);
        });

        $("body").on('click', '.sua', function() {
            var id = $(this).data('id');
            $.ajax({
                'url'       :   '/admin/chuyen-muc/edit/' + id,
                'type'      :   'get',
                'success'   :   function(res) {
                    if(res.status) {
                        $("#update_id").val(res.data.id);
                        $("#update_ten_chuyen_muc").val(res.data.ten_chuyen_muc);
                        $("#update_slug_chuyen_muc").val(res.data.slug_chuyen_muc);
                        $("#update_tinh_trang").val(res.data.tinh_trang);
                        $("#update_id_chuyen_muc_cha").val(res.data.id_chuyen_muc_cha);
                    } else {
                        toastr.error("Chuyên mục không tồn tại!");
                        $('#editModal').modal('hide');
                    }
                },
            });
        });

        hienThiTable();
        function hienThiTable() {
            $.ajax({
                'url'       :   '/admin/chuyen-muc/data',
                'type'      :   'get',
                'success'   :   function(abc) {
                    var noi_dung = '';
                    var option   = '<option value="0">Chuyên Mục Root</option>';
                    $.each(abc.list, function(k, v) {
                        option   += '<option value="'+ v.id +'">'+ v.ten_chuyen_muc +'</option>';
                        noi_dung += '<tr>';
                        noi_dung += '<th class="align-middle text-center">'+ (k + 1) +'</th>';
                        noi_dung += '<td class="align-middle">'+ v.ten_chuyen_muc +'</td>';
                        noi_dung += '<td class="align-middle text-center">';
                        if(v.tinh_trang == 1) {
                            noi_dung += '<button data-page="'+ v.id +'" class="doiTrangThai btn btn-success">Hiển Thị</button>';
                        } else {
                            noi_dung += '<button data-page="'+ v.id +'" class="doiTrangThai btn btn-warning">Tạm Tắt</button>';
                        }
                        noi_dung += '</td>';
                        if(v.ten_chuyen_muc_cha == null) {
                            noi_dung += '<td class="align-middle">Root</td>';
                        } else {
                            noi_dung += '<td class="align-middle">'+ v.ten_chuyen_muc_cha +'</td>';
                        }
                        noi_dung += '<td class="text-center">';
                        noi_dung += '<button data-id="'+ v.id +'" class="sua btn btn-info" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#editModal">Cập Nhật</button>';
                        noi_dung += '<button data-id="'+ v.id +'" class="xoa btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa Bỏ</button>';
                        noi_dung += '</td>';
                        noi_dung += '</tr>';
                    });
                    // Đưa nội dung lên HTML
                    $("#table_chuyen_muc tbody").html(noi_dung);
                    $("#id_chuyen_muc_cha").html(option);
                    $("#update_id_chuyen_muc_cha").html(option);
                },
            });
        }

        $("#themMoi").click(function() {
            var ten_chuyen_muc      = $("#ten_chuyen_muc").val();
            var slug_chuyen_muc     = $("#slug_chuyen_muc").val();
            var tinh_trang          = $("#tinh_trang").val();
            var id_chuyen_muc_cha   = $("#id_chuyen_muc_cha").val();

            var z = {
                'ten_chuyen_muc'        : ten_chuyen_muc,
                'slug_chuyen_muc'       : slug_chuyen_muc,
                'tinh_trang'            : tinh_trang,
                'id_chuyen_muc_cha'     : id_chuyen_muc_cha
            };

            // Gửi lên chuyên mục trên backend để tạo chuyên mục
            $.ajax({
                'url'       :   '/admin/chuyen-muc/create',
                'type'      :   'post',
                'data'      :   z,
                'success'   :   function(res) {
                    if(res.xxx) {
                        toastr.success("Đã thêm mới chuyên mục thành công!");
                        hienThiTable();
                    }
                },
            });
        });

        $("body").on('click', '.doiTrangThai', function() {
            var id = $(this).data('page');
            $.ajax({
                'url'       :   '/admin/chuyen-muc/doi-trang-thai/' + id,
                'type'      :   'get',
                'success'   :   function(res) {
                    if(res.status == "ABC") {
                        toastr.success("Đã đổi trạng thái thành công!");
                        hienThiTable();
                    } else {
                        toastr.error("Dữ liệu không tồn tại");
                    }
                },
            });
        });
    });
</script>
@endsection
