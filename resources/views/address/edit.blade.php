@extends('layouts.main')

@section('link')
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
@endsection

@section('contents')
    <div id="create-wrapper">
        <div class="edit-form">
            @if($is_registration)
            <p>新規作成</p>
            <span style="font-size: small; color: red">*は必須項目です</span>
            @else
            <p>住所編集</p>
            @endif

            @if($is_registration)
            <form action="{{ url('/addAddress') }}" method="post" id="address-form">
                @csrf
                <div class="form-group">
                    <label for="family_name">姓*</label>
                    <input type="text" name="family_name" id="family_name" value="{{ old('family_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="first_name">名*</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="kana_family">姓（ふりがな）*</label>
                    <input type="text" name="kana_family" id="kana_family" value="{{ old('kana_family') }}" required>
                </div>

                <div class="form-group">
                    <label for="kana_name">名（ふりがな）*</label>
                    <input type="text" name="kana_name" id="kana_name" value="{{ old('kana_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="post_num">郵便番号*</label>
                    <input type="text" name="post_num" id="post_num" value="{{ old('post_num') }}" required>
                </div>

                <div class="form-group">
                    <label for="address1">住所1*</label>
                    <input type="text" name="address1" id="address1" value="{{ old('address1') }}" required>
                </div>

                <div class="form-group">
                    <label for="address2">住所2</label>
                    <input type="text" name="address2" id="address2" value="{{ old('address2') }}">
                    @error('address2')
                        <span class="error-message">※{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_num">電話番号</label>
                    <input type="text" name="phone_num" id="phone_num" value="{{ old('phone_num') }}">
                </div>

                <div class="form-group">
                    <label for="mail_address">メールアドレス</label>
                    <input type="email" name="mail_address" id="mail_address" value="{{ old('mail_address') }}">
                </div>

                <div class="form-group">
                    <label for="memo">メモ</label>
                    <input type="text" name="memo" id="memo" value="{{ old('memo') }}">
                </div>

                <div><button class="btn btn-outline-primary">新規作成</button></div>
            </form>

            @else
            <span style="font-size: small; color: red">*は必須項目です</span>
            <form id="address-form" action="{{ url('/update') }}" method="POST">
                @csrf
                <ul>
                    <li>
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label for="family_name">姓*</label>
                            <input type="text" name="family_name" id="family_name" value="{{ $item->family_name }}" required>
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <label for="first_name">名*</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $item->first_name }}" required>
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <label for="kana_family">姓（ふりがな）*</label>
                            <input type="text" name="kana_family" id="kana_family" value="{{ $item->kana_family }}" required>
                        </div>
                    </li>   

                    <li>
                        <div class="form-group">
                            <label for="kana_name">名（ふりがな）*</label>
                            <input type="text" name="kana_name" id="kana_name" value="{{ $item->kana_name }}" required>
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <label for="post_num">郵便番号*</label>
                            <input type="text" name="post_num" id="post_num" value="{{ $item->post_num }}" required>
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <label for="address1">住所1*</label>
                            <input type="text" name="address1" id="address1" value="{{ $item->address1 }}" required>
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <label for="address2">住所2</label>
                            <input type="text" name="address2" id="address2" value="{{ $item->address2 }}">
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <label for="phone_num">電話番号</label>
                            <input type="text" name="phone_num" id="phone_num" value="{{ $item->phone_num }}">
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <label for="mail_address">メールアドレス</label>
                            <input type="email" name="mail_address" id="mail_address" value="{{ $item->mail_address }}">
                        </div>
                    </li>

                    <li>
                        <div class="form-group">
                            <label for="memo">メモ</label>
                            <input type="text" name="memo" id="memo" value="{{ $item->memo }}">
                        </div>
                    </li>

                    <button type="submit" name="update" value="update" class="btn btn-outline-primary">更新</button>
                </ul>
            </form>

            <form action="{{ url('/delete') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                </div>
                <input type="submit" class="btn btn-outline-danger" value="削除">
            </form>

            @endif

            <a href="{{ url('/') }}"><button class="btn btn-secondary">キャンセル</button></a>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/js/address.js') }}"></script>
@endsection