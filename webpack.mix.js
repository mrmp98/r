const mix = require('laravel-mix');

// پیکربندی دارایی‌ها
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css') // اگر از Sass استفاده می‌کنید
   .css('resources/css/app.css', 'public/css') // برای CSS
   .version(); // برای مدیریت کش