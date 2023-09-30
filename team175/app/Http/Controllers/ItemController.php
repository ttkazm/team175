<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Faker\Test\Provider\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Requests\ItemPostRequest;
use App\Models\Type;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * 商品登録画面を表示
     */
    public function show(): View
    {
        return view('items/register');
    }

    /**
     * 商品種別を取得して、登録画面に返す
     */
    public function types()
    {
        // 商品種別一覧を取得
        $types = Type::all();

        // 商品種別一覧をレスポンスとして返す
        return view('items/store', [
            'types' => $types,
        ]);
    }

    /**
     * 
     */
    public function store(ItemPostRequest $request)
    {
        // 商品登録用のオブジェクトを生成する
        $item = new Item();

        // リクエストオブジェクトからパラメータを取得
        $item->type = $request->type_id;
        $item->user_id = rand(1, 3);
        $item->name = $request->name;
        $item->detail = $request->detail;

        if (isset($item->name)){
            // 保存
            $item->save();
        }

        // 登録完了後、登録画面に戻る
        return redirect(route('store'));

    }
}
