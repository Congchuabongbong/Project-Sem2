<div class="row">
    @if (count($brands) > 0 )
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;width: 2%;"><input type="checkbox" class="selectAll"/>Check</th>
                <th style="text-align: center;width: 50px;">ID</th>
                <th style="text-align: center;width: 200px; ">Name</th>
                <th style="text-align: center;">Description</th>
                <th style="text-align: center;width: 100px;">Created At</th>
                <th style="text-align: center;width: 250px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td style="text-align:center; vertical-align: middle"><input type="checkbox" value="{{$brand->id}}" class="checkbox"/></td>
                    <td style="text-align:center; vertical-align: middle">{{$brand->id}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$brand->name}}</td>
                    <td>{{$brand->description}}</td>
                    <td style="text-align:center; vertical-align: middle">{{date('d-m-Y', strtotime($brand->created_at))}}
                    </td>
                    <td style="text-align:center; vertical-align: middle">
                        <a class="btn btn-primary btn-sm" href="{{route('brand.show', $brand->id)}}">
                            <i class="fas fa-folder">View</i>
                        </a>
                        <a class="btn btn-info btn-sm" href="{{route('brand.edit', $brand->id)}}">
                            <i class="fas fa-pencil-alt">Edit</i>
                        </a>
                        <a class="btn btn-danger btn-sm delete" href="#" brand_id = "{{$brand->id}}" >
                            <i class="fas fa-trash">Delete</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <thread>
                <tr>
                    <th style="text-align: center;width: 50px;">Check</th>
                    <th style="text-align: center;width: 50px;">ID</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center; width: 550px;">Description</th>
                    <th style="text-align: center;width: 100px;">Created At</th>
                    <th style="text-align: center;width: 250px;">Action</th>
                </tr>
            </thread>
        </table>
    @else
        <div>
            <strong>There are no records yet!<i class="far fa-frown"></i></strong> </br>
            <i class="fas fa-hand-point-right"></i>
            <a class="btn btn-primary btn-sm" href="{{route('brand.create')}}">
                <i class="fas fa-create">Create new</i>
            </a>
        </div>
    @endif
</div>
<div class="row">
    @if(count($brands) > 0)
        <div class="col-sm-12 col-md-5">
            <div>
                <i>Showing {{($brands->currentpage()-1)*$brands->perpage()+1}} to
                    {{$brands->currentpage()*$brands->perpage()}} of {{$brands->total()}} entries</i>
            </div>
        </div>
    @endif
    <div class="col-sm-12 col-md-7">
        <div>
            @php
                $link_limit = 7;
            @endphp
            @if ($brands->lastPage() > 1)
                <ul class="pagination">
                    <li class="page-item  {{($brands->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $brands->url(1) }}">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $brands->url($brands->currentPage() - 1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $brands->lastPage(); $i++)
                        @php
                            $half_total_links = floor($link_limit / 2);
                            $from = $brands->currentPage() - $half_total_links;
                            $to = $brands->currentPage() + $half_total_links;
                            if ($brands->currentPage() < $half_total_links) { $to +=$half_total_links - $brands->
                                currentPage();
                            }
                            if ($brands->lastPage() - $brands->currentPage() < $half_total_links) { $from
                                -=$half_total_links - ($brands->lastPage() - $brands->currentPage()) - 1;
                            }
                        @endphp
                        @if ($from < $i && $i < $to)
                            <li class="page-item {{ ($brands->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $brands->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($brands->currentPage() < $brands->lastPage())
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ $brands->url($brands->currentPage() + 1) }}">Next</a>
                        </li>
                    @endif
                    <li
                        class="page-item {{ ($brands->currentPage() == $brands->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $brands->url($brands->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
