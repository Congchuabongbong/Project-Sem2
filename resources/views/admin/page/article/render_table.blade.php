<div class="row">
    @if (count($articles) > 0 )
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;width: 5%;"><input type="checkbox" class="selectAll"/>Check</th>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center;">Title</th>
                <th style="text-align: center;">Brand</th>
                <th style="text-align: center;">Author</th>
                <th style="text-align: center;">Thumbnail</th>
                <th style="text-align: center;width: 15%;">Created At</th>
                <th style="text-align: center;width: 25%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td style="text-align:center; vertical-align: middle"><input type="checkbox"
                                                                                 value="{{$article->id}}" class="checkbox"/></td>
                    <td style="text-align:center; vertical-align: middle">{{$article->id}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$article->title}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$article->strBrand}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$article->author}}</td>
                    <td style="text-align:center; vertical-align: middle">
                        <img width="120px" src="{{$article->thumbnail}}" alt="{{$article->title}}">
                    </td>
                    <td style="text-align:center; vertical-align: middle">{{date('d-m-Y', strtotime($article->created_at))}}</td>
                    <td style="text-align:center; vertical-align: middle">
                        <a class="btn btn-primary btn-sm m-1" href="/admin/article/{{$article->id}}">
                            <i class="fas fa-folder">View</i>
                        </a>
                        <a class="btn btn-info btn-sm m-1" href="/admin/article/{{$article->id}}/edit">
                            <i class="fas fa-pencil-alt">Edit</i>
                        </a>
                        <a class="btn btn-danger btn-sm delete m-1" articleID='{{$article->id}}'>
                            <i class="fas fa-trash">Delete</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <thead>
            <tr>
                <th style="text-align: center;width: 5%;">Check</th>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center;">Title</th>
                <th style="text-align: center;">Brand</th>
                <th style="text-align: center;width: 10%;">Author</th>
                <th style="text-align: center;">Thumbnail</th>
                <th style="text-align: center;width: 15%;">Created At</th>
                <th style="text-align: center;width: 25%;">Action</th>
            </tr>
            </thead>
        </table>
    @else
        <div>
            <strong>There are no records yet!<i class="far fa-frown"></i></strong> <br>
            <i class="fas fa-hand-point-right"></i>
            <a class="btn btn-primary btn-sm" href="{{route('article.create')}}">
                <i class="fas fa-create">Create new</i>
            </a>
        </div>
    @endif
</div>
<div class="row">
    @if(count($articles) > 0)
        <div class="col-sm-12 col-md-5">
            <div>
                <i>Showing {{($articles->currentpage()-1)*$articles->perpage()+1}} to
                    {{$articles->currentpage()*$articles->perpage()}} of {{$articles->total()}} entries</i>
            </div>
        </div>
    @endif
    <div class="col-sm-12 col-md-7">
        <div>
            @php
                $link_limit = 7;
            @endphp
            @if ($articles->lastPage() > 1)
                <ul class="pagination">
                    <li class="page-item  {{($articles->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $articles->url(1) }}">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $articles->url($articles->currentPage() - 1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $articles->lastPage(); $i++)
                        @php
                            $half_total_links = floor($link_limit / 2);
                            $from = $articles->currentPage() - $half_total_links;
                            $to = $articles->currentPage() + $half_total_links;
                            if ($articles->currentPage() < $half_total_links) { $to +=$half_total_links - $articles->
                                currentPage();
                            }
                            if ($articles->lastPage() - $articles->currentPage() < $half_total_links) { $from
                                -=$half_total_links - ($articles->lastPage() - $articles->currentPage()) - 1;
                            }
                        @endphp
                        @if ($from < $i && $i < $to)
                            <li class="page-item {{ ($articles->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($articles->currentPage() < $articles->lastPage())
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ $articles->url($articles->currentPage() + 1) }}">Next</a>
                        </li>
                    @endif
                    <li
                        class="page-item {{ ($articles->currentPage() == $articles->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $articles->url($articles->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
