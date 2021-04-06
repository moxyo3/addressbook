<div class="header">
    <div class="header-title">
        <a href="{{ asset('/') }}">
        <p>住所録アプリ</p>
        </a>
    </div>

    <div class="search-box">
        <form action="{{ url('/search') }}" method="POST">
            @csrf
            <input type="text" name="search_word"><button>検索</button>
        </form>
    </div>

    <div class="clear">
</div>