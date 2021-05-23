@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <div class="nav-pills card-header-pills nav">
                        <li class="nav-item">
                            <a href="{{ url('profile') }}" class="nav-link {{ request()->path() ===  'profile' ? 'active' : '' }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/profile/twofactor') }}" class="nav-link {{ request()->path() === 'profile/twofactor' ? 'active' : '' }}">TwoFactorAuth</a>
                        </li>
                    </div>
                </div>

                <div class="card-body">

                    @yield('main')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
