@extends('profile.layouts')

    @section('main')
        <h5>Two factor Auth</h5>
        <hr>
        <form class="form" method="post" action="{{ route('posttwofactor') }}">
            @csrf
            <div class="form-group">
                <label for="">type</label>
                <select class="form-control" name="type">
                    @foreach(config('twofactorauth.types') as $key => $value)
                    <option value = "{{ $key }}">{{ $value }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Phone</label>
                <input class="form-control" type="text" name="phone" value="{{ old('phone') ?? (auth()->user()->phone) }}">
                @error('phone')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary"type="submit">update</button>
            </div>
        </form>

    @endsection
