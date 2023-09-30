<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\View\Middleware\ShareErrorsFromSession;


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