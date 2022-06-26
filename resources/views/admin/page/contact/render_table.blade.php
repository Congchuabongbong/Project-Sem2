<div class="row">
    @if (count($feedbacks) > 0 )
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;width: 2%;">Check</th>
                <th style="text-align: center;width: 2%;">ID</th>
                <th style="text-align: center;width: 2%;">Name</th>
                <th style="text-align: center;width: 8%;">Email </th>
                <th style="text-align: center;width: 2%;">Phone</th>
                <th style="text-align: center;width: 2%;">Created At</th>
                <th style="text-align: center;width: 8%;">Comment</th>
                <th style="text-align: center;width: 8%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td style="text-align:center; vertical-align: middle"><input type="checkbox" value="{{$feedback->id}}"/></td>
                    <td style="text-align:center; vertical-align: middle">{{$feedback->id}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$feedback->name}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$feedback->email}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$feedback->phone}}</td>
                    <td style="text-align:center; vertical-align: middle">{{date('d-m-Y', strtotime($feedback->created_at))}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$feedback->comment}}</td>
                    <td style="text-align:center; vertical-align: middle">
                        <a class="btn btn-primary btn-sm m-1" href="{{route('feedback.show', $feedback->id)}}">
                            <i class="fas fa-folder">View</i>
                        </a>
                        <a  class="btn btn-danger btn-sm delete m-1" feedbackID = '{{$feedback->id}}'>
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
                <th style="text-align: center;width: 2%;">Name</th>
                <th style="text-align: center;width: 8%;">Email </th>
                <th style="text-align: center;width: 2%;">Phone</th>
                <th style="text-align: center;width: 2%;">Created At</th>
                <th style="text-align: center;width: 8%;">Comment</th>
                <th style="text-align: center;width: 8%;">Action</th>
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
    @if(count($feedbacks) > 0)
        <div class="col-sm-12 col-md-5">
            <div>
                <i>Showing {{($feedbacks->currentpage()-1)*$feedbacks->perpage()+1}} to
                    {{$feedbacks->currentpage()*$feedbacks->perpage()}} of {{$feedbacks->total()}} entries</i>
            </div>
        </div>
    @endif
    <div class="col-sm-12 col-md-7">
        <div>
            @php
                $link_limit = 7;
            @endphp
            @if ($feedbacks->lastPage() > 1)
                <ul class="pagination">
                    <li class="page-item  {{($feedbacks->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $feedbacks->url(1) }}">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $feedbacks->url($feedbacks->currentPage() - 1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $feedbacks->lastPage(); $i++)
                        @php
                            $half_total_links = floor($link_limit / 2);
                            $from = $feedbacks->currentPage() - $half_total_links;
                            $to = $feedbacks->currentPage() + $half_total_links;
                            if ($feedbacks->currentPage() < $half_total_links) { $to +=$half_total_links - $feedbacks->
                                currentPage();
                            }
                            if ($feedbacks->lastPage() - $feedbacks->currentPage() < $half_total_links) { $from
                                -=$half_total_links - ($feedbacks->lastPage() - $feedbacks->currentPage()) - 1;
                            }
                        @endphp
                        @if ($from < $i && $i < $to)
                            <li class="page-item {{ ($feedbacks->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $feedbacks->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($feedbacks->currentPage() < $feedbacks->lastPage())
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ $feedbacks->url($feedbacks->currentPage() + 1) }}">Next</a>
                        </li>
                    @endif
                    <li
                        class="page-item {{ ($feedbacks->currentPage() == $feedbacks->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $feedbacks->url($feedbacks->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
