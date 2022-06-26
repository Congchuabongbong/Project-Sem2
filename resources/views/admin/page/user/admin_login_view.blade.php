<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="/dist/css/admin_pages/admin_login_view.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="login-box">
    <h2>Wiki Mobile</h2>
    <h2>Admin Login</h2>
    <form name="login-form" id="login-form">
        @csrf
        <div class="user-box">
            <input type="email" name="email" placeholder="Email">
            <label>Account</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" placeholder="Password">
            <label>Password</label>
        </div>
        <a id="btnSubmit" class="mouseEffect">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
        </a>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/dist/js/pages/user/admin_login.js"></script>
</body>
</html>
