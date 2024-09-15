<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'product';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getActive()
    {
        $return = self::select('product.*');
        if (!empty(Request::get('title'))) {
            $return = $return->where('title', 'like', '%' .Request::get('title').'%');
        }
        $return = $return->where('isDelete','=',0);
        $return = $return->orderBy('id','desc');
        $return = $return->paginate(5);
        return $return;
    }

    static public function getTrash()
    {
        return self::select('product.*')
                ->where('isDelete','=',1)
                ->orderBy('id','desc')
                ->paginate(5);
    }
}
