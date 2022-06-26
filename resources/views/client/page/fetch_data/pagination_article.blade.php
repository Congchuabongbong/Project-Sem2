<div class="row">
    @if (count($articles) > 0)
        @foreach ($articles as $article)
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <a href="{{route('article_client.show', $article -> id)}}">
                        <img class="card-img" src="{{$article->thumbnail}}">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9">
                    <h4><a href="{{route('article_client.show', $article -> id)}}">{{$article->title}}</a></h4>
                    @php
                        $date_format = date("d/m/Y", strtotime($article->created_at));
                    @endphp
                    <p><i class="far fa-clock"></i> {{$date_format}}</p>
                    <p>{{$article->description}}...</p>
                </div>
            </div>
            <hr>
        @endforeach
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
    <div class="row">
        <div class="wrap-pagination-info" id="pagination">
            @php
                $link_limit = 7;
            @endphp
            @if ($articles->lastPage() > 1)
                <ul class="page-numbers">
                    <li class="page-number-item  {{($articles->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-number-item" href="{{ $articles->url(1) }}">First</a>
                    </li>
                    <li class="page-number-item">
                        <a class="page-number-item"
                           href="{{ $articles->url($articles->currentPage() - 1) }}">Previous</a>
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
                            <li class="page-number-item">
                                <a class="page-number-item {{ ($articles->currentPage() == $i) ? 'current' : '' }}"
                                   href="{{ $articles->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($articles->currentPage() < $articles->lastPage())
                        <li class="page-number-item">
                            <a class="page-number-item next-link"
                               href="{{ $articles->url($articles->currentPage() + 1) }}">Next</a>
                        </li>
                    @endif
                    <li
                        class="page-number-item {{ ($articles->currentPage() == $articles->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-number-item"
                           href="{{ $articles->url($articles->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

