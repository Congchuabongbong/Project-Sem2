<div id='fetchData' style="display: inline-block;">
    <div class="row">
        @if (count($mobiles) > 0)
        <ul class="product-list grid-products equal-container">
            @foreach ($mobiles as $mobile)
            @php
            $price = number_format($mobile -> price, 0, '', ',');
            $price_current = number_format($mobile -> price - ($mobile -> price * $mobile -> saleOff), 0, '', ',');
            @endphp
            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="product product-style-3 equal-elem">
                    <div class="product-thumnail">
                        <a href="{{route('mobile_client.show', $mobile -> id)}}" title="{{$mobile -> name}}">
                            <figure><img src="{{$mobile -> mainThumbnail}}" alt="{{$mobile -> name}}">
                            </figure>
                        </a>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{$mobile -> name}}</span><br></a>                                               
                        @if ($mobile -> saleOff > 0 && $mobile->status != -1 && $mobile -> status != -0 )                        
                        <strong class="discount">Giảm: {{$mobile -> saleOff * 100}}%</strong>
                        <div class="wrap-price"><span class="product-price">{{$price}} (VND)</span> </div>
                        @else
                        <strong>{{strtoupper($mobile -> strStatus)}}</strong>
                        <div class="wrap-price"><span class="product-price">{{$price}} (VND)</span> </div>
                        @endif
                        <form id="formCart">
                            @csrf
                            <input type="hidden" value="{{$mobile -> id}}" name="id" />
                            <input type="hidden" value="{{$mobile -> price - ($mobile -> price * $mobile -> saleOff)}}"
                                name="price" />
                            <input type="hidden" value="{{$mobile -> name}}" name="name">
                            <input type="hidden" value="{{$mobile -> mainThumbnail}}" name="image">
                            <input type="hidden" value="{{$mobile -> saleOff}}" name="saleOff">
                            <input type="hidden" value="{{$mobile -> quantity}}" name="current_quantity">
                            <input type="hidden" value="1" name="quantity">
                            <a href="#" class="btn add-to-cart" id="btnAddToCart">Thêm vào giỏ hàng</a>
                        </form>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <div class="card fplistbox" style="margin-top: 30px">
            <div class="card-body p-0 p-t-15 p-b-30">
                <div class="fs-senull" style="text-align: center; padding-bottom: 30px;">
                    <p class="fs-senull-l1"><img src="/client-assets/assets/images/noti-search.png"></p>
                    <p class="fs-senull-l2">Rất tiếc chúng tôi không tìm thấy kết quả theo yêu cầu của bạn</p>
                    <p class="fs-senull-l3">Vui lòng thử lại .</p>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="wrap-pagination-info" id="pagination">
            @php
            $link_limit = 7;
            @endphp
            @if ($mobiles->lastPage() > 1)
            <ul class="page-numbers">
                <li class="page-number-item  {{($mobiles->currentPage() == 1) ? 'disabled' : '' }}">
                    <a class="page-number-item" href="{{ $mobiles->url(1) }}">First</a>
                </li>
                <li class="page-number-item">
                    <a class="page-number-item" href="{{ $mobiles->url($mobiles->currentPage() - 1) }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $mobiles->lastPage(); $i++)
                    @php
                    $half_total_links = floor($link_limit / 2);
                    $from = $mobiles->currentPage() - $half_total_links;
                    $to = $mobiles->currentPage() + $half_total_links;
                    if ($mobiles->currentPage() < $half_total_links) { $to +=$half_total_links - $mobiles->
                        currentPage();
                        }
                        if ($mobiles->lastPage() - $mobiles->currentPage() < $half_total_links) { $from
                            -=$half_total_links - ($mobiles->lastPage() - $mobiles->currentPage()) - 1;
                            }
                            @endphp
                            @if ($from < $i && $i < $to) <li class="page-number-item">
                                <a class="page-number-item {{ ($mobiles->currentPage() == $i) ? 'current' : '' }}"
                                    href="{{ $mobiles->url($i) }}">{{ $i }}</a>
                                </li>
                                @endif
                                @endfor
                                @if($mobiles->currentPage() < $mobiles->lastPage())
                                    <li class="page-number-item">
                                        <a class="page-number-item next-link"
                                            href="{{ $mobiles->url($mobiles->currentPage() + 1) }}">Next</a>
                                    </li>
                                    @endif
                                    <li
                                        class="page-number-item {{ ($mobiles->currentPage() == $mobiles->lastPage()) ? ' disabled' : '' }}">
                                        <a class="page-number-item"
                                            href="{{ $mobiles->url($mobiles->lastPage()) }}">Last</a>
                                    </li>
            </ul>
            @if(count($mobiles) > 0)
            <p class="result-count">Showing {{($mobiles->currentpage()-1)*$mobiles->perpage()+1}} to
                {{$mobiles->currentpage()*$mobiles->perpage()}} of {{$mobiles->total()}} items</p>
            @endif
            @endif
        </div>
    </div>
</div>
