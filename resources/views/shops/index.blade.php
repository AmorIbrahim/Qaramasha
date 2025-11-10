@extends('layouts.app')

@section('title', 'Qaramasha - دليل كشري مصر')

@section('content')
<header class="hero" id="top">
    <span class="hero__eyebrow">دليل كشري مصر</span>
    <h1 class="hero__title">اكتشف أشهر محلات الكشري في القاهرة وضواحيها</h1>
    <p class="hero__subtitle">
        جمعنا لك مجموعة مختارة من مطاعم الكشري اللي لازم تجربها. لكل مطعم حكاية ونكهة مميزة،
        ومن هنا تقدر تختار المكان اللي يناسبك وتشوف التفاصيل لما تكون جاهز.
    </p>

    <div class="insight-banner">
        <span>📍</span>
        <span>مواقع دقيقة وعناوين سهلة — خلّي مشوار الكشري أقرب مما تتخيل</span>
    </div>

    <div class="hero__search">
        <input type="search" placeholder="دور على مطعمك المفضل..." aria-label="ابحث باسم محل الكشري" data-filter="shops">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                  stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
</header>

<main class="shop-grid" aria-label="قائمة محلات الكشري">
    @foreach ($shops as $shop)
        <article class="shop-card" data-shop-card data-shop-name="{{ mb_strtolower($shop['name']) }}">
            <img src="{{ $shop['image'] }}" alt="صورة تظهر أجواء مطعم {{ $shop['name'] }}" class="shop-card__image" loading="lazy">
            <div class="shop-card__body">
                <h2 class="shop-card__title">{{ $shop['name'] }}</h2>
                @isset($shop['owner'])
                    <p class="shop-card__owner">{{ $shop['owner'] }}</p>
                @endisset
                <p class="shop-card__address">{{ $shop['address'] }}</p>
                <a href="{{ url('/shops/' . $shop['slug']) }}" class="shop-card__cta" aria-label="عرض تفاصيل مطعم {{ $shop['name'] }}">
                    عرض التفاصيل
                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 5L7.5 10L12.5 15" stroke="currentColor" stroke-width="1.8"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </article>
    @endforeach
</main>

<p class="insight-banner" data-empty-state hidden>
    😔 للأسف مفيش نتائج بالاسم ده حالياً. جرّب تهجئة مختلفة أو اسم مختصر.
</p>

<footer class="site-footer">
    <div>
        <p class="site-footer__brand">Qaramasha</p>
        <p class="site-footer__text">
            دليل سريع لعشاق الكشري في القاهرة. نختار لك أفضل المحلات ونعرض تفاصيلها
            بشكل بسيط علشان تختار رحلتك التالية بثقة وسهولة.
        </p>
    </div>
    <nav class="site-footer__links">
        <a href="#top">العودة للأعلى</a>
        <a href="mailto:hello@qaramasha.com">تواصل معنا</a>
        <a href="https://maps.app.goo.gl/" target="_blank" rel="noopener">استكشف مواقع جديدة</a>
    </nav>
    <p class="site-footer__copyright">
        © {{ date('Y') }} Qaramasha. كل الحقوق محفوظة.
    </p>
</footer>
@endsection
