<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $shops = [
        'Sultan_marg' => [
            'name' => 'كشري السلطان',
            'fullAddress' => 'المرج - فرع الشارع الجديد الشرفا - بجوار محطة بنزين سوفيانة',
            'shortAddress' => 'المرج فرع الشارع الجديد الشرفا',
            'slug' => 'Sultan_marg',
            'image' => 'images/Sultan_marg/Sul_marg1.jpg',
            'menuImage' => 'images/Sultan_marg/Sul_marg4.jpg',
            'deliveryNumbers' => ['01112615606', '01107742345'],
        ],
        'Sul_alarb3en' => [
            'name' => 'كشري السلطان',
            'fullAddress' => 'سيجال - فرع شارع الأربعين - بجوار كافيه نيو',
            'shortAddress' => 'فرع ش الأربعين - سيجال',
            'slug' => 'Sul_alarb3en',
            'image' => 'images/Sultan_Alarb3en/Sul1.jpg',
            'menuImage' => 'images/Sultan_Alarb3en/menu.jpg',
            'deliveryNumbers' => ['01112615606', '01107742345'],
        ],
        'Especo' => [
            'name' => 'كشري السلطان',
            'fullAddress' => 'اسبيكو - فرع الدقي - بجوار مسجد الحي',
            'shortAddress' => 'فرع اسبيكو',
            'slug' => 'Especo',
            'image' => 'images/Especo/Sul1.jpg',
            'menuImage' => 'images/Especo/menu.jpg',
            'deliveryNumbers' => ['01112615606', '01107742345'],
        ],
        'Alorsha' => [
            'name' => 'كشري السلطان',
            'fullAddress' => 'المرج - فرع شارع الورشة - بجوار الخدمات الحكومية',
            'shortAddress' => 'فرع شارع الورشة المرج',
            'slug' => 'Alorsha',
            'image' => 'images/Alorsha/Sul1.jpg',
            'menuImage' => 'images/Alorsha/menu.jpg',
            'deliveryNumbers' => ['01112615606', '01107742345'],
        ],
    ];

    public function index() {
        $shops = [];
        foreach ($this->shops as $shopData) {
            $shops[] = [
                'name' => $shopData['name'],
                'address' => $shopData['shortAddress'],
                'slug' => $shopData['slug'],
                'image' => asset($shopData['image']),
            ];
        }

        return view('shops.index', compact('shops'));
    }

    public function show($slug) {
        if (!isset($this->shops[$slug])) {
            abort(404, 'المحل غير موجود');
        }

        $shop = $this->shops[$slug];
        $shop['image'] = asset($shop['image']);
        $shop['menuImage'] = asset($shop['menuImage']);

        return view('shops.show', compact('shop'));
    }
}
