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
        <div id="alert-container"></div> <!-- برای نمایش پیام‌ها -->

        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form id="signup-form" method="POST" action="/signup"> <!-- مسیر ثبت‌نام -->
                @csrf
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="User name" required>
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
        
                <button type="submit">Sign up</button>
            </form>
        </div>

        <div class="login">
            <form id="login-form" method="POST" action="/login"> 
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault(); // جلوگیری از ارسال پیش‌فرض فرم
                var formData = $(this).serialize(); // داده‌های فرم را جمع‌آوری کنید

                $.ajax({
                    url: $(this).attr('action'), // آدرس ارسال درخواست
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // در صورت موفقیت
                        $('#alert-container').html('<div class="alert alert-success">' + response.message + '</div>');
                    },
                    error: function(xhr) {
                        // در صورت خطا
                        var errorMessage = xhr.responseJSON.error || 'لطفا اول ثبت نام کنید چون چیزی داخل دیتا بیس با این ایمیل پیدا نکردیم  .';
                        $('#alert-container').html('<div class="alert alert-danger">' + errorMessage + '</div>');
                    }
                });
            });
        });
    </script>

    <style>
        #alert-container {
            margin-bottom: 20px;
        }
        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</body>
</html>