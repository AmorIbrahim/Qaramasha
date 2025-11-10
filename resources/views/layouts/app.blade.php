<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Qaramasha')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- ملف CSS الرئيسي --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="page-wrapper">
        @yield('content')
    </div>

    {{-- ملف JavaScript --}}
    <script src="{{ asset('js/filter.js') }}"></script>

    <script>
        const gallery = document.getElementById('gallery-scroll');

        // نكرر الصور عشان نعمل loop لا نهائي
        // gallery.innerHTML += gallery.innerHTML;
        const originalHTML = gallery.innerHTML;
        gallery.innerHTML = originalHTML + originalHTML + originalHTML+ originalHTML+ originalHTML+ originalHTML
        + originalHTML + originalHTML+ originalHTML+ originalHTML+ originalHTML
        + originalHTML + originalHTML+ originalHTML+ originalHTML+ originalHTML;

        let scrollSpeed = -1.5; // السرعة
        let autoScrollInterval;

        function startAutoScroll() {
        autoScrollInterval = setInterval(() => {
            gallery.scrollLeft += scrollSpeed;
            if (gallery.scrollLeft >= gallery.scrollWidth / 2) {
            gallery.scrollLeft = 0;
            }
        }, 15);
        }

        function stopAutoScroll() {
        clearInterval(autoScrollInterval);
        }


        startAutoScroll();

        // لما الماوس يدخل يوقف الحركة
        gallery.addEventListener('mouseenter', stopAutoScroll);
        gallery.addEventListener('mouseleave', startAutoScroll);
    </script>



</body>
</html>
