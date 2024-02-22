@php
$data = \App\Models\Config::orderByDESC('id')->first();
@endphp
<div class="banner-section mt-100 overflow-hidden">
    <div class="banner-section-inner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12" data-aos="fade-right" data-aos-duration="1200">
                    <a class="banner-item position-relative rounded" href="collection-left-sidebar.html">
                        <img class="banner-img" src="{{$data->image_slide_1}}" alt="banner-1">
                        <div class="content-absolute content-slide">
                            <div class="container height-inherit d-flex align-items-center">
                                <div class="content-box banner-content p-4">
                                    <p class="heading_18 mb-3 text-white">{{$data->title_slide_1}}</p>
                                    <h2 class="heading_34 text-white">{{$data->des_slide_1}}</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-12" data-aos="fade-left" data-aos-duration="1200">
                    <a class="banner-item position-relative rounded" href="collection-left-sidebar.html">
                        <img class="banner-img" src="{{$data->image_slide_2}}" alt="banner-2">
                        <div class="content-absolute content-slide">
                            <div class="container height-inherit d-flex align-items-center">
                                <div class="content-box banner-content p-4">
                                    <p class="heading_18 mb-3 text-white">{{$data->title_slide_2}}</p>
                                    <h2 class="heading_34 text-white">{{$data->des_slide_2}}</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
