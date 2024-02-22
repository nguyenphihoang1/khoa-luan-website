<!-- slideshow start -->
<div class="slideshow-section position-relative">
    <div class="slideshow-active activate-slider"
        data-slick='{
        "slidesToShow": 1,
        "slidesToScroll": 1,
        "dots": true,
        "arrows": true,
        "responsive": [
            {
            "breakpoint": 768,
            "settings": {
                "arrows": false
            }
            }
        ]
    }'>
    @php
        $data = \App\Models\Config::orderByDESC('id')->first();
        $list_image = explode(',', $data->list_image);
        $list_title = explode('|', $data->list_title);
        $list_des = explode('|', $data->list_des);
        $list_link = explode('|', $data->list_link);
    @endphp
        @for($i = 0; $i < count($list_image); $i++)
        <div class="slide-item slide-item-bag position-relative">
            <img class="slide-img d-none d-md-block" src="{{$list_image[$i]}}" alt="slide-1">
            <img class="slide-img d-md-none" src="{{$list_image[$i]}}" alt="slide-1">
            <div class="content-absolute content-slide">
                <div class="container height-inherit d-flex align-items-center">
                    <div class="content-box slide-content py-4">
                        <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                            data-animation="animate__animated animate__fadeInUp">
                            {{ isset($list_title[$i]) ? $list_title[$i] : '' }}
                        </h2>
                        <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                            data-animation="animate__animated animate__fadeInUp">
                            {{ isset($list_des[$i]) ? $list_des[$i] : '' }}
                        </p>
                        @if(isset($list_link[$i]))
                        <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                            href="{{$list_link[$i]}}"
                            data-animation="animate__animated animate__fadeInUp">SHOP NOW</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
    <div class="activate-arrows"></div>
    <div class="activate-dots dot-tools"></div>
</div>
<!-- slideshow end -->
