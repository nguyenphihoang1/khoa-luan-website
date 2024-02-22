@extends('admin.share.master_page')
@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-4">
        <form id="formdata" v-on:submit.prevent="add()">
            <div class="card">
                <div class="card-header">
                    Thêm Tin Tức
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input name="tieu_de" v-on:keyup="chuyenDoiSlug()" v-model="ten_tin_tuc" class="form-control mt-1" type="text">
                    </div>
                    <div class="form-group">
                        <label>Slug Bài Viêt</label>
                        <input name="slug_bai_viet" v-model="slug" class="form-control mt-1" type="text">
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <div class="input-group">
                            <input name="hinh_anh" id="hinh_anh" class="form-control" type="text" name="filepath">
                            <span class="input-group-prepend">
                                <a id="lfm" data-input="hinh_anh" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>
                    <div class="form-group">
                        <label>Mô Tả Ngắn</label>
                        <textarea name="mo_ta_ngan" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Mổ Tả Chi Tiết</label>
                        <input name="mo_ta_chi_tiet" id="mo_ta_chi_tiet" class="form-control mt-1" type="text">
                    </div>
                    <div class="form-group">
                        <label>Loại Bài Viêt</label>
                        <select name="loai_bai_viet" class="form-control">
                            <option value="1">Tin Hot</option>
                            <option value="2">Tin Thời Trang</option>
                            <option value="3">Thông Báo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tình Trạng</label>
                        <select name="trang_thai" class="form-control">
                            <option value="1">Hiển Thị</option>
                            <option value="0">Tạm Tắt</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Thêm Mới</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Danh Sách Tin Tức
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tiêu Đề</th>
                            <th class="text-center">Hình Ảnh</th>
                            <th class="text-center">Mô Tả Ngắn</th>
                            <th class="text-center">Mô Tả Chi Tiết</th>
                            <th class="text-center">Loại Bài Viết</th>
                            <th class="text-center">Trạng Thái</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(v, k) in listTinTuc">
                            <tr>
                                <th class="text-center align-middle">@{{ k + 1 }}</th>
                                <td class="align-middle">@{{ v.tieu_de }}</td>
                                <td class="align-middle">
                                    <img v-bind:src="v.hinh_anh" class="img-fluid" style="max-width: 100px;">
                                </td>
                                <td class="align-middle">@{{ v.mo_ta_ngan }}</td>
                                <td class="text-center align-middle">
                                    <button v-on:click="modal = v, hienMoTa()"  data-bs-toggle="modal" data-bs-target="#moTaChiTiet" class="btn btn-primary"><i style="padding-left: 6px" class="fa-sharp fa-solid fa-info"></i></button>
                                </td>
                                <td class="align-middle text-center text-nowrap">
                                    <p  v-if="v.loai_bai_viet == 1" >Tin Hot</p>
                                    <p  v-else-if="v.loai_bai_viet == 2">Tin Thời Trang</p>
                                    <p  v-else>Thông Báo</p>
                                </td>
                                <td class="align-middle text-center text-nowrap">
                                    <button v-on:click="changeStatus(v.id)" class="btn btn-primary" v-if="v.trang_thai == 1">Hiển Thị</button>
                                    <button v-on:click="changeStatus(v.id)" class="btn btn-danger" v-else>Tạm Tắt</button>
                                </td>
                                <td class="text-center align-middle text-nowrap">
                                    <button v-on:click="showUpdate(v)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal">Cập Nhật</button>
                                    <button v-on:click="xoaTT = v" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa Bỏ</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
                <div class="modal fade" id="moTaChiTiet" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Mô Tả Chi Tiết</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <span id="hienMoTa"></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Xóa Tin Tức</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn xóa tin này!
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button v-on:click="xoaTinTuc()" type="button" class="btn btn-danger" data-bs-dismiss="modal">Xóa Tin</button>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Tin Tức</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <input v-model="update_tin.id" type="hidden" name="" id="">
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input v-model="update_tin.tieu_de" v-on:keyup="chuyenDoiSlugEdit()" class="form-control mt-1" type="text">
                            </div>
                            <div class="form-group">
                                <label>Slug Bài Viêt</label>
                                <input v-model="update_tin.slug_bai_viet"  class="form-control mt-1" type="text">
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <div class="input-group">
                                    <input name="hinh_anh_update" id="hinh_anh_update" class="form-control" type="text" name="filepath">
                                    <span class="input-group-prepend">
                                        <a id="lfm_update" data-input="hinh_anh_update" data-preview="holder_update" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                </div>
                                <div id="holder_update" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                            <div class="form-group mt-4">
                                <label>Mô Tả Ngắn</label>
                                <textarea v-model="update_tin.mo_ta_ngan" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mổ Tả Chi Tiết</label>
                                <input name="update_mo_ta_chi_tiet" id="update_mo_ta_chi_tiet" class="form-control mt-1" type="text">
                            </div>
                            <div class="form-group">
                                <label>Loại Bài Viêt</label>
                                <select  v-model="update_tin.loai_bai_viet" class="form-control">
                                    <option value="1">Tin Hot</option>
                                    <option value="2">Tin Thời Trang</option>
                                    <option value="3">Thông Báo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tình Trạng</label>
                                <select  v-model="update_tin.trang_thai" class="form-control">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Tạm Tắt</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button v-on:click="capNhatTinTuc()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập Nhật</button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el      :   '#app',
        data    :   {
            listTinTuc      : [],
            xoaTT           : {},
            update_tin      : {},
            modal           : {},
            slug            : '',
            ten_tin_tuc     : '',
        },
        created()   {
            this.loadTinTuc();
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
                paramObj['mo_ta_chi_tiet'] = CKEDITOR.instances['mo_ta_chi_tiet'].getData();

                axios
                    .post('/admin/tin-tuc/create', paramObj)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message);
                            this.loadTinTuc();
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
            loadTinTuc() {
                axios
                    .get('/admin/tin-tuc/data')
                    .then((res) => {
                        this.listTinTuc = res.data.data;
                    });
            },
            xoaTinTuc() {
                axios
                    .post('/admin/tin-tuc/delete' , this.xoaTT)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success('Đã xóa tin tức thành công!');
                            this.loadTinTuc();
                        } else {
                            toastr.error('Có lỗi không mong muốn!');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
            showUpdate(v) {
                this.update_tin = v;
                CKEDITOR.instances['update_mo_ta_chi_tiet'].setData(v.mo_ta_chi_tiet);
                $("#hinh_anh_update").val(v.hinh_anh);
                var text = '<img src="'+ v.hinh_anh + '" style="margin-top:15px;max-height:100px;">'
                $("#holder_update").html(text);
            },
            capNhatTinTuc() {
                this.update_tin.mo_ta_chi_tiet = CKEDITOR.instances['update_mo_ta_chi_tiet'].getData();
                this.update_tin.slug_bai_biet = this.slug_edit;
                this.update_tin.hinh_anh = $("#hinh_anh_update").val();
                axios
                    .post('/admin/tin-tuc/update' , this.update_tin)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success('Đã cập nhật thành công!');
                            this.loadTinTuc();
                        } else {
                            toastr.error('Có lỗi không mong muốn!');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
            changeStatus(id) {
                axios
                    .get('/admin/tin-tuc/change-status/' + id)
                    .then((res) => {
                        this.loadTinTuc();
                        toastr.success('Đã đổi trạng thái thành công!');
                    });
            },
            toSlug(str) {
                // Chuyển hết sang chữ thường
                str = str.toLowerCase();

                // xóa dấu
                str = str
                    .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
                    .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp

                // Thay ký tự đĐ
                str = str.replace(/[đĐ]/g, 'd');

                // Xóa ký tự đặc biệt
                str = str.replace(/([^0-9a-z-\s])/g, '');

                // Xóa khoảng trắng thay bằng ký tự -
                str = str.replace(/(\s+)/g, '-');

                // Xóa ký tự - liên tiếp
                str = str.replace(/-+/g, '-');

                // xóa phần dư - ở đầu & cuối
                str = str.replace(/^-+|-+$/g, '');

                // return
                return str;
            },
            chuyenDoiSlug(){
                this.slug = this.toSlug(this.ten_tin_tuc);
            },
            chuyenDoiSlugEdit(){
                this.update_tin.slug_bai_viet = this.toSlug(this.update_tin.tieu_de);
            },
            hienMoTa(){
                $('#hienMoTa').html(this.modal.mo_ta_chi_tiet);
            },
        },
    });
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.1/ckeditor.js"></script>
<script>
    CKEDITOR.replace('mo_ta_chi_tiet');
    CKEDITOR.replace('update_mo_ta_chi_tiet');
</script>
<script>
    var route_prefix = "/laravel-filemanager";
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $("#lfm").filemanager('image', {prefix : route_prefix});
    $("#lfm_update").filemanager('image', {prefix : route_prefix});
</script>
@endsection
