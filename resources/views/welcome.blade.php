<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Qaramasha</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            *, *::before, *::after {
                box-sizing: border-box;
            }

            body {
                font-family: 'Cairo', 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                background: linear-gradient(180deg, #fff9ef 0%, #fff4de 60%, #fff 100%);
                color: #2d2613;
                margin: 0;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                direction: rtl;
            }

            img {
                max-width: 100%;
                display: block;
            }

            a {
                color: inherit;
            }

            a:focus-visible {
                outline: 3px solid rgba(255, 159, 28, 0.4);
                outline-offset: 3px;
            }

            .page-wrapper {
                width: min(1100px, calc(100% - 3rem));
                margin: 0 auto;
                padding: 3.5rem 0 4.5rem;
                display: flex;
                flex-direction: column;
                gap: 3rem;
            }

            .hero {
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.75rem;
            }

            .hero__eyebrow {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.4rem 1.1rem;
                border-radius: 999px;
                background: rgba(255, 180, 70, 0.25);
                color: #aa5c00;
                font-size: 0.95rem;
                font-weight: 600;
                letter-spacing: 0.02em;
            }

            .hero__title {
                font-size: clamp(2.1rem, 5vw, 3.1rem);
                margin: 0;
                font-weight: 700;
                line-height: 1.3;
            }

            .hero__subtitle {
                font-size: 1.05rem;
                color: #5d5544;
                max-width: 640px;
                line-height: 1.9;
                margin: 0;
            }

            .hero__search {
                margin-top: 1.4rem;
                width: min(420px, 100%);
                position: relative;
            }

            .hero__search input {
                width: 100%;
                padding: 0.85rem 1rem 0.85rem 3rem;
                border-radius: 14px;
                border: 1px solid rgba(45, 38, 19, 0.16);
                background: #fff;
                font-size: 1rem;
                font-family: inherit;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
                text-align: right;
            }

            .hero__search input:focus {
                border-color: rgba(255, 145, 41, 0.6);
                box-shadow: 0 0 0 4px rgba(255, 145, 41, 0.12);
                outline: none;
            }

            .hero__search svg {
                position: absolute;
                left: 1.1rem;
                top: 50%;
                transform: translateY(-50%);
                width: 1.2rem;
                height: 1.2rem;
                color: rgba(45, 38, 19, 0.45);
            }

            .insight-banner {
                display: inline-flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.6rem 1.4rem;
                border-radius: 14px;
                background: rgba(45, 38, 19, 0.08);
                color: #4a3f27;
                font-size: 0.9rem;
                font-weight: 500;
                margin-top: 0.75rem;
            }

            .shop-grid {
                display: flex;
                flex-wrap: wrap;
                gap: 1.8rem;
                justify-content: flex-start;
            }

            .shop-card {
                background: #ffffff;
                border-radius: 22px;
                box-shadow: 0 24px 50px rgba(45, 38, 19, 0.08);
                overflow: hidden;
                display: flex;
                flex-direction: column;
                transition: transform 0.35s ease, box-shadow 0.35s ease;
                flex: 0 0 calc((100% - (1.8rem * 3)) / 4);
                max-width: calc((100% - (1.8rem * 3)) / 4);
            }

            .shop-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 30px 60px rgba(45, 38, 19, 0.12);
            }

            .shop-card__image {
                aspect-ratio: 4 / 3;
                width: 100%;
                object-fit: cover;
            }

            .shop-card__body {
                padding: 1.65rem 1.85rem 1.85rem;
                display: flex;
                flex-direction: column;
                flex: 1;
            }

            .shop-card__title {
                font-size: 1.4rem;
                margin: 0 0 0.8rem;
                color: #2d2613;
                font-weight: 700;
            }

            .shop-card__owner {
                font-size: 0.92rem;
                color: #a1762f;
                font-weight: 600;
                margin: 0 0 0.9rem;
                display: inline-flex;
                align-items: center;
                gap: 0.4rem;
            }

            .shop-card__owner::before {
                content: '👨‍🍳';
                font-size: 1rem;
            }

            .shop-card__address {
                font-size: 0.98rem;
                color: #6e6654;
                margin: 0 0 1.85rem;
                line-height: 1.7;
            }

            .shop-card__cta {
                margin-top: auto;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.55rem;
                padding: 0.7rem 1.6rem;
                border-radius: 14px;
                border: none;
                background: linear-gradient(135deg, #ff9f1c, #ff6f00);
                color: #fff;
                font-size: 0.96rem;
                font-weight: 600;
                text-decoration: none;
                box-shadow: 0 12px 24px rgba(255, 145, 41, 0.25);
                transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            }

            .shop-card__cta:hover {
                transform: translateY(-2px);
                background: linear-gradient(135deg, #ffb347, #ff7d1a);
                box-shadow: 0 16px 30px rgba(255, 140, 25, 0.28);
            }

            .shop-card__cta svg {
                width: 1rem;
                height: 1rem;
            }

            @media (max-width: 720px) {
                .page-wrapper {
                    width: calc(100% - 2.4rem);
                    padding: 2.75rem 0 3.5rem;
                    gap: 2.5rem;
                }

                .hero__subtitle {
                    font-size: 1rem;
                }

                .insight-banner {
                    font-size: 0.85rem;
                }

                .shop-card__body {
                    padding: 1.35rem 1.5rem 1.6rem;
                }

                .shop-card {
                    flex: 0 0 100%;
                    max-width: 100%;
                }
            }

            @media (max-width: 1200px) and (min-width: 901px) {
                .shop-card {
                    flex: 0 0 calc((100% - (1.8rem * 2)) / 3);
                    max-width: calc((100% - (1.8rem * 2)) / 3);
                }
            }

            @media (max-width: 900px) and (min-width: 601px) {
                .shop-card {
                    flex: 0 0 calc((100% - 1.8rem) / 2);
                    max-width: calc((100% - 1.8rem) / 2);
                }
            }
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            <header class="hero">
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
                    <input
                        type="search"
                        placeholder="دور على مطعمك المفضل..."
                        aria-label="ابحث باسم محل الكشري"
                        data-filter="shops"
                    >
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                            stroke="currentColor"
                            stroke-width="1.6"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>
            </header>

            <main class="shop-grid" aria-label="قائمة محلات الكشري">
                @foreach ($shops as $shop)
                    <article
                        class="shop-card"
                        data-shop-card
                        data-shop-name="{{ mb_strtolower($shop['name']) }}"
                    >
                        <img
                            src="{{ $shop['image'] }}"
                            alt="صورة تظهر أجواء مطعم {{ $shop['name'] }}"
                            class="shop-card__image"
                            loading="lazy"
                        >
                        <div class="shop-card__body">
                            <h2 class="shop-card__title">{{ $shop['name'] }}</h2>
                            @isset($shop['owner'])
                                <p class="shop-card__owner">{{ $shop['owner'] }}</p>
                            @endisset
                            <p class="shop-card__address">{{ $shop['address'] }}</p>
                            <a
                                href="{{ url('/shops/' . $shop['slug']) }}"
                                class="shop-card__cta"
                                aria-label="عرض تفاصيل مطعم {{ $shop['name'] }}"
                            >
                                عرض التفاصيل
                                <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M12.5 5L7.5 10L12.5 15"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </main>
            <p class="insight-banner" data-empty-state hidden>
                😔 للأسف مفيش نتائج بالاسم ده حالياً. جرّب تهجئة مختلفة أو اسم مختصر.
            </p>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const searchInput = document.querySelector('[data-filter="shops"]');
                if (!searchInput) return;

                const cards = Array.from(document.querySelectorAll('[data-shop-card]'));
                const emptyState = document.querySelector('[data-empty-state]');

                const toggleEmptyState = () => {
                    if (!emptyState) return;
                    const hasVisible = cards.some((card) => card.style.display !== 'none');
                    emptyState.hidden = hasVisible;
                };

                searchInput.addEventListener('input', function () {
                    const term = this.value.trim().toLowerCase();

                    cards.forEach((card) => {
                        const name = card.getAttribute('data-shop-name') || '';
                        const match = name.includes(term);
                        card.style.display = match ? '' : 'none';
                    });

                    toggleEmptyState();
                });
            });
        </script>
    </body>
</html>

