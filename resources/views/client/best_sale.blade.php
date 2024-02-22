<!-- featured collection start -->
<div class="featured-collection-section mt-100 home-section overflow-hidden">
    <div class="container">
        <div class="section-header text-center">
            <p class="section-subheading">WHAT'S NEW</p>
            <h2 class="section-heading">SẢN PHẨM BÁN CHẠY NHẤT</h2>
        </div>

        <div class="product-container position-relative">
            <div class="common-slider" data-slick='{
            "slidesToShow": 4,
            "slidesToScroll": 1,
            "dots": false,
            "arrows": true,
            "responsive": [
              {
                "breakpoint": 1281,
                "settings": {
                  "slidesToShow": 3
                }
              },
              {
                "breakpoint": 768,
                "settings": {
                  "slidesToShow": 2
                }
              }
            ]
        }'>
            @php
                $config = \App\Models\Config::orderByDESC('id')->first();
                $bestsale = explode(",",$config->list_bestsale);
                $data = \App\Models\SanPham::whereIn('id', $bestsale)->get();
            @endphp
            @foreach ($data as $key => $value)
            <div class="new-item" data-aos="fade-up" data-aos-duration="700">
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
            <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
        </div>
    </div>
</div>
<!-- featured collection end -->
