@component('admin.layouts.content', ['title' => 'همه کاربران'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
        <li class="breadcrumb-item active">همه کاربران</li>
    @endslot

    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">جدول ریسپانسیو</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="float-right form-control" placeholder="جستجو">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="p-0 card-body table-responsive">
              <table class="table table-hover">
                <tbody><tr>
                  <th>آی دی کاربر</th>
                  <th>نام </th>
                  <th>ایمیل</th>
                  <th>وضعیت</th>
                  <th>دلیل</th>
                </tr>

                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->email_verified_at)
                            <span class="badge badge-success">تایید شده</span>
                        @else
                            <span class="badge badge-danger">تاییده نشده</span>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger">حذف</a>
                        <a href="#" class="btn btn-sm btn-primary">ویرایش</a>
                    </td>
                  </tr>
                @endforeach

              </tbody></table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

@endcomponent
