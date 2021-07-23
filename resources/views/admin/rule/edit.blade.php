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
                <form class="form-horizontal" method="POST" action="{{ route('admin.rule.update', $rule)}}">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">نام مقام</label>
                              <input type="text" name="name" class="form-control" id="inputEmail3"  value="{{ $rule->name }}" placeholder="نام مقام را وارد کنید">
                          </div>
                        <div class="form-group">
                          <label for="label" class="col-sm-2 control-label">توضیحات مقام</label>
                            <input type="text" name="label" class="form-control" id="label" value="{{ $rule->label }}" placeholder="ایمیل را وارد کنید">
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
                    <button type="submit"  class="btn btn-info">ویرایش</button>
                    <a type="submit" href="{{ route('admin.rule.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
