@component('admin.layouts.content', ['title' => 'ایجاد مقام جدید'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.rule.index') }}">لیست مقام ها</a></li>
        <li class="breadcrumb-item">مقام جدید</li>

    @endslot

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                @include('admin.layouts.errors')
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.rule.store')}}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">نام مقام</label>
                          <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام مقام را وارد کنید">
                      </div>
                    <div class="form-group">
                      <label for="label" class="col-sm-2 control-label">توضیحات مقام</label>
                        <input type="text" name="label" class="form-control" id="label" placeholder="توضیحات را وارد کنید">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit"  class="btn btn-info">ثبت مقام</button>
                    <a type="submit" href="{{ route('admin.rule.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
