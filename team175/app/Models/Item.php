<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Type;
class Item extends Model
{  
    use HasFactory;
    public function types(){
        return $this->belongsTo(Type::class);
    }

    public function getLists()
    {
        $results = DB::table('items')
        ->join('types', 'items.type', '=', 'types.id')
        ->select('items.id','items.name', 'types.type_name', 'items.detail')
        ->get();

        return $results;
    }

}