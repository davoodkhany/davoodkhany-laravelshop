@component('admin.layouts.content', ['title' => 'ایجاد محصول جدید'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">لیست محصول</a></li>
        <li class="breadcrumb-item">محصول جدید</li>

    @endslot

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                @include('admin.layouts.errors')
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.products.store')}}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">نام</label>
                          <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="نام محصول را وارد کنید">
                      </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">توضحیات محصول</label>
                      <textarea name="description" class="form-control" id="" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">قیمت محصول</label>
                        <input type="number" name="price" class="form-control" id="inputPassword3" placeholder="قیمت  را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">موجودی</label>
                        <input type="number" name="inventory" class="form-control" id="inputPassword3" placeholder="موجودی کل را وارد کنید">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit"  class="btn btn-info">ثبت محصول</button>
                    <a type="submit" href="{{ route('admin.products.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
