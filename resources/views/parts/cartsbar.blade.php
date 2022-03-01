<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                @forelse(carts() as $index => $item)
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <a class="btn btn-danger btn-sm" href="{{route('front.carts.destroy',$index)}}">حذف</a>
                    <div class="header-cart-item-img">

                        <img src="{{asset('storage/'.$item->product->main_image)}}" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            {{\App\Models\Product::query()->find($item->product->id)->title}}
                        </a>

                        <span class="header-cart-item-info">
								{{$item->quantity}} x {{$item->product->price}} L.E
							</span>
                    </div>
                </li>
                @empty
                    <h3>لا يوجد</h3>
                @endforelse
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: L.E {{carts()->sum(function ($item){
                                        return $item->quantity * $item->product->price;
                                    })}}
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{route('front.carts.index')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
