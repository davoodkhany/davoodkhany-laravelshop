@extends('profile.layouts')

    @section('main')
        <h5>token code</h5>
        <hr>
        <form class="form" method="post" action="{{ route('phoneverify.2f.auth') }}">
            @csrf
            <div class="form-group">
                <label for="">token</label>
                <input class="form-control @error('token') is-invalid @enderror" type="text" name="token">

                @error('token')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary"type="submit">Verify</button>
            </div>
        </form>

    @endsection
