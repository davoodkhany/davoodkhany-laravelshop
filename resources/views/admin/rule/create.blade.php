@component('admin.layouts.content', ['title' => 'ایجاد دسترسی جدید'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.permission.index') }}">لیست دسترسی ها</a></li>
        <li class="breadcrumb-item">کاربر جدید</li>

    @endslot

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                @include('admin.layouts.errors')
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.permission.store')}}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">نام دسترسی</label>
                          <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام دسترسی را وارد کنید">
                      </div>
                    <div class="form-group">
                      <label for="label" class="col-sm-2 control-label">توضیحات دسترسی</label>
                        <input type="text" name="label" class="form-control" id="label" placeholder="ایمیل را وارد کنید">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit"  class="btn btn-info">ثبت دسترسی</button>
                    <a type="submit" href="{{ route('admin.permission.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
