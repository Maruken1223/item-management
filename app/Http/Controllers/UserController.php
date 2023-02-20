<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{

    /**
     * コンストラクタ
     * 
     */
    protected $user;

    public function __construct(User $edit_user)
    {
        $this->middleware('auth');

        $this->user = $edit_user;
    }

    /**
     * ユーザー一覧
     */
    public function index(Request $request)
    {

        // 検索フォームで入力された値を取得する
        $keyword = $request->input('keyword');

        // クエリビルダ
        $query = User::query();

        // もし検索フォームにキーワードが入力されたら
        if (!empty($keyword)) {

            $query->where('id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%")
                ->orWhere('role', 'LIKE', "%{$keyword}%");
        }

        $users = $query->orderByDesc('created_at')->paginate(5);

        return view('user.index', compact('users', 'keyword'));

        $cb = Carbon::now();
        echo $cb;
    }

    /**
     * ユーザー編集画面表示
     *
     * @param request $id
     * @return Response
     */
    public function user_edit($user_id, Request $request)
    {
        // URLからユーザーIDを取得
        $user_id = $request->id;

        // 指定したユーザーのデータを取得
        $edit_user = $this->user->selectEditUserFindById($user_id);
        // dd($edit_user);
        return view('user.edit', compact('edit_user'));
    }

    /**
     * ユーザーデータ更新後->ユーザー一覧画面へ遷移
     * 
     * 
     */
    public function User_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required| string| email:filter,dns| max:255 ',
        ]);

        $edit_user = $request->post();

        $edit_user['id'] = $id;

        $this->user->updateUserFindById($edit_user);

        return redirect()->route('userindex');
    }

    /**
     * 商品データ削除後->商品一覧画面へ遷移
     * 
     * 
     */
    public function User_destroy($id)
    {
        // 指定されたIDのレコードを削除
        $deleteUser = $this->user->deleteUserById($id);
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('userindex');
    }
}
