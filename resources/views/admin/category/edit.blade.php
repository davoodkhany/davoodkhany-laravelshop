@component('admin.layouts.content', ['title' => 'ویرایش دسته جدید'])

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
                <form class="form-horizontal" method="POST" action="{{ route('admin.categories.update', $category) }}">
                    @csrf
                    @method('PATCH')
                  <div class="card-body">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">نام</label>
                          <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام دسته را وارد کنید" value="{{ $category->name }}">
                      </div>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="parent_id" >
                        @foreach(\App\Category::all() as $cats)
                            <option value="{{ $category->id }}" {{$category->id === $cats->id ? 'selected' : ''  }}>{{ $cats->name }}</option>
                        @endforeach
                    </select>
                </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit"  class="btn btn-info">ویرایش</button>
                    <a type="submit" href="{{ route('admin.categories.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
