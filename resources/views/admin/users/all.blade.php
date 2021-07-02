@component('admin.layouts.content', ['title' => 'همه کاربران'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
        <li class="breadcrumb-item active">همه کاربران</li>
    @endslot

    <h2>All Users</h2>

@endcomponent
