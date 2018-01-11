$(document).keydown(function (e) {
    // alert(e.keyCode); 在首页按F8跳到后台管理页面
    if (e.keyCode === 119) {
        window.location.href = '../admin/admin.php';
    }
});