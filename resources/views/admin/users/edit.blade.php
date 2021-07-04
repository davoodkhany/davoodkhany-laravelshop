@component('admin.layouts.content', ['title' => 'ویرایش کاربر جدید'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">لیست کاربران</a></li>
        <li class="breadcrumb-item">ویرایش کاربر</li>

    @endslot

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                @include('admin.layouts.errors')
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.users.update', $user)}}">
                    @csrf
                    @method('PATCH')

                  <div class="card-body">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">نام</label>
                          <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام را وارد کنید" value="{{ $user->name }}">
                      </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">ایمیل</label>
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="ایمیل را وارد کنید" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">پسورد</label>
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="پسورد را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">پسورد</label>
                        <input type="password" name="password_confirmation" class="form-control" id="inputPassword3" placeholder="پسورد خود را تکرار کنید">
                    </div>
                    @if(! $user->hasVerifiedEmail())
                        <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" name="verify" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">تایید ایمیل</label>
                            </div>
                        </div>
                    @endif

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit"  class="btn btn-info">ویرایش</button>
                    <a type="submit" href="{{ route('admin.users.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
