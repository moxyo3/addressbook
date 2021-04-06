$(function() {
    $('address-form').on.click()
})


$('#delete').on.click(function() {
    if(confirm('削除するよ')) {
        alert('削除しました');
    } else {
        return false;
    }
});