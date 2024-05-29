<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzanian Blood Donation Network Admin </title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Roboto', sans-serif;
            margin-top: 20px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 1rem;
        }
        
        label {
            margin-bottom: 0.5rem;
            color: #333;
        }
        
        input, button {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #333;
        }
        
        button {
            width: 100%;
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
        }
        
        .form-group input[type="checkbox"] {
            flex: initial;
            margin-left: 0.5rem;
        }

        .form-group label.checkbox-label {
            display: flex;
            align-items: center;
        }

        .error {
            color: red;
            margin-top: 0.5rem;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
</head>
<body>

    <div class="container">
        <form id="loginForm" action="{{ route('admin.login.submit') }}" method="post">
            @csrf
            <h2>Tanzanian Blood Donation Network (Admin)</h2>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label class="checkbox-label" for="remember">
                    <input type="checkbox" id="remember" name="remember" style="margin-right: 0.5rem;"> Remember me
                </label>
            </div>
            
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>

        <div class="error">
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
