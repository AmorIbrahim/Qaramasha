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

    {{-- زرار العودة للأعلى --}}
    <button class="back-to-top" id="backToTop" aria-label="العودة للأعلى" title="العودة للأعلى">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

    {{-- ملف JavaScript --}}
    <script src="{{ asset('js/filter.js') }}"></script>

    <script>
        // زرار العودة للأعلى - يظهر ويختفي بانسيابية
        (function() {
            const backToTopBtn = document.getElementById('backToTop');
            const scrollThreshold = 300; // يظهر بعد scroll 300px

            function toggleBackToTop() {
                if (window.pageYOffset > scrollThreshold) {
                    backToTopBtn.classList.add('visible');
                } else {
                    backToTopBtn.classList.remove('visible');
                }
            }

            // تحقق من موضع التمرير
            window.addEventListener('scroll', toggleBackToTop);
            
            // تحقق عند تحميل الصفحة
            toggleBackToTop();

            // وظيفة العودة للأعلى بانسيابية
            backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        })();

        // معرض الصور
        const gallery = document.getElementById('gallery-scroll');
        
        if (gallery) {
            // نكرر الصور عشان نعمل loop لا نهائي
            const originalHTML = gallery.innerHTML;
            gallery.innerHTML = originalHTML + originalHTML + originalHTML + originalHTML + originalHTML + originalHTML
                + originalHTML + originalHTML + originalHTML + originalHTML + originalHTML
                + originalHTML + originalHTML + originalHTML + originalHTML + originalHTML;

            let scrollSpeed = -1.5; // السرعة
            let autoScrollInterval;
            let isUserScrolling = false;
            let scrollTimeout;
            let isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

            function startAutoScroll() {
                // لو المستخدم بيسكرول يدوياً، ما نبدأش الـ auto-scroll
                if (isUserScrolling || (isTouchDevice && window.innerWidth <= 768)) {
                    return;
                }
                
                if (autoScrollInterval) return; // لو شغال خلاص، ما نضيفش interval تاني
                
                autoScrollInterval = setInterval(() => {
                    if (!isUserScrolling && gallery) {
                        gallery.scrollLeft += scrollSpeed;
                        if (gallery.scrollLeft >= gallery.scrollWidth / 2) {
                            gallery.scrollLeft = 0;
                        }
                    }
                }, 15);
            }

            function stopAutoScroll() {
                if (autoScrollInterval) {
                    clearInterval(autoScrollInterval);
                    autoScrollInterval = null;
                }
            }

            function handleUserScrollStart() {
                isUserScrolling = true;
                stopAutoScroll();
                
                // نخلي الـ timeout علشان نرجع نبدأ الـ auto-scroll بعد ما المستخدم يخلص
                clearTimeout(scrollTimeout);
            }

            function handleUserScrollEnd() {
                // بعد ثانيتين من آخر scroll، نرجع نبدأ الـ auto-scroll
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    isUserScrolling = false;
                    // على الموبايل، ما نبدأش الـ auto-scroll
                    if (!isTouchDevice || window.innerWidth > 768) {
                        startAutoScroll();
                    }
                }, 2000);
            }

            // على الموبايل: نوقف الـ auto-scroll لما المستخدم يلمس
            if (isTouchDevice) {
                gallery.addEventListener('touchstart', handleUserScrollStart, { passive: true });
                gallery.addEventListener('touchmove', handleUserScrollStart, { passive: true });
                gallery.addEventListener('touchend', handleUserScrollEnd, { passive: true });
            }

            // على الديسكتوب: نوقف لما الماوس يدخل
            gallery.addEventListener('mouseenter', stopAutoScroll);
            gallery.addEventListener('mouseleave', () => {
                if (!isUserScrolling) {
                    startAutoScroll();
                }
            });

            // نتتبع أي scroll يدوي
            let scrollTimeout2;
            gallery.addEventListener('scroll', () => {
                if (!isUserScrolling) {
                    handleUserScrollStart();
                }
                clearTimeout(scrollTimeout2);
                scrollTimeout2 = setTimeout(handleUserScrollEnd, 150);
            }, { passive: true });

            // نبدأ الـ auto-scroll بس على الشاشات الكبيرة
            if (!isTouchDevice || window.innerWidth > 768) {
                startAutoScroll();
            }
        }
    </script>



</body>
</html>
