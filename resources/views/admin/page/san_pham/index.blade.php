@extends('admin.share.master_page')
@section('noi_dung')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mt-2">Thêm Mới Sản Phẩm</h6>
            </div>
            <div class="card-body">
                <label>Tên Sản Phẩm</label>
                <input class="form-control mt-1" type="text" id="ten_san_pham">
                <label class="mt-1">Slug Sản Phẩm</label>
                <input class="form-control mt-1" type="text" id="slug_san_pham">
                <label class="mt-1">Hình Ảnh</label>
                <input class="form-control mt-1" type="text" id="hinh_anh">
                <label class="mt-1">Mô Tả</label>
                <input name="editor1" class="form-control mt-1" type="text" id="mo_ta">
                <label class="mt-1">Chuyên Mục</label>
                <input class="form-control mt-1" type="text" id="id_chuyen_muc">
                <label class="mt-1">Trạng Thái</label>
                <input class="form-control mt-1" type="text" id="trang_thai">
            </div>
            <div class="card-footer text-end">
                <button id="themMoiSanPham" class="btn btn-primary">Thêm Mới Sản Phẩm</button>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mt-2">Danh Sách Sản Phẩm</h6>
            </div>
            <div class="card-body">
                <div class="row" id="aloXinh">
                    <div class="col-md-4">
                        <div class="card border-primary border-bottom border-3 border-0">
                            <div class="card-header">
                                Tên Sản Phẩm
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img style="height: 200px" src="/assets_admin/images/products/01.png">
                                </div>
                                <p class="card-text">
                                    Nội Dung Sản Phẩm là ...
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="javascript:;" class="btn btn-inverse-primary"><i class="bx bx-star"></i>Button</a>
                                <a href="javascript:;" class="btn btn-primary"><i class="bx bx-microphone"></i>Button</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <table class="table table-bordered" id="danhSachSanPham">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Sản Phẩm</th>
                            <th class="text-center">Tình Trạng</th>
                            <th class="text-center">Chuyên Mục</th>
                            <th class="text-center">Hình Ảnh</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="aligin-middle text-center"></th>
                            <td class="aligin-middle">XXX</td>
                            <td class="aligin-middle">XXX</td>
                            <td class="aligin-middle">XXX</td>
                            <td class="aligin-middle">
                                <img src="/assets_admin/images/products/01.png" style="height: ;: 100px">
                                <img src="/assets_admin/images/products/02.png" style="width: 100px">
                            </td>
                            <td class="text-center">
                                <button class="btn btn-info mr-1">Cập Nhật</button>
                                <button class="btn btn-danger">Xóa Bỏ</button>
                            </td>
                        </tr>
                    </tbody>
                </table> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
<script>
    $(document).ready(function() {
        loadData();

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

        $("body").on('keyup', '#ten_san_pham', function() {
            // var noi_dung = $(this).val();
            var noi_dung = $(this).val();
            var slug = toSlug(noi_dung);
            $("#slug_san_pham").val(slug);
        });

        $("#themMoiSanPham").click(function() {
            var z = {
                'ten_san_pham'                  : $("#ten_san_pham").val(),
                'slug_san_pham'                 : $("#slug_san_pham").val(),
                'hinh_anh'                      : $("#hinh_anh").val(),
                'mo_ta'                         : CKEDITOR.instances['mo_ta'].getData(), //$("#mo_ta").val(),
                'id_chuyen_muc'                 : $("#id_chuyen_muc").val(),
                'trang_thai'                    : $("#trang_thai").val(),
            };

            $.ajax({
                'url'       :   '/admin/san-pham/create',
                'type'      :   'post',
                'data'      :   z,
                'success'   :   function(res) {
                    if(res.status) {
                        toastr.success(res.message);
                        loadData();
                    }
                },
            });
        });

        function loadData() {
            $.ajax({
                'url'   :   '/admin/san-pham/data',
                'type'  :   'get',
                'success':  function(res) {
                    var noi_dung = '';

                    $.each(res.data, function(k, v) {
                        noi_dung += '<div class="col-md-4">';
                        noi_dung += '<div class="card border-primary border-bottom border-3 border-0">';
                        noi_dung += '<div class="card-header">';
                        noi_dung += v.ten_san_pham;
                        noi_dung += '</div>';
                        noi_dung += '<div class="card-body">';
                        noi_dung += '<div class="text-center">';
                        var hinh_anh = '';
                        var data_hinh_anh = v.hinh_anh.split(';');
                        noi_dung += '<img style="height: 200px" src="' + data_hinh_anh[0] + '">';
                        noi_dung += '</div>';
                        noi_dung += '<p class="card-text">';
                        noi_dung += 'Nội Dung Sản Phẩm là ...';
                        noi_dung += '</p>';
                        noi_dung += '</div>';
                        noi_dung += '<div class="card-footer">';
                        noi_dung += '<a href="javascript:;" class="btn btn-inverse-primary"><i class="bx bx-star"></i>Button</a>';
                        noi_dung += '<a href="javascript:;" class="btn btn-primary"><i class="bx bx-microphone"></i>Button</a>';
                        noi_dung += '</div>';
                        noi_dung += '</div>';
                        noi_dung += '</div>';


                        // noi_dung += '<tr>';
                        // noi_dung += '<th class="aligin-middle text-center">'+ (k + 1) +'</th>';
                        // noi_dung += '<td class="aligin-middle">'+ v.ten_san_pham +'</td>';
                        // noi_dung += '<td class="aligin-middle">'+ v.trang_thai +'</td>';
                        // noi_dung += '<td class="aligin-middle">'+ v.id_chuyen_muc +'</td>';
                        // var hinh_anh = '';
                        // var data_hinh_anh = v.hinh_anh.split(';');
                        // $.each(data_hinh_anh, function(key, value) {
                        //     hinh_anh += '<img src="'+ value +'" style="height: 100px">'
                        // });
                        // noi_dung += '<td class="aligin-middle">'+ hinh_anh +'</td>';
                        // noi_dung += '<td class="text-center">';
                        // noi_dung += '<button class="btn btn-info mr-1">Cập Nhật</button>';
                        // noi_dung += '<button class="btn btn-danger">Xóa Bỏ</button>';
                        // noi_dung += '</td>';
                        // noi_dung += '</tr>';
                    });

                    $("#aloXinh").html(noi_dung);
                },
            });
        }
    });
</script>
@endsection
