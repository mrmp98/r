
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Navbar</title>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    @vite('resources/css/loginpage.css')
</head>
<body>
    <div class="main">  
        @if (session('success'))
            <script>
                $(document).ready(function() {
                    alert("{{ session('success') }}");
                });
            </script>
        @endif

        @if ($errors->any())
            <script>
                $(document).ready(function() {
                    @foreach ($errors->all() as $error)
                        alert("{{ $error }}");
                    @endforeach
                });
            </script>
        @endif

        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="POST"> <!-- مسیر ثبت‌نام -->
                @csrf
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="User name" required>
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="email" name="email" placeholder="Email"  required>
                <input type="password" name="password" placeholder="Password" required>
                <div>
        <label for="captcha">CAPTCHA</label>
        <img src="{{ captcha_src() }}" alt="CAPTCHA">
        <input type="text" name="captcha" id="captcha" required>
    </div>
                <button type="submit">Sign up</button>
            </form>
        </div>

        <div class="login">
            <form method="POST" > <!-- مسیر ورود -->
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>