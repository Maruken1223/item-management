<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use Carbon\Carbon;

class ItemController extends Controller
{
    /**
     * コンストラクタ
     */
    protected $item;

    public function __construct(Item $edit_item)
    {
        $this->middleware('auth');

        $this->item = $edit_item;
    }


    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        // 検索フォームで入力された値を取得する
        $keyword = $request->input('keyword');

        // クエリビルダ
        $query = Item::query();

        // もし検索フォームにキーワードが入力されたら
        if (!empty($keyword)) {

            // whereメソッドでLIKE検索を指定し、$keywordの両側に%をつけることで、
            // 部分一致検索を行います。またorWhereメソッドでOR検索
            $query->where('id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type', 'LIKE', "%{$keyword}%")
                ->orWhere('detail', 'LIKE', "%{$keyword}%");
        }

        $items = $query->get();

        return view('item.index', compact('items', 'keyword'));

        $cb = new Carbon();
        echo $cb; //　2020-05-20 14:13:30
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required|integer',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }


    /**
     * 商品編集画面表示
     *
     * @param request $id
     * @return Response
     */
    public function Item_edit($item_id, Request $request)
    {
        // URLから商品IDを取得
        $item_id = $request->id;

        // 指定した商品のデータを取得
        $edit_item = $this->item->selectEditItemFindById($item_id);
        // dd($edit_item);
        return view('item.edit', compact('edit_item'));
    }


    /**
     * 商品データ更新後->商品一覧画面へ遷移
     * 
     * 
     */
    public function Item_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|integer',
            'detail' => 'nullable',
        ]);

        $edit_item = $request->post();

        $edit_item['id'] = $id;

        $this->item->updateItemFindById($edit_item);

        return redirect()->route('itemindex');
    }

    /**
     * 商品データ削除後->商品一覧画面へ遷移
     * 
     * 
     */
    public function Item_destroy($id)
    {
        // 指定されたIDのレコードを削除
        $deleteItem = $this->item->deleteItemById($id);
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('itemindex');
    }
}
