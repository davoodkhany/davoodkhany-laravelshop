@component('admin.layouts.content', ['title' => 'همه محصولات'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
        <li class="breadcrumb-item active">همه محصولات</li>
    @endslot

    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">جدول محصولات</h3>

              <div class="card-tools ">
                <div class="input-group input-group-sm" >
                    <form action="" class="d-flex">
                        <input type="text" name="search" class="float-right form-control"  placeholder="جستجو">
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                    </form>

                        <div class="input-group-append">
                            <a  href="{{ route('admin.products.create') }}" class="mr-4 btn btn-success">ایجاد محصول</a>
                        </div>



                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="p-0 card-body table-responsive">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>آی دی محصول</th>
                  <th>نام محصول </th>
                  <th>توضیحات</th>
                  <th>قیمت </th>
                  <th>تعداد</th>

                </tr>

                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->inventory }}</td>
                    <td class="d-flex">
                        <form method="post" action="{{ route('admin.products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button href="#" class="btn btn-sm btn-danger">حذف</button>
                        </form>


                            <a href="{{ route('admin.products.edit' , $product) }}" class="btn btn-sm btn-primary">ویرایش</a>

                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $products->appends(['search' => request()->search])->render() }}
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>

@endcomponent
