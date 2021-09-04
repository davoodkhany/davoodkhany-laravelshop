@component('admin.layouts.content', ['title' => 'همه نظرات'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
        <li class="breadcrumb-item active">همه نظرات</li>
    @endslot

    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">جدول نظرات</h3>

              <div class="card-tools ">
                <div class="input-group input-group-sm" >
                    <form action="" class="d-flex">
                        <input type="text" name="search" class="float-right form-control"  placeholder="جستجو">
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                    </form>



                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="p-0 card-body table-responsive">
              <table class="table table-hover">
                <tbody><tr>
                  <th>آی دی نطر</th>
                  <th>نام </th>
                  <th>متن</th>
                  <th>دلیل</th>
                </tr>

                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->comment }}</td>

                    <td class="d-flex">
                        <form method="post" action="{{ route('admin.comments.destroy', $comment) }}">
                            @csrf
                            @method('DELETE')
                            <button href="#" class="btn btn-sm btn-danger">حذف</button>
                        </form>


                            <a href="{{ route('admin.comments.edit' , $comment) }}" class="btn btn-sm btn-primary">ویرایش</a>

                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $comments->render() }}
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>

@endcomponent
