<ul>
    @foreach ($categories as  $category)
        <li>{{ $category->name }}
            @if ($category)
            @include('layouts.category-list', [ 'categories' => $category->child])
            @endif
        </li>

    @endforeach
</ul>
