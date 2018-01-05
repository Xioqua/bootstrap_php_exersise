$(function () {
    // submit是整个表单的提交事件
    $('#formRegister').submit(function () {
        var usr1 = $('#username1').val();
        var pwd1 = $('#password1').val();
        var pwd2 = $('#password2').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var re_usr_pwd = /^[a-zA-Z0-9]{5,8}$/;
        var re_email = /\w+@\w+\.\w+/;
        var re_phone = /^1[3578]\d{9}$/;

        if ('' === usr1) {
            alert('用户名不能为空');
            return false;
        } else if (!re_usr_pwd.test(usr1)) {
            alert('用户名格式不正确');
            return false;
        } else if ('' === pwd1) {
            alert('密码不为空');
            return false;
        } else if (pwd1 !== pwd2) {
            alert('密码输入不一致');
            return false;
        } else if (!re_usr_pwd.test(pwd1)) {
            alert('密码格式不正确');
            return false;
        } else if ('' === email) {
            alert('邮箱不为空');
            return false;
        } else if (!re_email.test(email)) {
            alert('邮箱格式不对！');
            return false;
        } else if ('' === phone) {
            alert('电话不为空');
            return false;
        } else if (!re_phone.test(phone)) {
            alert('请输入正确的电话号码！');
            return false;
        } else if ($(':selected', '#location').val() === '0') {
            alert('请选择省份');
            return false;
        } else if ($('[name="sex"]:checked').length === 0) {
            alert('请选择性别');
            return false;
        } else if ($('[name="hobby[]":checked]').length === 0) {
            alert('请选择爱好');
        } else if ($('#assign').get(0).checked === false) {
            alert('不接受协议还想注册?')
        } else {
            return true;
        }
    });
});