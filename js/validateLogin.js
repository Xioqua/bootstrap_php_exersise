$(function () {
    $('#login').click(function () {
        var usr = $('#username').val();
        var pwd = $('#password').val();
        var re_usr = /([\u4e00-\u9fa5]{1,8})|([a-zA-Z]{3,8})/;
        var re_pwd = /^[a-zA-Z0-9]{5,8}$/;
        if ('' === usr) {
            alert('用户名不能为空');
            return false;
        } else if (!re_usr.test(usr)) {
            alert('用户名格式不正确!');
            return false;
        } else if ('' === pwd) {
            alert('密码不为空');
            return false;
        } else if (!re_pwd.test(pwd)) {
            alert('密码格式不正确');
            return false;
        } else {
            return true;
        }
    });
});