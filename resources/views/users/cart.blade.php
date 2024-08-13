@extends('users.layouts.default')

@section('content')
<div class="mb-n10 mb-10 z-index-2">
    <div class="container mb-10">
        <div class="text-center mb-17">
            <h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works"
                data-kt-scroll-offset="{default: 100, lg: 150}">Giỏ hàng</h3>

        </div>
        <div class="row w-100 gy-10 mb-md-20">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Hành động <a href="{{route('client.home')}}">Mua tiếp</a></th>
                    </tr>
                </thead>
                @if(count($cart->cartDetails) != 0)
                    <form action="{{ route('client.updateCart') }}" method="post">
                        @method('patch')
                        @csrf
                        <tbody>
                            @php
                                $tongTien = 0;
                            @endphp
                            @foreach($cart->cartDetails as $key => $cartDetail)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $cartDetail->product->name }}</td>
                                    <td>{{ $cartDetail->product->category->name }}</td>
                                    <td>{{ number_format( $cartDetail->product->price) }} VNĐ</td>
                                    <td>
                                        <input type="hidden" value="{{ $cartDetail->id }}" name="cartDetailId[]">
                                        <input type="number" value="{{ $cartDetail->quantity }}" name="quantity[]">
                                    </td>
                                    <td>
                                        @php
                                            $thanhtien = intval($cartDetail->product->price) * intval($cartDetail->quantity );
                                            $tongTien += $thanhtien;

                                            echo number_format($thanhtien) . " VNĐ";
                                        @endphp
                                    </td>
                                    <td>
                                        <a href="{{route('client.deleteCart',$cartDetail->id)}}">
                                        <button type="button" class="btn btn-danger" >Xóa</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"></td>
                                <td>
                                    <p>
                                        Tổng tiền:
                                        {{ number_format($tongTien) }} VNĐ
                                    </p>
                                </td>
                                <td>
                                    <button class="btn btn-warning">Cập nhật</button>
                                </td>
                            </tr>
                        </tbody>
                    </form>
                @else
                    <tbody>
                        <tr>
                            <td colspan="6">Bạn chưa có sản phẩm trong giỏ hàng</td>
                            <td>
                                <a href="{{ route('client.home') }}" class="btn btn-success">Tiếp tục mua hàng</a>
                            </td>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div>
    </div>
</div>




@endsection


@push('scripts')

@endpush