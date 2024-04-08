<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzanian Blood Donation Network Registration</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
</head>
<body>
    <div class="container">
       <!-- Registration Form -->
<form method="POST" action="{{ route('register') }}">
    @csrf
    <h2>Register for Blood Donation</h2>
    
    <!-- Personal Information -->
    <div class="form-group">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
    </div>
    
    <!-- Contact Information -->
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>
    </div>
    
    <!-- Health Information -->
    <div class="form-group">
        <label for="blood_type">Blood Type:</label>
        <select id="blood_type" name="blood_type" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    
    <!-- Submit Button -->
    <div class="form-group">
        <button type="submit">Register</button>
    </div>
    <div class="form-group">
        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    </div>
</form>

    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
