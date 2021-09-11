@component('admin.layouts.content', ['title' => 'ایجاد دسته جدید'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">لیست دسته</a></li>
        <li class="breadcrumb-item">دسته جدید</li>

    @endslot


    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                @include('admin.layouts.errors')
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">نام</label>
                          <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام دسته را وارد کنید">
                      </div>
                  </div>
                    @if(request('parent'))

                    @php
                        $cat = \App\Category::find(request('parent'))
                    @endphp
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">نام</label>
                          <input type="text" class="form-control" value="{{ $cat->name }}" disabled>
                          <input type="text" hidden name="parent_id" value="{{ $cat->id }}">
                      </div>
                    @endif
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit"  class="btn btn-info">ورود</button>
                    <a type="submit" href="{{ route('admin.categories.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
