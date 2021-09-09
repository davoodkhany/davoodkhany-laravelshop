@component('admin.layouts.content', ['title' => 'همه دسته بندی ها'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">داشبورد</a></li>
        <li class="breadcrumb-item">لیست دسته بندی ها</li>
    @endslot



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول نظرات</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">

                            <form action="" class="d-flex">
                                <input type="text" name="search" class="float-right form-control" placeholder="جستجو">
                                <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                            </form>

                            <div class="input-group-append">
                                <a  href="{{ route('admin.categories.create') }}" class="mr-4 btn btn-success">ایجاد دسته</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-0 card-body">
                    @include('admin.layouts.category', ['categories' => $categories]);
                </div>
            </div>
        </div>
    </div>
</div>

@endcomponent
