<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * ログインフォームの表示
     *
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        return view('login.login_form');
    }

    /**
     * ホームの表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // ログインしているユーザー情報を取得
        $user = Auth::user();

        // ホーム画面を表示する際に、ログインユーザー情報をビューに渡す
        return view('home', compact('user'));
    }

    /**
     * ログイン処理
     *
     * @param  App\Http\Requests\LoginFormRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('login_success', 'ログイン成功しました！');
        }

        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();//ユーザーのセッションを削除
        $request->session()->invalidate();//全セッション削除
        $request->session()->regenerateToken();//セッション再作成
        return redirect()->route('showLogin')->with('logout', 'ログアウトしました');//login.showにリダイレクトする
    }
}