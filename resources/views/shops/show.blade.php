@extends('layouts.app')

@section('title', 'تفاصيل ' . $shop['name'])

@section('content')
<!-- ← رابط العودة للرئيسية -->
<a href="/" class="back-link">
    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.5 5L12.5 10L7.5 15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    العودة للرئيسية
</a>

<article class="shop-details">
    <!-- الصورة الرئيسية للمحل -->
    <div class="shop-details__image-container">
        <img src="{{ $shop['image'] }}" alt="صورة مطعم {{ $shop['name'] }}" class="shop-details__image">
    </div>

    <!-- تفاصيل المحل -->
    <div class="shop-details__content">
        <h1 class="shop-details__title">{{ $shop['name'] }}</h1>

        <!-- العنوان الكامل -->
        <div class="shop-details__section">
            <h2 class="shop-details__section-title">📍 العنوان الكامل</h2>
            <p class="shop-details__address">{{ $shop['fullAddress'] }}</p>
        </div>

        <!-- أرقام الدليفري -->
        <div class="shop-details__section">
            <h2 class="shop-details__section-title">📞 أرقام الدليفري</h2>
            <div class="shop-details__delivery-numbers">
                @foreach ($shop['deliveryNumbers'] as $number)
                    <a href="tel:+20{{ substr($number, 1) }}" class="delivery-number">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        </svg>
                        {{ $number }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- صورة المنيو -->
        <div class="shop-details__section">
            <h2 class="shop-details__section-title">🍽️ المنيو</h2>
            <div class="shop-details__menu-container">
                <img src="{{ $shop['menuImage'] }}" alt="منيو مطعم {{ $shop['name'] }}" class="shop-details__menu-image">
            </div>
        </div>
    </div>
</article>

<footer class="site-footer">
    <div>
        <p class="site-footer__brand">قرمشة</p>
        <p class="site-footer__text">
            الكشري من غير قرمشة؟ زي السينما من غير فشار 😅<br>
            اكتشف أحسن محلات الكشري اللي بتقدملك التجربة الكاملة — رز، صلصة، دقة، وقرمشة تفتح النفس من أول لقمة 🔥✨
        </p>
    </div>

    <div class="site-footer__contacts">
        <p class="site-footer__text">
            🔝 <a href="#top">العودة للأعلى</a><br>
            🌐 <a href="https://www.facebook.com/share/17nZYHi8qd/" target="_blank" rel="noopener">
                صفحتنا على فيسبوك
            </a><br>
            📞 <strong>الإدارة:</strong> <a href="tel:201112615606">01112615606</a><br>
            ☎️ <strong>خدمة العملاء:</strong> <a href="tel:201107742345">01107742345</a>
        </p>
    </div>

    <p class="site-footer__copyright">
        © {{ date('Y') }} كل الحقوق محفوظة — <strong>قرمشة</strong>.
    </p>
</footer>
@endsection
