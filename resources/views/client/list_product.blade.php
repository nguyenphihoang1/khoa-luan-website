@extends('client.master')
@section('noi_dung')
<div class="container">
    <div class="row">
        <!-- product area start -->
        <div class="col-lg-12 col-md-12 col-12">
            <div class="filter-sort-wrapper d-flex justify-content-between flex-wrap">
                <div class="collection-title-wrap d-flex align-items-end" style="margin-top: 15px">
                    @if (isset($chuyenMuc))
                    <h2 class="collection-title heading_24 mb-0">{{ $chuyenMuc->ten_chuyen_muc}}</h2>
                    <p class="collection-counter text_16 mb-0 ms-2">({{ count($data) }} items)</p>
                    @endif
                </div>

            </div>
            <div class="collection-product-container">
                <div class="row">
                    @foreach ($data as $key => $value )
                    <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                        <div class="product-card">
                            <div class="product-card-img">
                                <a class="hover-switch" href="/product/{{$value->slug_san_pham}}-post{{$value->id}}">
                                    <img style="height: 360px; width: 100%;" class="secondary-img" src="{{ explode(",",$value->hinh_anh)[0] }}"
                                        alt="product-img">
                                    <img style="height: 360px; width: 100%;" class="primary-img" src="{{ explode(",",$value->hinh_anh)[0] }}"
                                        alt="product-img">
                                </a>
                                @php
                                    $arr    = ['Sale', 'Hot', 'New', ''];
                                    $random = random_int(0, 7);
                                @endphp
                                <div class="product-badge">
                                    @if($random < 3)
                                    <span class="badge-label badge-new rounded">{{ $arr[$random] }}</span>
                                    @endif
                                    @if($value->gia_khuyen_mai > 0)
                                    <span class="badge-label badge-percentage rounded">-{{ number_format(($value->gia_ban - $value->gia_khuyen_mai) / $value->gia_ban * 100, 0, '.', ',') }}%</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-card-details">
                                <h3 class="product-card-title">
                                    <a href="/product/{{$value->slug_san_pham}}-post{{$value->id}}">{{ $value->ten_san_pham }}</a>
                                </h3>
                                <div class="product-card-price">
                                    @if($value->gia_khuyen_mai > 0)
                                    <span class="card-price-regular">{{ number_format($value->gia_khuyen_mai, 0, '.', ',') }} đ</span>
                                    <span class="card-price-compare text-decoration-line-through">{{ number_format($value->gia_ban, 0, '.', ',') }} đ</span>
                                    @else
                                    <span class="card-price-regular">{{ number_format($value->gia_ban, 0, '.', ',') }} đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            {{-- <div class="pagination justify-content-center mt-100">
                <nav>
                    <ul class="pagination m-0 d-flex align-items-center">
                        <li class="item disabled">
                            <a class="link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-left">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </a>
                        </li>
                        <li class="item"><a class="link" href="#">1</a></li>
                        <li class="item active"><a class="link" href="#">2</a></li>
                        <li class="item"><a class="link" href="#">3</a></li>
                        <li class="item"><a class="link" href="#">4</a></li>
                        <li class="item">
                            <a class="link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> --}}
        </div>
        <!-- product area end -->

        <!-- sidebar start -->
        <div class="col-lg-3 col-md-12 col-12">
            <div class="collection-filter filter-drawer">
                <div class="filter-widget d-lg-none d-flex align-items-center justify-content-between">
                    <h5 class="heading_24">Sorting By</h4>
                    <button type="button" class="btn-close text-reset filter-drawer-trigger d-lg-none"></button>
                </div>

                <div class="filter-widget d-lg-none">
                    <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                        data-bs-toggle="collapse" data-bs-target="#filter-mobile-sort">
                        <span>
                            <span class="sorting-title me-2">Sort by:</span>
                            <span class="active-sorting">Featured</span>
                        </span>
                        <span class="faq-heading-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div id="filter-mobile-sort" class="accordion-collapse collapse show">
                        <ul class="sorting-lists-mobile list-unstyled m-0">
                            <li><a href="#" class="text_14">Featured</a></li>
                            <li><a href="#" class="text_14">Best Selling</a></li>
                            <li><a href="#" class="text_14">Alphabetically, A-Z</a></li>
                            <li><a href="#" class="text_14">Alphabetically, Z-A</a></li>
                            <li><a href="#" class="text_14">Price, low to high</a></li>
                            <li><a href="#" class="text_14">Price, high to low</a></li>
                            <li><a href="#" class="text_14">Date, old to new</a></li>
                            <li><a href="#" class="text_14">Date, new to old</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar end -->
     </div>
</div>
@endsection
