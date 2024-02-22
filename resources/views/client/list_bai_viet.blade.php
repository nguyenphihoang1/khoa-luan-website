@extends('client.master')
@section('noi_dung')
<div class="container">
    <div class="row">
        @foreach ($data as $key => $value )
        <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-duration="700">
            <div class="article-card bg-transparent p-0 shadow-none">
                <a class="article-card-img-wrapper" href="/bai-viet/{{$value->slug_bai_viet}}-post{{$value->id}}">
                    <img src="{{$value->hinh_anh}}" alt="img"
                        class="article-card-img rounded">

                    {{-- <span class="article-tag article-tag-absolute rounded">Decor</span> --}}
                </a>
                <p class="article-card-published text_12 d-flex align-items-center">
                    <span class="article-date d-flex align-items-center">
                        <span class="icon-publish">
                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                    fill="#00234D" />
                            </svg>
                        </span>
                        <span class="ms-2">{{ \Carbon\Carbon::parse($value->created_at)->toFormattedDayDateString() }}</span>
                    </span>
                    <span class="article-author d-flex align-items-center ms-4">
                        <span class="icon-author"><svg width="15" height="17"
                                viewBox="0 0 15 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.5 0.59375C4.72888 0.59375 2.46875 2.85388 2.46875 5.625C2.46875 7.3573 3.35315 8.89587 4.69238 9.80274C2.12903 10.9033 0.3125 13.447 0.3125 16.4063H1.75C1.75 13.2224 4.31616 10.6563 7.5 10.6563C10.6838 10.6563 13.25 13.2224 13.25 16.4063H14.6875C14.6875 13.447 12.871 10.9033 10.3076 9.80274C11.6469 8.89587 12.5313 7.3573 12.5313 5.625C12.5313 2.85388 10.2711 0.59375 7.5 0.59375ZM7.5 2.03125C9.49341 2.03125 11.0938 3.63159 11.0938 5.625C11.0938 7.61841 9.49341 9.21875 7.5 9.21875C5.50659 9.21875 3.90625 7.61841 3.90625 5.625C3.90625 3.63159 5.50659 2.03125 7.5 2.03125Z"
                                    fill="#00234D" />
                            </svg>
                        </span>
                        <span class="ms-2">Admin</span>
                    </span>
                </p>
                <h2 class="article-card-heading heading_18">
                    <a class="heading_18" href="/bai-viet/{{$value->slug_bai_viet}}-post{{$value->id}}">
                        {{$value->tieu_de}}
                    </a>
                </h2>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
