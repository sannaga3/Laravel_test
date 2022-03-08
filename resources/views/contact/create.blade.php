@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('this is create page!') }}
                    <br>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary mt-2">お問合せ一覧</a>
                </div>
                <div class="mt-5">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name">氏名 : </label>
                            <input type="text" name="name">
                        </div>
                        <div>
                            <label for="email">メールアドレス : </label>
                            <input type="email" name="email">
                        </div>
                        <div>
                            <label for="url">ホームページ : </label>
                            <input type="text" name="url">
                        </div>
                        <div>
                            <label for="gender">性別 : </label>
                            <input type="radio" name="gender" value="0">男性</input>
                            <input type="radio" name="gender" value="1">女性</input>
                        </div>
                        <div>
                            <label for="age">年齢</label>
                            <select id="age" name="age">
                                <option value="">選択してください</option>
                                <option value="1">〜19歳</option>
                                <option value="2">20歳〜29歳</option>
                                <option value="3">30歳〜39歳</option>
                                <option value="4">40歳〜49歳</option>
                                <option value="5">50歳〜59歳</option>
                                <option value="6">60歳〜</option>
                            </select>
                        </div>

                        </div>
                        <div>
                            <label for="title">タイトル : </label>
                            <input type="text" name="title">
                        </div>

                        <div>
                            <label for="contact">お問い合わせ内容</label>
                            <textarea class="form-control" id="contact" row="3" name="contact"></textarea>
                        </div>

                        <div>
                            <input type="checkbox" id="caution" name="caution" value="1">
                            <label for="caution">注意事項にチェックする</label>
                        </div>

                        <input class="btn btn-primary mt-3" type="submit" name="btn_confirm" value="確認する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection