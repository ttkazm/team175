<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

use App\Http\Controllers\Controller;
use Faker\Test\Provider\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Requests\ItemPostRequest;
use App\Models\Type;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * アイテム一覧
     * 
     * @param Request $request
     * @return Response $response
     */

     public function index(Request $request)
     {
        $items = Item::orderBy('created_at','asc')->get();
        $keyword = $request->input('keyword');
        $this->items = new Item();
        $results = $this->items-> getLists();

        return view('items.index',[
            'items' => $items,
            'keyword' => $keyword,
            'results' => $results
        ]);
     }

     public function KeySearch(Request $request)
     {        
        $keyword = $request->input('keyword');

        $request->validate(
            [
            'keyword' => 'required'
            ],
            [
            'keyword.required' => 'キーワードが空欄です',
            ]);
    
        if(isset($keyword)){
            $results = Item::where("name","LIKE","%$keyword%")
            ->orWhere('detail',"LIKE","%$keyword%")
            ->join('types', 'items.type', '=', 'types.id')
            ->select('items.id','items.name', 'types.type_name', 'items.detail')
            ->orderBy('items.created_at','asc')->get();
        }

        if($keyword == "バーガー"){
            $results = Item::where('type','=',10)
            ->join('types', 'items.type', '=', 'types.id')
            ->select('items.id','items.name', 'types.type_name', 'items.detail')
            ->orderBy('items.created_at','asc')->get();
        }
            elseif($keyword == "サイド"){
                $results = Item::where('type','=',20)
                ->join('types', 'items.type', '=', 'types.id')
                ->select('items.id','items.name', 'types.type_name', 'items.detail')
                ->orderBy('items.created_at','asc')->get();
            }

            elseif($keyword == "ドリンク"){
                $results = Item::where('type','=',30)
                ->join('types', 'items.type', '=', 'types.id')
                ->select('items.id','items.name', 'types.type_name', 'items.detail')
                ->orderBy('items.created_at','asc')->get();
            }
            elseif($keyword == "セット"){
                $results = Item::where('type','=',40)
                ->join('types', 'items.type', '=', 'types.id')
                ->select('items.id','items.name', 'types.type_name', 'items.detail')
                ->orderBy('items.created_at','asc')->get();
            }

        return view('items.index',[
            'keyword' => $keyword,
            'results' => $results
        ]);
     }

     public function search(Request $request)
     {
        $this->items = new Item();
        $results = $this->items-> getLists();

        return view('items.index',[
            'results' => $results
        ]);
     }

}
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
