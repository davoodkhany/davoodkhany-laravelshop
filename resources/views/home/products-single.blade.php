@extends('layouts.app')

@section('script')
    <script>

        $('#sendComment').on('show.bs.modal', function (event) {
            console.log(event)
            var button = $(event.relatedTarget)
            let parent_id = button.data('id');
            console.log(parent_id);
            var modal = $(this)
            modal.find('input[name="parent_id"]').val(parent_id);
        })

        // document.querySelector('#sendCommentForm').addEventListener('submit', function(event) {
        //     event.preventDefault();
        //     let target = event.target;

        //     //console.log(target.querySelector('input[name="commentable_id"]').value);
        //     //  console.log(document.head.querySelector('meta[name="csrf-token"]').content);



        //     let data = {

        //         commentable_id: target.querySelector('input[name="commentable_id"]').value,
        //         commentable_type: target.querySelector('input[name="commentable_type"]').value,

        //         parent_id: target.querySelector('input[name="parent_id"]').value,

        //         comment: target.querySelector('textarea[name="comment"]').value
        //     }

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        //             'Content-Type': 'application/json'
        //         }
        //     })



        //     $.ajax({

        //         type: "POST",

        //         url: '/comments',

        //         data: JSON.stringify(data),

        //         success: function(data) {
        //             console.log(data);
        //         }

        //     })


            //   document.getElementById('#sendComment').style.display=none;



        // });
    </script>
@endsection

@section('content')

    <div class="container">
        @guest
            <div class="alert alert-danger">
                <span>لطفا برای ثبت نظر وارد شوید</span>
            </div>
        @endguest
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 card">
                    <div class="card-header">
                        {{ $product->title }}
                    </div>

                    <div class="card-body">
                        {{ $product->description }}
                    </div>
                </div>
            </div>
        </div>


        <div class="">
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
                        <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sendComment" data-id="{{ $product->id }}"
                            data-type="product">ثبت نظر جدید</span>
                    </div>
                </div>
            @endauth

                @foreach ($product->comments as $comment)

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
                                @foreach ($comment->Child as $child)
                                    <div class="mt-3 card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="commenter">
                                                <span>نام نظردهنده</span>
                                                <span class="text-muted">- دو دقیقه قبل</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{ $child->comment }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    @endif
                @endforeach
            </div>
        </div>

    </div>


@endsection
