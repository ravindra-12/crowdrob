<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('forgot-password.submit') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
