<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    @include('custom_header')
</head>
<body>

<div class="container-fluid h-100">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block">
        <div class="sidebar-sticky">
            <span class="nav-link active" style="color: inherit;">
                ようこそ　{{ $user->name }}
                メアド　{{ $user->email }}
            </span>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link nav-link">Sign out</button>
        </form>
    </div>
</div>

</body>
</html>