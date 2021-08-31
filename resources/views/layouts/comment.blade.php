<div class="___class_+?0___">
    @auth

        <div class="modal fade" id="sendComment">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ارسال نظر</h5>
                        <button type="button" class="ml-0 mr-auto close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('comment.send') }}" id="sendCommentForm">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="commentable_id" value="{{ $product->id }}">
                            <input type="hidden" name="commentable_type" value="{{ get_class($product) }}">
                            <input type="hidden" name='parent_id' value="0">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">پیام دیدگاه:</label>
                                <textarea class="form-control" name="comment" id="message-text"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                            <button type="submit" class="btn btn-primary">ارسال نظر</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="mt-4">بخش نظرات</h4>
                <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sendComment"
                    data-id="{{ $product->id }}" data-type="product">ثبت نظر جدید</span>
            </div>
        </div>
    @endauth

    @foreach ($comments as $comment)

        @if ($comment->parent_id == 0)

            <div class="card {{ !$loop->last ? 'mb-3' : '' }}">

                <div class="card-header d-flex justify-content-between">
                    <div class="commenter">
                        <span>{{ $comment->user->name }}</span>
                        <span class="text-muted"></span>
                    </div>
                    <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sendComment"
                        data-id="{{ $comment->id }}" data-type="product">پاسخ به نظر</span>
                </div>

                <div class="card-body">
                    {{ $comment->comment }}

                    @include('layouts.comment', ['comments' => $comment->child()])

                </div>

            </div>
</div>
@endif
@endforeach

