<?php

use Illuminate\Support\Facades\Route;
// "Route"というツールを使うために必要な部品を取り込んでいます。
use App\Http\Controllers\ProductController;
// ProductControllerに繋げるために取り込んでいます
use Illuminate\Support\Facades\Auth;
// "Auth"という部品を使うために取り込んでいます。この部品はユーザー認証（ログイン）に関する処理を行います


Route::get('/', function () {
    // ウェブサイトのホームページ（'/'のURL）にアクセスした場合のルートです
    if (Auth::check()) {
        // ログイン状態ならば
        return redirect()->route('products.index');
        // 商品一覧ページ（ProductControllerのindexメソッドが処理）へリダイレクトします
    } else {
        // ログイン状態でなければ
        return redirect()->route('login');
        //　ログイン画面へリダイレクトします
    }
});
// もしCompanyControllerだった場合は
// companies.index のように、英語の正しい複数形になります。


Auth::routes();

// Auth::routes();はLaravelが提供している便利な機能で
// 一般的な認証に関するルーティングを自動的に定義してくれます
// この一行を書くだけで、ログインやログアウト
// パスワードのリセット、新規ユーザー登録などのための
// ルートが作成されます。
//　つまりログイン画面に用意されたビューのリンク先がこの1行で済みます

Route::group(['middleware' => 'auth'], function () {
    Route::resource('products', ProductController::class);
});
// 標準的なCRUD（Create, Read, Update, Delete）操作を行うためのルートを一度に定義することができます。
// GET /products：商品一覧を表示（ProductControllerのindexメソッドが呼び出されます）
// GET /products/create：新しい商品を作成するフォームを表示（ProductControllerのcreateメソッドが呼び出されます）
// POST /products：新しい商品を保存（ProductControllerのstoreメソッドが呼び出されます）
// GET /products/{product}：特定の商品を表示（ProductControllerのshowメソッドが呼び出されます）
// GET /products/{product}/edit：特定の商品を編集するフォームを表示（ProductControllerのeditメソッドが呼び出されます）
// PUT/PATCH /products/{product}：特定の商品の更新を保存（ProductControllerのupdateメソッドが呼び出されます）
// DELETE /products/{product}：特定の商品を削除（ProductControllerのdestroyメソッドが呼び出されます）
// これらのルートのパス部分の {product} は、商品のIDや一意な識別子を表します。これにより、特定の商品に対する操作を行うためのルートを定義することができます。

// このように、Route::resource メソッドを使用することで、一つのリソースに対する様々な操作に対応するルートを一度に定義することができ、開発の効率化を図ることが可能になります。
