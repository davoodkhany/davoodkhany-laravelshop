@extends('profile.layouts')

    @section('main')
        <h5>Two Factor Auth</h5>
        <hr>
        <form class="form" method="post" action="{{ route('2fa.token') }}">
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
