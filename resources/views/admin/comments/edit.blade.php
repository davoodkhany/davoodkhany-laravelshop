@component('admin.layouts.content', ['title' => 'ویرایش نظر جدید'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">لیست نظرات</a></li>
        <li class="breadcrumb-item">ویرایش نظر</li>

    @endslot

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                @include('admin.layouts.errors')
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.comments.update', $comment)}}">
                    @csrf
                    @method('PATCH')

                  <div class="card-body">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">نام</label>
                        <textarea class="form-control" name="comment"  >{{ $comment->comment}}</textarea>
                    </div>

                    <input type="hidden" name="commentable_id" value="{{ $comment->id}}"/>
                    <input type="hidden" name="commentable_type" value="{{ get_class($comment)}}"/>
                    <input type="hidden" name="parent_id" value="{{ $comment->parent_id }}"/>


                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit"  class="btn btn-info">ویرایش</button>
                    <a type="submit" href="{{ route('admin.comments.index') }}"  class="float-left btn btn-default">لغو</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
