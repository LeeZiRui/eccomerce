<section class="section-slide">
    <div class="wrap-slick1 rs2-slick1">
        <div class="slick1">
            @foreach(\App\Models\Slider::all() as $index => $item)
            <div class="item-slick1 bg-overlay1" style="background-image: url({{asset('storage/'.$item->image)}});" data-thumb="{{asset('storage/'.$item->image)}}" data-caption="Women’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									{{$item->small_title}}
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                {{$item->big_title}}
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="#" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                {{__('front.Shop Now')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="wrap-slick1-dots p-lr-10"></div>
    </div>
</section>
