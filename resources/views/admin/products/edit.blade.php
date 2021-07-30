@component('admin.layouts.content', ['title' => 'ویرایش کاربر جدید'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">لیست کاربران</a></li>
        <li class="breadcrumb-item">ویرایش محصول</li>

    @endslot

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                @include('admin.layouts.errors')
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.products.update', $product)}}">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">نام</label>
                              <input type="text" name="title" class="form-control" id="inputEmail3" value="{{ old('title' , $product->title) }}" placeholder="نام محصول را وارد کنید">
                          </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">توضحیات محصول</label>
                          <textarea name="description" class="form-control" id=""  value="{{ old('desciption' , $product->desciption) }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">قیمت محصول</label>
                            <input type="number" name="price" class="form-control" id="inputPassword3" value="{{ old('price' , $product->price) }}" placeholder="قیمت  را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">موجودی</label>
                            <input type="number" name="inventory" class="form-control" id="inputPassword3" value="{{ old('inventory' , $product->inventory) }}" placeholder="موجودی کل را وارد کنید">
                        </div>
                      </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit"  class="btn btn-info">ویرایش محصول</button>
                    <a type="submit" href="{{ route('admin.products.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
