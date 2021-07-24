@component('admin.layouts.content', ['title' => 'ویرایش مقام '])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.rule.index') }}">لیست مقام ها</a></li>
        <li class="breadcrumb-item">ویرایش مقام</li>

    @endslot

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                @include('admin.layouts.errors')
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.users.permission.store', $user)}}">
                    @csrf

                    <div class="card-body">


                        <div class="form-group">
                            <select class="form-control" name="permissions[]" multiple>
                                @foreach(\App\Permission::all() as $permission)
                                    <option value="{{ $permission->id }}" {{in_array($permission->id, $rule->permissions->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="permissions[]" multiple>
                                @foreach(\App\Permission::all() as $permission)
                                    <option value="{{ $permission->id }}" {{in_array($permission->id, $rule->permissions->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <!-- /.card-body -->



                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit"  class="btn btn-info">ثبت</button>
                    <a type="submit" href="{{ route('admin.usere.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
