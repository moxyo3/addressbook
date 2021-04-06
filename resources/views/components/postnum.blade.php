<div class="form-group">
    <label for="post_num">郵便番号</label>
    <input type="number" name="post_num" id="post_num" value="{{ \app\Logics\AddressLogic\AddressLogic::postnumFormat($item->post_num) }}" required>
    ※7桁の数字で入力してください
</div>