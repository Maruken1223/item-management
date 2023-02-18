<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
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

        return view('user.index', compact('users','keyword'));

        $cb = new Carbon();
        echo $cb;
    }
}
