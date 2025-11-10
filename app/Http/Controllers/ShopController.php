<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $shops = [
            [
                'name' => 'كشري السلطان',
                'address' => 'المرج فرع الشارع الجديد الشرفا',
                'slug' => 'Sultan_marg',
                'image' => asset('images/Sultan_marg/Sul_marg1.jpg'),
                // 'owner' => 'الحاج أبو طارق',
            ],
            [
                'name' => 'كشري السلطان',
                'address' => 'فرع ش الأربعين - سيجال',
                'slug' => 'Sul_alarb3en',
                'image' => asset('images/Sultan_Alarb3en/Sul1.jpg'),
            ],
            [
                'name' => 'كشري السلطان',
                'address' => ' فرع اسبيكو',
                'slug' => 'ُEspeco',
                'image' => asset('images/Especo/Sul1.jpg'),
            ],
            [
                'name' => 'كشري السلطان',
                'address' => 'فرع شارع الورشة المرج',
                'slug' => 'Alorsha',
                'image' => asset('images/Alorsha/Sul1.jpg'),
            ],
        ];

        return view('shops.index', compact('shops'));
    }

}
