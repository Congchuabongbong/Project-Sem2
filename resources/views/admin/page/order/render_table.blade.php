<div class="row">
    @if (count($order) > 0 )
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;width: 2%;"><input type="checkbox" class="selectAll"/>Check</th>
                <th style="text-align: center;width: 2%;">ID</th>
                <th style="text-align: center;width: 12%;">Name</th>
                <th style="text-align: center;width: 4%;">Phone</th>
                <th style="text-align: center;width: 8%;">Email</th>
                <th style="text-align: center;width: 18%;">Total Price (VND)</th>
                <th style="text-align: center;width: 15%;">Created At</th>
                <th style="text-align: center;width: 30%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $ord)
                <tr>
                    <td style="text-align:center; vertical-align: middle"><input type="checkbox" value="{{$ord->id}}" class="checkbox"/></td>
                    <td style="text-align:center; vertical-align: middle">{{$ord->id}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$ord->name}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$ord->phone}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$ord->email}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$ord->fPrice}}</td>
                    <td style="text-align:center; vertical-align: middle">{{date('d-m-Y', strtotime($ord->created_at))}}</td>
                    <td style="text-align:center; vertical-align: middle">
                        <a class="btn btn-primary btn-sm m-1" href="{{route('orders.show', $ord->id)}}">
                            <i class="fas fa-folder">View</i>
                        </a>
                        <a class="btn btn-danger btn-sm delete m-1" href="{{route('orders.destroy', $ord)}}" order_id = "{{$ord->id}}">
                            <i class="fas fa-trash">Delete</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <thead>
                <tr>
                    <th style="text-align: center;width: 2%;">Check</th>
                    <th style="text-align: center;width: 2%;">ID</th>
                    <th style="text-align: center;width: 13%;">Name</th>
                    <th style="text-align: center;width: 4%;">Phone</th>
                    <th style="text-align: center;width: 8%;">Email</th>
                    <th style="text-align: center;width: 15%;">Total Price (VND)</th>
                    <th style="text-align: center;width: 13%;">Created At</th>
                    <th style="text-align: center;width: 30%;">Action</th>
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
    @if(count($order) > 0)
        <div class="col-sm-12 col-md-5">
            <div>
                <i>Showing {{($order->currentpage()-1)*$order->perpage()+1}} to
                    {{$order->currentpage()*$order->perpage()}} of {{$order->total()}} entries</i>
            </div>
        </div>
    @endif
    <div class="col-sm-12 col-md-7">
        <div>
            @php
                $link_limit = 7;
            @endphp
            @if ($order->lastPage() > 1)
                <ul class="pagination">
                    <li class="page-item  {{($order->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $order->url(1) }}">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $order->url($order->currentPage() - 1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $order->lastPage(); $i++)
                        @php
                            $half_total_links = floor($link_limit / 2);
                            $from = $order->currentPage() - $half_total_links;
                            $to = $order->currentPage() + $half_total_links;
                            if ($order->currentPage() < $half_total_links) { $to +=$half_total_links - $order->
                                currentPage();
                            }
                            if ($order->lastPage() - $order->currentPage() < $half_total_links) { $from
                                -=$half_total_links - ($order->lastPage() - $order->currentPage()) - 1;
                            }
                        @endphp
                        @if ($from < $i && $i < $to)
                            <li class="page-item {{ ($order->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $order->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($order->currentPage() < $order->lastPage())
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ $order->url($order->currentPage() + 1) }}">Next</a>
                        </li>
                    @endif
                    <li
                        class="page-item {{ ($order->currentPage() == $order->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $order->url($order->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
