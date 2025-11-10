<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $shops = [
        [
            'name' => 'كشري أبو طارق',
            'address' => 'شارع طلعت حرب، وسط البلد، القاهرة',
            'slug' => 'abo-tarek',
            'image' => 'https://images.unsplash.com/photo-1543353071-873f17a7a088?auto=format&fit=crop&w=800&q=80',
            'owner' => 'الحاج أبو طارق',
        ],
        [
            'name' => 'كشري التحرير',
            'address' => 'ميدان التحرير، وسط البلد، القاهرة',
            'slug' => 'eltahreer',
            'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80',
            'owner' => 'محمود عبد العزيز',
        ],
        [
            'name' => 'كشري أم حسن',
            'address' => 'شارع التسعين، التجمع الخامس، القاهرة الجديدة',
            'slug' => 'om-hassan',
            'image' => 'https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd?auto=format&fit=crop&w=800&q=80',
            'owner' => 'أم حسن عبد العاطي',
        ],
        [
            'name' => 'كشري هند',
            'address' => 'شارع الحجاز، مصر الجديدة، القاهرة',
            'slug' => 'hend-koshary',
            'image' => 'https://images.unsplash.com/photo-1484980972926-edee96e0960d?auto=format&fit=crop&w=800&q=80',
            'owner' => 'هند فوزي',
        ],
    ];

    return view('welcome', compact('shops'));
});
