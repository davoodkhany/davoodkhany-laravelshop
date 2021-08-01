@extends('layouts.app')


@section('content')


<div class="container">
    <div class="col-12">



@foreach ($products->chunk(4) as $row)

<div class="row">

    @foreach($row as $product)


    <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <a href="/products/{{ $product->id }}" class="btn btn-primary">نمایش محصول</a>
          </div>
        </div>
      </div>


  @endforeach
</div>
  @endforeach
</div>
</div>
@endsection
