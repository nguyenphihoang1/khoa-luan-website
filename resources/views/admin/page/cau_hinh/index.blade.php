@extends('admin.share.master_page')
@section('noi_dung')
    <div class="row" id="app">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    Cấu Hình Hệ Thống
                </div>
                <form id="formdata" v-on:submit.prevent="create()">
                    <div class="card-body">
                        <label>Danh Sách Hình Ảnh</label>
                        <div class="input-group">
                            <input name="hinh_anh" v-model="data.list_image" id="hinh_anh" class="form-control"
                                type="text" name="filepath">
                            <span class="input-group-prepend">
                                <a v-on:click="is_show = 0" id="lfm" data-input="hinh_anh" data-preview="holder"
                                    class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                                <button type="button" v-if="is_show == 0" class="btn btn-info"
                                    v-on:click="process()">Info</button>
                            </span>
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;">
                            <div class="row">
                                <template v-for="(value, key) in cal()">
                                    <div class="col-md-3">
                                        <img v-bind:src="value" style="height: 5rem;">
                                    </div>
                                </template>
                            </div>

                        </div>
                        <template v-if="is_show == 1 && so_hinh > 0">
                            <label class="form-label mt-2"><b>Danh Sách Tiêu Đề</b></label>
                            <template v-for="key in so_hinh">
                                <input class="form-control mt-1" v-bind:name="'title_' + key"
                                    v-bind:value="showData(data.list_title,key)">
                            </template>

                            <label class="form-label mt-2"><b>Danh Sách Mô Tả</b></label>
                            <template v-for="key in so_hinh">
                                <input class="form-control mt-1" v-bind:name="'des_' + key"
                                    v-bind:value="showData(data.list_des,key)">
                            </template>

                            <label class="form-label mt-2"><b>Danh Sách Link</b></label>
                            <template v-for="key in so_hinh">
                                <input class="form-control mt-1" v-bind:name="'link_' + key"
                                    v-bind:value="showData(data.list_link,key)">
                            </template>
                        </template>
                        <div class="mb-3 mt-2">
                            <label class="form-label"><b>Ảnh Slide 1</b></label>
                            <div class="input-group">
                                <input name="image_slide_1" v-bind:value="data.image_slide_1" id="image_slide_1"  class="form-control" type="text" >
                                <span class="input-group-prepend">
                                    <a id="lfm_slide1" data-input="image_slide_1" data-preview="holder_1" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                            </div>
                            <div id="holder_1" style="margin-top:15px;max-height:100px;">
                                <img v-bind:src="data.image_slide_1" style="height: 5rem;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Tiêu Đề Slide 1</b></label>
                            <input name="title_slide_1"  type="text" class="form-control" v-bind:value="data.title_slide_1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Mô Tả Slide 1</b></label>
                            <input name="des_slide_1"  type="text" class="form-control" v-bind:value="data.des_slide_1">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Ảnh Slide 2</b></label>
                            <div class="input-group">
                                <input name="image_slide_2" v-bind:value="data.image_slide_2" id="image_slide_2" class="form-control" type="text" >
                                <span class="input-group-prepend">
                                    <a id="lfm_slide2" data-input="image_slide_2" data-preview="holder_2" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                            </div>
                            <div id="holder_2" style="margin-top:15px;max-height:100px;">
                                <img v-bind:src="data.image_slide_2" style="height: 5rem;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Tiêu Đề Slide 2</b></label>
                            <input  name="title_slide_2"  type="text" class="form-control" v-bind:value="data.title_slide_2">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Mô Tả Slide 2</b></label>
                            <input name="des_slide_2"  type="text" class="form-control" v-bind:value="data.des_slide_2">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button v-if="is_show == 1" type="submit" class="btn btn-primary">Thêm Mới</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-7">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>BEST SALE</h3>
                        </div>
                        <div class="card-body">
                            <form id="formBestSale">
                                <template v-for="(value, key) in dataChuyenMuc">
                                    <template v-if="value.id_chuyen_muc_cha == 0 && value.tinh_trang == 1">
                                        <div class="accordion">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    v-bind:data-bs-target="'#collapseOneee' + key" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        @{{ value.ten_chuyen_muc }}
                                                    </button>
                                                </h2>
                                                <div v-bind:id="'collapseOneee' + key" class="accordion-collapse collapse "
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="accordion">
                                                            <div class="accordion-item">
                                                                <template v-for="(v, k) in dataChuyenMuc">
                                                                    <template
                                                                        v-if="v.id_chuyen_muc_cha > 0 && v.tinh_trang == 1 && value.id == v.id_chuyen_muc_cha">
                                                                        <h2 class="accordion-header" id="headingOne">
                                                                            <button class="accordion-button" type="button"
                                                                                data-bs-toggle="collapse"
                                                                                v-bind:data-bs-target="'#collapseOne'+ k"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseOne">
                                                                                @{{ v.ten_chuyen_muc }}
                                                                            </button>
                                                                        </h2>
                                                                        <div v-bind:id="'collapseOne'+ k"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="headingOne"
                                                                            data-bs-parent="#accordionExample">
                                                                            <div class="accordion-body">
                                                                                <template v-for="(v1, k1) in dataSanPham">
                                                                                    <template v-if="v1.id_chuyen_muc == v.id">
                                                                                        <template v-if="showCheckedBS(v1.id) == true">
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    v-bind:name="'best_sale_' + k1"
                                                                                                    v-bind:value="v1.id" checked>
                                                                                                <label class="form-check-label">
                                                                                                    @{{ v1.ten_san_pham }}
                                                                                                </label>
                                                                                            </div>
                                                                                        </template>
                                                                                        <template v-else>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    v-bind:name="'best_sale_' + k1"
                                                                                                    v-bind:value="v1.id">
                                                                                                <label class="form-check-label">
                                                                                                    @{{ v1.ten_san_pham }}
                                                                                                </label>
                                                                                            </div>
                                                                                        </template>
                                                                                    </template>
                                                                                </template>
                                                                            </div>
                                                                        </div>
                                                                    </template>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </template>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>SALE</h3>
                        </div>
                        <div class="card-body">
                            <form id="formSale">
                                <template v-for="(value, key) in dataChuyenMuc">
                                    <template v-if="value.id_chuyen_muc_cha == 0 && value.tinh_trang == 1">
                                        <div class="accordion">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        v-bind:data-bs-target="'#collapseOns'+ key" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        @{{ value.ten_chuyen_muc }}
                                                    </button>
                                                </h2>
                                                <div v-bind:id="'collapseOns'+ key" class="accordion-collapse collapse "
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="accordion">
                                                            <div class="accordion-item">
                                                                <template v-for="(v, k) in dataChuyenMuc">
                                                                    <template
                                                                        v-if="v.id_chuyen_muc_cha > 0 && v.tinh_trang == 1 && value.id == v.id_chuyen_muc_cha">
                                                                        <h2 class="accordion-header" id="headingOne">
                                                                            <button class="accordion-button" type="button"
                                                                                data-bs-toggle="collapse"
                                                                                v-bind:data-bs-target="'#collapseOnesss'+ k"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseOne">
                                                                                @{{ v.ten_chuyen_muc }}
                                                                            </button>
                                                                        </h2>
                                                                        <div v-bind:id="'collapseOnesss'+ k"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="headingOne"
                                                                            data-bs-parent="#accordionExample">
                                                                            <div class="accordion-body">
                                                                                <template v-for="(v1, k1) in dataSanPham">
                                                                                    <template v-if="v1.id_chuyen_muc == v.id">
                                                                                        <template v-if="showCheckedS(v1.id) == true">
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    v-bind:name="'sale_' + k1"
                                                                                                    v-bind:value="v1.id" checked>
                                                                                                <label class="form-check-label">
                                                                                                    @{{ v1.ten_san_pham }}
                                                                                                </label>
                                                                                            </div>
                                                                                        </template>
                                                                                        <template v-else>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    v-bind:name="'sale_' + k1"
                                                                                                    v-bind:value="v1.id">
                                                                                                <label class="form-check-label">
                                                                                                    @{{ v1.ten_san_pham }}
                                                                                                </label>
                                                                                            </div>
                                                                                        </template>
                                                                                    </template>
                                                                                </template>
                                                                            </div>
                                                                        </div>
                                                                    </template>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </template>
                            </form>
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
            el: '#app',
            data: {
                data            : {},
                add             : {},
                so_hinh         : 0,
                is_show         : 1,
                dataChuyenMuc   : [],
                dataSanPham     : [],
                list_best_sale  : [],
                list_sale       : [],
            },
            created() {
                this.loadData();
                this.process();
                this.loadChuyenMuc();
                this.loadSanPham();
            },
            methods: {
                cal() {
                    var x = this.data.list_image?.split(',');
                    this.so_hinh = x?.length;
                    return x;
                },
                slide1() {
                    var x = this.data.image_slide_1?.split(',');
                    this.so_hinh = x?.length;
                    return x;
                },
                slide2() {
                    var x = this.data.image_slide_2?.split(',');
                    this.so_hinh = x?.length;
                    return x;
                },
                showData(v, index) {
                    var x = v?.length > 0 ? v?.split('|') : null;
                    index = index - 1;
                    if (Array.isArray(x) == false || x == null || typeof x[1] === 'undefined') {
                        // console.log('No data!');
                        return '';
                    } else {
                        // console.log(x[index]);
                        return x[index];
                    }
                },
                showCheckedBS(id){
                    var array = this.list_best_sale;
                    if(array === 'undefined' || array == '' || array == null) {
                        return false;
                    } else {
                        var x = array.includes(id);
                        return x;
                    }
                },
                showCheckedS(id){
                    var array = this.list_sale;
                    if(array === 'undefined' || array == '' || array == null) {
                        return false;
                    } else {
                        var x = array.includes(id);
                        return x;
                    }
                },
                process() {
                    this.is_show = 1;
                    this.data.list_image = $("#hinh_anh").val();
                },
                loadData() {
                    axios
                        .get('/admin/cau-hinh/data')
                        .then((res) => {
                            this.data = res.data.data;
                            this.data = res.data.data;
                            this.list_best_sale = this.data.list_bestsale?.split(',').map(Number);
                            this.list_sale = this.data.list_sale?.split(',').map(Number);
                        });
                },
                create() {
                    var paramObj = {};
                    $.each($('#formdata').serializeArray(), function(_, kv) {
                        if (paramObj.hasOwnProperty(kv.name)) {
                            paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                            paramObj[kv.name].push(kv.value);
                        } else {
                            paramObj[kv.name] = kv.value;
                        }
                    });
                    this.add = paramObj;
                    this.add.listBS = this.bestSale();
                    this.add.listS = this.sale();

                    axios
                        .post('/admin/cau-hinh/create', this.add)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
                                this.loadData();
                            } else {
                                toastr.error(res.data.mess);
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },

                bestSale(){
                    var paramObjBS = {};
                    $.each($('#formBestSale').serializeArray(), function(_, kv) {
                        if (paramObjBS.hasOwnProperty(kv.name)) {
                            paramObjBS[kv.name] = $.makeArray(paramObjBS[kv.name]);
                            paramObjBS[kv.name].push(kv.value);
                        } else {
                            paramObjBS[kv.name] = kv.value;
                        }
                    });
                    return paramObjBS;
                },

                sale(){
                    var paramObjS = {};
                    $.each($('#formSale').serializeArray(), function(_, kv) {
                        if (paramObjS.hasOwnProperty(kv.name)) {
                            paramObjS[kv.name] = $.makeArray(paramObjS[kv.name]);
                            paramObjS[kv.name].push(kv.value);
                        } else {
                            paramObjS[kv.name] = kv.value;
                        }
                    });
                    return paramObjS;
                },

                loadChuyenMuc() {
                    axios
                        .get('/admin/cau-hinh/getChuyenMuc')
                        .then((res) => {
                            this.dataChuyenMuc = res.data.data;
                        });
                },
                loadSanPham() {
                    axios
                        .get('/admin/cau-hinh/getSanPham')
                        .then((res) => {
                            this.dataSanPham = res.data.data;
                        });
                },


            },
        });
    </script>
    <script>
        var route_prefix = "/laravel-filemanager";
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $("#lfm").filemanager('image', {
            prefix: route_prefix
        });
        $("#lfm_slide1").filemanager('image', {
            prefix: route_prefix
        });
        $("#lfm_slide2").filemanager('image', {
            prefix: route_prefix
        });
    </script>
@endsection
