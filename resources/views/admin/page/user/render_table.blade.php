<div class="row">
    @if (count($users) > 0 )
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;width: 1%;"><input type="checkbox" class="selectAll"/>Check</th>
                <th style="text-align: center;width: 3%;">ID</th>
                <th style="text-align: center;width: 9%;">Account (Email) </th>
                <th style="text-align: center;width: 2%;">Account Type</th>
                <th style="text-align: center;width: 10%;">Full Name</th>
                <th style="text-align: center;width: 4%;">Status</th>
                <th style="text-align: center;width: 5%;">Updated At</th>
                <th style="text-align: center;width: 17%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td style="text-align:center; vertical-align: middle"><input type="checkbox" value="{{$user->id}}" class="checkbox"/></td>
                    <td style="text-align:center; vertical-align: middle">{{$user->id}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$user->email}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$user->strRolllle}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$user->fullName}}</td>
                    <td style="text-align:center; vertical-align: middle">{{$user->strStatus}}</td>
                    <td style="text-align:center; vertical-align: middle">{{date('d-m-Y', strtotime($user->created_at))}}</td>
                    <td style="text-align:center; vertical-align: middle">
                        <a class="btn btn-primary btn-sm m-1" href="/admin/user/{{$user->id}}">
                            <i class="fas fa-folder">View</i>
                        </a>
                        <a class="btn btn-info btn-sm m-1" href="/admin/user_admin/{{$user->id}}/edit">
                            <i class="fas fa-pencil-alt">Edit</i>
                        </a>
                        <a  class="btn btn-danger btn-sm delete m-1" userID = '{{$user->id}}'>
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
                <th style="text-align: center;width: 8%;">Account (Email) </th>
                <th style="text-align: center;width: 2%;">Account Type</th>
                <th style="text-align: center;width: 8%;">Full Name</th>
                <th style="text-align: center;width: 4%;">Status</th>
                <th style="text-align: center;width: 5%;">Updated At</th>
                <th style="text-align: center;width: 13%;">Action</th>
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
    @if(count($users) > 0)
        <div class="col-sm-12 col-md-5">
            <div>
                <i>Showing {{($users->currentpage()-1)*$users->perpage()+1}} to
                    {{$users->currentpage()*$users->perpage()}} of {{$users->total()}} entries</i>
            </div>
        </div>
    @endif
    <div class="col-sm-12 col-md-7">
        <div>
            @php
                $link_limit = 7;
            @endphp
            @if ($users->lastPage() > 1)
                <ul class="pagination">
                    <li class="page-item  {{($users->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $users->url(1) }}">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $users->url($users->currentPage() - 1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        @php
                            $half_total_links = floor($link_limit / 2);
                            $from = $users->currentPage() - $half_total_links;
                            $to = $users->currentPage() + $half_total_links;
                            if ($users->currentPage() < $half_total_links) { $to +=$half_total_links - $users->
                                currentPage();
                            }
                            if ($users->lastPage() - $users->currentPage() < $half_total_links) { $from
                                -=$half_total_links - ($users->lastPage() - $users->currentPage()) - 1;
                            }
                        @endphp
                        @if ($from < $i && $i < $to)
                            <li class="page-item {{ ($users->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($users->currentPage() < $users->lastPage())
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ $users->url($users->currentPage() + 1) }}">Next</a>
                        </li>
                    @endif
                    <li
                        class="page-item {{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $users->url($users->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
