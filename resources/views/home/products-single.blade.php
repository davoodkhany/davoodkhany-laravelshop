@extends('layouts.app')

@section('script')
    <script>
        $('#sendComment').on('show.bs.modal', function(event) {
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

        @include('layouts.comment', ['comments' => $product->comments])



    </div>
    
    @endsection
