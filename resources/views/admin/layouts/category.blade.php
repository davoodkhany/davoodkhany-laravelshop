<ul class="list-group list-group-flush">

    @foreach ($categories as $cat)

        <li class="list-group-item">{{ $cat->name }}
            <a class="badge badge-danger" href="">حذف</a>
            <a class="badge badge-success" href="">ویرایش</a>
            <a class="badge badge-primary" href="">زیر دسته</a>
            @if (($cat->child->count()) > 0)
                @include('admin.layouts.category', ['categories' => $cat->child])
            @endif
        </li>

    @endforeach
    



</ul>
