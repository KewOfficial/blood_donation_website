<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzanian Blood Donation Network Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
</head>
<body>

    <div class="container">
        <form id="loginForm" action="{{ route('login') }}" method="post">
            @csrf
            <h2>Login to Blood Donation Network</h2>
            
            <!-- Account Credentials -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <!-- Remember Me -->
            <div class="form-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            
            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
