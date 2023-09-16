<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;


class MemberController extends Controller
{
    public function top(){
        //Memberテーブルに入っているレコードをすべて取得する
        $member = Member::all();
        \Log::channel('debug')->info($member);
        
        return view('top')->with([
            'member' => $member
        ]);

        
    }


    //登録画面
    public function register(){

        return view('register');
    }

    public function edit(Request $request){
        //リクエストのデータをlogに出力
        //\Log::channel('debug')->info($request->id);


    $member = Member::where('id', '=', $request->id)->first();

    return view('edit')->with([
        'member' => $member
    ]);
    
    }     


    public function memberRegister(Request $request){
        
        //新しくメンバーを追加する
        $member = new Member();
        $member->name = $request->name;
        $member->tel = $request->tel;
        $member->email = $request->email;
        $member->serve();

        return redirect('/top');
    }

    public function memberEdit(Request $request)
    {
        //既存のレコードを取得して編集してから保存する


    }
}

//test

class NextController extends Controller
{
    public function index()
    {
        $post_text = Request::input('post_text');
        return view('output', compact('post_text'));
    }
}


?>