@extends('admin.app')

@section('content')
 <!-- Login Page -->
    <div id="login-page" class="login-container">
        <div class="login-box">
            <div class="login-logo">
                <i class="fas fa-church"></i>
                <h1>Church Ministry Admin</h1>
                <p>Login to access the dashboard</p>
            </div>
            <form id="login-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-login">Login</button>
            </form>
            <div style="margin-top: 20px; color: #777; font-size: 14px;">
                <p>Demo credentials: admin / password123</p>
            </div>
        </div>
    </div>

@endsection