<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Update At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $cate)
        <tr>
            <td>{{$cate->id}}</td>
            <td>{{$cate->name}}</td>
            <td>{{$cate->description}}</td>
            <td>{{$cate->created_at}}</td>
            <td>{{$cate->updated_at}}</td>
            <td>
                <a href="admin/category/{{$cate->id}}" class="mr-2">Detail</a>
                <a href="{{route('category.edit',$cate->id)}}" class="mr-2">Edit</a>
                <a href="admin/category/{{$cate->id}}" class="mr-2">Delete</a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
@if ($categories->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($categories->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $categories->url(1) }}">First</a>
        </li>
        @if($categories->currentPage() > 1)
            <li>
                <a href="{{ $categories->url($categories->currentPage() - 1) }}">Previous</a>
            </li>
        @endif
        @for ($i = 1; $i <= $categories->lastPage(); $i++)
            <?php
            $link_limit = 5;
            $half_total_links = floor($link_limit / 2);
            $from = $categories->currentPage() - $half_total_links;
            $to = $categories->currentPage() + $half_total_links;
            if ($categories->currentPage() < $half_total_links) {
                $to += $half_total_links - $categories->currentPage();
            }
            if ($categories->lastPage() - $categories->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($categories->lastPage() - $categories->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($categories->currentPage() == $i) ? 'active' : '' }}">
                    <a href="{{ $categories->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        @if($categories->currentPage() < $categories->lastPage())
            <li>
                <a href="{{ $categories->url($categories->currentPage() + 1) }}">Next</a>
            </li>
        @endif
        <li class="{{ ($categories->currentPage() == $categories->lastPage()) ? 'disabled' : '' }}">
            <a href="{{ $categories->url($categories->lastPage()) }}">Last</a>
        </li>
    </ul>
    @endif
    </div>
