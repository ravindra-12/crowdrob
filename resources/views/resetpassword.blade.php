<!-- resources/views/resetpassword.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>

    <form method="POST" action="{{ route('resetyourpassword') }}">
        @csrf
        @method('POST')
        <div>
            <input type="text" id="Token" name="token" value="{{ $data['token'] }}" hidden>
        </div>

        <div>
            {{-- <label for="password">Email:</label> --}}
            <input type="text" id="Email" name="email" value="{{ $data['email'] }}" hidden>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
       
        <div>
            <label for="password">ConfirmPassword:</label>
            <input type="password" id="ConfirmPassword" name="ConfirmPassword" required>
        </div>
        
        <button type="submit">Reset Password</button>
    </form>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            form.addEventListener('submit', function (event) {
                const password = document.getElementById('password').value;
                const passwordConfirmation = document.getElementById('ConfirmPassword').value;

                if (password !== passwordConfirmation) {
                    event.preventDefault();
                    alert('Passwords do not match');
                }
            });
        });
    </script> --}}
</body>
</html>