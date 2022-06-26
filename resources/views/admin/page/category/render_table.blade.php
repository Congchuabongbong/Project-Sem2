<div class="row">
    @if (count($categories) > 0 )
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
            @foreach($categories as $cate)
                <tr>
                    <td style="text-align:center; vertical-align: middle"><input type="checkbox"
                                                                                 value="{{$cate->id}}" class="checkbox"/></td>
                    <td style="text-align:center; vertical-align: middle">{{$cate->id}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$cate->name}}</td>
                    <td>{{$cate->description}}</td>
                    <td style="text-align:center; vertical-align: middle">{{date('d-m-Y', strtotime($cate->created_at))}}
                    </td>
                    <td style="text-align:center; vertical-align: middle">
                        <a class="btn btn-primary btn-sm" href="{{route('category.show', $cate->id)}}">
                            <i class="fas fa-folder">View</i>
                        </a>
                        <a class="btn btn-info btn-sm" href="{{route('category.edit', $cate->id)}}">
                            <i class="fas fa-pencil-alt">Edit</i>
                        </a>
                        <a class="btn btn-danger btn-sm delete" href="#" category_id = "{{$cate->id}}" >
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
            <a class="btn btn-primary btn-sm" href="{{route('category.create')}}">
                <i class="fas fa-create">Create new</i>
            </a>
        </div>
    @endif
</div>
<div class="row">
    @if(count($categories) > 0)
        <div class="col-sm-12 col-md-5">
            <div>
                <i>Showing {{($categories->currentpage()-1)*$categories->perpage()+1}} to
                    {{$categories->currentpage()*$categories->perpage()}} of {{$categories->total()}} entries</i>
            </div>
        </div>
    @endif
    <div class="col-sm-12 col-md-7">
        <div>
            @php
                $link_limit = 7;
            @endphp
            @if ($categories->lastPage() > 1)
                <ul class="pagination">
                    <li class="page-item  {{($categories->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $categories->url(1) }}">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $categories->url($categories->currentPage() - 1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $categories->lastPage(); $i++)
                        @php
                            $half_total_links = floor($link_limit / 2);
                            $from = $categories->currentPage() - $half_total_links;
                            $to = $categories->currentPage() + $half_total_links;
                            if ($categories->currentPage() < $half_total_links) { $to +=$half_total_links - $categories->
                                currentPage();
                            }
                            if ($categories->lastPage() - $categories->currentPage() < $half_total_links) { $from
                                -=$half_total_links - ($categories->lastPage() - $categories->currentPage()) - 1;
                            }
                        @endphp
                        @if ($from < $i && $i < $to)
                            <li class="page-item {{ ($categories->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($categories->currentPage() < $categories->lastPage())
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ $categories->url($categories->currentPage() + 1) }}">Next</a>
                        </li>
                    @endif
                    <li
                        class="page-item {{ ($categories->currentPage() == $categories->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $categories->url($categories->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
