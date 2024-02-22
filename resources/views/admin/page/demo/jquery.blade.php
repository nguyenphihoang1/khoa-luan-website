@extends('admin.share.master_page')
@section('noi_dung')
<div class="row">
    <div class="col-md-5">
        <div class="alert alert-primary" role="alert">
            <span id="thongbao">
                A simple primary alert—check it out!
            </span>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-3">
            <button id="dauTru" class="btn btn-danger">-</button>
            <input id="giaTri" type="text" class="form-control text-center" value="0">
            <button id="dauCong" class="btn btn-primary">+</button>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        loadData();

        function loadData() {
            axios
                .get('/demo-data')
                .then((res) => {
                    $("#thongbao").text(res.data.message);
                    $("#giaTri").val(res.data.gia_tri);
                });
        }

        $("#dauCong").click(function() {
            var giaTri = $("#giaTri").val();
            giaTri = giaTri * 1 + 1;
            $("#giaTri").val(giaTri);
        });

        $("#dauTru").click(function() {
            var giaTri = $("#giaTri").val();
            giaTri = giaTri * 1 - 1;
            $("#giaTri").val(giaTri);
        });
    });
</script>
@endsection
