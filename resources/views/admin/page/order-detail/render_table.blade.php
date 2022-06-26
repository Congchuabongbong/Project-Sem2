<div class="row">
    @if (count($order_details) > 0 )
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;width: 2%;"><input type="checkbox" class="selectAll"/>Check</th>
                <th style="text-align: center;width: 2%;">Order ID</th>
                <th style="text-align: center;width: 25%;">Mobile</th>
                <th style="text-align: center;width: 4%;">Quantity</th>
                <th style="text-align: center;width: 12%;">Unit Price (VND)</th>
                <th style="text-align: center;width: 10%;">Discount (%)</th>
                <th style="text-align: center;width: 10%;">Created At</th>
                <th style="text-align: center;width: 27%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order_details as $order_detail)
                <tr>
                    <td style="text-align:center; vertical-align: middle"><input type="checkbox" value="{{$order_detail->orderID}}" class="checkbox"/></td>
                    <td style="text-align:center; vertical-align: middle">{{$order_detail->orderID}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$order_detail->mobile->name}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$order_detail->quantity}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$order_detail->mobile->price}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$order_detail->discount * 100}}</td>
                    <td style="text-align:center; vertical-align: middle">{{date('d-m-Y', strtotime($order_detail->created_at))}}</td>
                    <td style="text-align:center; vertical-align: middle">
                        <a class="btn btn-primary btn-sm m-1" href="{{route('order-detail.show', $order_detail->orderID)}}">
                            <i class="fas fa-folder">View</i>
                        </a>
                        <a class="btn btn-danger btn-sm delete m-1" href="{{route('order-detail.destroy', $order_detail->orderID)}}">
                            <i class="fas fa-trash">Delete</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <thead>
            <tr>
                <th style="text-align: center;width: 2%;">Check</th>
                <th style="text-align: center;width: 2%;">Order ID</th>
                <th style="text-align: center;width: 25%;">Mobile</th>
                <th style="text-align: center;width: 4%;">Quantity</th>
                <th style="text-align: center;width: 12%;">Unit Price (VND)</th>
                <th style="text-align: center;width: 10%;">Discount (%)</th>
                <th style="text-align: center;width: 10%;">Created At</th>
                <th style="text-align: center;width: 27%;">Action</th>
            </tr>
            </thead>
        </table>
    @else
        <div>
            <strong>There are no records yet!<i class="far fa-frown"></i></strong> </br>
            <i class="fas fa-hand-point-right"></i>
            <a class="btn btn-primary btn-sm" href="">
                <i class="fas fa-create">Create new</i>
            </a>
        </div>
    @endif
</div>
<div class="row">
    @if(count($order_details) > 0)
        <div class="col-sm-12 col-md-5">
            <div>
                <i>Showing {{($order_details->currentpage()-1)*$order_details->perpage()+1}} to
                    {{$order_details->currentpage()*$order_details->perpage()}} of {{$order_details->total()}} entries</i>
            </div>
        </div>
    @endif
    <div class="col-sm-12 col-md-7">
        <div>
            @php
                $link_limit = 7;
            @endphp
            @if ($order_details->lastPage() > 1)
                <ul class="pagination">
                    <li class="page-item  {{($order_details->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $order_details->url(1) }}">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $order_details->url($order_details->currentPage() - 1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $order_details->lastPage(); $i++)
                        @php
                            $half_total_links = floor($link_limit / 2);
                            $from = $order_details->currentPage() - $half_total_links;
                            $to = $order_details->currentPage() + $half_total_links;
                            if ($order_details->currentPage() < $half_total_links) { $to +=$half_total_links - $order_details->
                                currentPage();
                            }
                            if ($order_details->lastPage() - $order_details->currentPage() < $half_total_links) { $from
                                -=$half_total_links - ($order_details->lastPage() - $order_details->currentPage()) - 1;
                            }
                        @endphp
                        @if ($from < $i && $i < $to)
                            <li class="page-item {{ ($order_details->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $order_details->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($order_details->currentPage() < $order_details->lastPage())
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ $order_details->url($order_details->currentPage() + 1) }}">Next</a>
                        </li>
                    @endif
                    <li
                        class="page-item {{ ($order_details->currentPage() == $order_details->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $order_details->url($order_details->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
