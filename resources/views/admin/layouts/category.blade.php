<ul class="list-group list-group-flush">

    @foreach ($categories as $cat)

        <li class="list-group-item">{{ $cat->name }}
            <form action="{{ route('admin.categories.destroy' , $cat->id)  }}" id="cat-{{$cat->id}}-delete" method="post">
                @csrf
                @method('delete')
            </form>
            <a class="badge badge-danger" href="#" onclick="event.preventDefault(); document.getElementById('cat-{{$cat->id}}-delete').submit()">حذف</a>
            <a class="badge badge-success" href="{{ route('admin.categories.edit' , $cat) }}">ویرایش</a>
            <a class="badge badge-primary" href="{{ route('admin.categories.create')}}?parent={{ $cat->id }}">زیر دسته</a>
            @if (($cat->child->count()) > 0)
                @include('admin.layouts.category', ['categories' => $cat->child])
            @endif
        </li>

    @endforeach




</ul>
