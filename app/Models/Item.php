<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable. 
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'detail',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    /**
     * 編集商品データを取得
     *
     * @param  $item_id
     * @return void
     */
    public function selectEditItemFindById($item_id)
    {
        $query = $this->select([
            'id',
            'name',
            'type',
            'detail',
        ])->where([
            'id' => $item_id
        ]);

        return $query->first();
    }

    /**
     * 商品データ更新
     * @param Request $edit_item
     * @return Response
     * 
     */

    public function updateItemFindById($edit_item)
    {
        return $this->where([
            'id' => $edit_item['id']
        ])->update([
            'name' => $edit_item['name'],
            'type' => $edit_item['type'],
            'detail' => $edit_item['detail'],
        ]);
    }
}
