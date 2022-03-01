@extends('front.layout.index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <form class="bg0 p-t-75 p-b-85" action="{{url('carts/update')}}" method="POST">
                    @csrf
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1"></th>
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                                @forelse(carts() as $index => $item)
                                    <tr class="table_row">
                                        <td align="center">
                                            <a class="btn btn-danger btn-sm"
                                               href="{{route('front.carts.destroy',$index)}}">حذف</a>
                                        </td>
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="{{asset('storage/'.$item->product->main_image)}}" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2">
                                            {{\App\Models\Product::query()->find($item->product->id)->title}}<br>
                                            <span
                                                class="font-weight-bold text-primary">{{$item->size ?? "لم يحدد المقاس"}}</span><br>
                                            <span
                                                class="font-weight-bold text-success">{{$item->color ?? "لم يحدد اللون"}}</span>
                                        </td>
                                        <td class="column-3">L.E {{$item->product->price}}</td>
                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                       name="quantity[{{$index}}]" value="{{$item->quantity}}">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="column-5">L.E {{$item->product->price * $item->quantity}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="1000">
                                            <h4 class="w-100 text-center p-2">لا يوجد بيانات</h4>

                                        </td>
                                    </tr>
                                @endforelse

                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">

                            <button
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Update Cart
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <form id="checkout-form" action="{{url('checkout')}}" method="post">
                    @csrf
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                            </div>

                            <div class="size-209">
                            <span class="mtext-110 cl2">
                                L.E {{cartsTotal()}}
                            </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    There are no shipping methods available. Please double check your address, or
                                    contact us if you need any help.
                                </p>

                                <div class="p-t-15">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_name"
                                               placeholder=" full name">
                                    </div>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email"
                                               placeholder="email">
                                    </div>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone"
                                               placeholder="phone">
                                    </div>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_address[]"
                                               placeholder=" country">
                                    </div>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_address[]"
                                               placeholder="State">
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_address[]"
                                               placeholder="city and postal-code">
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                            </div>

                            <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                L.E {{cartsTotal()}}
                            </span>
                            </div>
                        </div>

                        <button
                            class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" form="checkout-form">
                            Checkout
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
