@extends('layouts.main')

@section('link')
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
@endsection

@section('contents')
    <div>
        <a href="{{ url('/create') }}">
        <button type="button" class="btn btn-secondary">＋ 作成</button>
        </a>
    </div>
    <br>

    <div class="address-table">
        <table class="address-table">
            <th></th>
            <th>氏名</th>
            <th>郵便番号</th>
            <th>住所1</th>
            <th>住所2</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>メモ</th>
            @foreach ($items as $item)
                <tr>
                    <td class="edit-button">
                        <a href="{{ url('/edit/id='.$item->id) }}">
                        <button type="button" class="btn btn-outline-secondary btn-sm">編集</button>
                        </a>
                    </td>
                    <td width="200">{{ $item -> family_name }} {{ $item -> first_name }}</td>
                    <td width="100">{{ $item -> post_num }}</td>
                    <td>{{ $item -> address1 }}</td>
                    <td>{{ $item -> address2 }}</td>
                    <td>{{ $item -> phone_num }}</td>
                    <td>{{ $item -> mail_address }}</td>
                    <td class="memo-td">{{ $item -> memo }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/js/address.js') }}"></script>
@endsection
