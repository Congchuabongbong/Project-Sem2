<div class="row">
    @if (count($mobiles) > 0 )
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;width: 2%;"><input type="checkbox" class="selectAll"/>Check</th>
                <th style="text-align: center;width: 2%;">ID</th>
                <th style="text-align: center;width: 10%;">name</th>
                <th style="text-align: center;">brand</th>
                <th style="text-align: center;">quantity</th>
                <th style="text-align: center;width: 12%;">price (VND)</th>
                <th style="text-align: center;">thumbnail</th>
                <th style="text-align: center;width: 8%;">status</th>
                <th style="text-align: center;">created_at</th>
                <th style="text-align: center;width: 25%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mobiles as $mobile)
                <tr>
                    <td style="text-align:center; vertical-align: middle"><input type="checkbox" value="{{$mobile->id}}" class="checkbox"/></td>
                    <td style="text-align:center; vertical-align: middle">{{$mobile->id}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$mobile->name}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$mobile->brand->name ?? null}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$mobile->quantity}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$mobile->fPrice}}</td>
                    <td style="text-align:center; vertical-align: middle">
                        <img width="120px" src="{{$mobile->mainThumbnail}}" alt="">
                    </td>
                    <td style="text-align:center; vertical-align: middle">{{$mobile->strStatus}}</td>
                    <td style="text-align:center; vertical-align: middle">{{date('d-m-Y', strtotime($mobile->created_at))}}</td>
                    <td style="text-align:center; vertical-align: middle">
                        <a class="btn btn-primary btn-sm m-1" href="{{route('mobile.show', $mobile->id)}}">
                            <i class="fas fa-folder">View</i>
                        </a>
                        <a class="btn btn-info btn-sm m-1" href="/admin/mobile/{{$mobile->id}}/edit">
                            <i class="fas fa-pencil-alt">Edit</i>
                        </a>
                        <a class="btn btn-danger btn-sm delete m-1" href="#" id = 'btn-delete' mobile_id = "{{$mobile->id}}">
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
                    <th style="text-align: center;width: 8%;">name</th>
                    <th style="text-align: center;width: 4%;">brand</th>
                    <th style="text-align: center;width: 4%;">quantity</th>
                    <th style="text-align: center;width: 8%;">price (VND)</th>
                    <th style="text-align: center;width: 22%;">thumbnail</th>
                    <th style="text-align: center;width: 4%;">status</th>
                    <th style="text-align: center;width: 11%;">created_at</th>
                    <th style="text-align: center;width: 16%;">Action</th>
                </tr>
            </thead>
        </table>
    @else
        <div>
            <strong>There are no records yet!<i class="far fa-frown"></i></strong> </br>
            <i class="fas fa-hand-point-right"></i>
            <a class="btn btn-primary btn-sm" href="{{route('mobile.create')}}">
                <i class="fas fa-create">Create new</i>
            </a>
        </div>
    @endif
</div>
<div class="row">
    @if(count($mobiles) > 0)
        <div class="col-sm-12 col-md-5">
            <div>
                <i>Showing {{($mobiles->currentpage()-1)*$mobiles->perpage()+1}} to
                    {{$mobiles->currentpage()*$mobiles->perpage()}} of {{$mobiles->total()}} entries</i>
            </div>
        </div>
    @endif
    <div class="col-sm-12 col-md-7">
        <div>
            @php
                $link_limit = 7;
            @endphp
            @if ($mobiles->lastPage() > 1)
                <ul class="pagination">
                    <li class="page-item  {{($mobiles->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $mobiles->url(1) }}">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $mobiles->url($mobiles->currentPage() - 1) }}">Previous</a>
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
                        @if ($from < $i && $i < $to)
                            <li class="page-item {{ ($mobiles->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $mobiles->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($mobiles->currentPage() < $mobiles->lastPage())
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ $mobiles->url($mobiles->currentPage() + 1) }}">Next</a>
                        </li>
                    @endif
                    <li
                        class="page-item {{ ($mobiles->currentPage() == $mobiles->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $mobiles->url($mobiles->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
