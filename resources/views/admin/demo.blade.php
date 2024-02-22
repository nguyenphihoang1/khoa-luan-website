@extends('admin.share.master_page')
@section('noi_dung')
<div id="app">
    <input type="text" class="form-control" v-model="name">
    <label>Chào bạn: <b>@{{ name }}</b></label>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el      :   '#app',
        data    :   {
            name : '',
        },
        created()   {

        },
        methods :   {

        },
    });
</script>
@endsection
