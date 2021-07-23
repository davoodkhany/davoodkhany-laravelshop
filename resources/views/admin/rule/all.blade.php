@component('admin.layouts.content', ['title' => 'مقام ها'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">مقام ها</li>
    @endslot

    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">جدول مقام ها</h3>

              <div class="card-tools ">
                <div class="input-group input-group-sm" >
                    <form action="" class="d-flex">
                        <input type="text" name="search" class="float-right form-control"  placeholder="جستجو">
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="input-group-append">
                        <a  href="{{ route('admin.rule.create') }}" class="mr-4 btn btn-success">ایجاد کاربر</a>
                    </div>

                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="p-0 card-body table-responsive">
              <table class="table table-hover">
                <tbody><tr>
                  <th>نام دسترسی</th>
                  <th>توضیحات دسترسی </th>
                </tr>
                @foreach($rules as $rule)
                <tr>
                    <td>{{ $rule->name }}</td>
                    <td>{{ $rule->label }}</td>

                    <td class="d-flex">
                        <form method="post" action="{{ route('admin.rule.destroy', $rule) }}">
                            @csrf
                            @method('DELETE')
                            <button href="#" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('admin.rule.edit' , $rule) }}" class="btn btn-sm btn-primary">ویرایش</a>

                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $rules->render() }}
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>

@endcomponent
