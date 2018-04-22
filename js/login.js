$(document).ready(function(){
    $flag=1;
    $("#userLog").focusout(function(){
        var r = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
        if($(this).val()===''){
            $(this).css("border-color", "#FF0000");
            $('#login-submit').attr('disabled',true);
            $('#login-submit').css('color',"#565656");
            $("#error_logname").text("* Введіть пошту!");
        }
        else if (!r.test($(this).val())) {
            $(this).css("border-color", "#FF0000");
            $('#login-submit').attr('disabled',true);
            $('#login-submit').css('color',"#565656");
            $("#error_logname").text("* Введіть валідну пошту!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#login-submit').attr('disabled',false);
            $('#login-submit').css('color',"white");
            $("#error_lognane").text("");
        }
    });
    $("#password").focusout(function(){
        if($(this).val()===''){
            $(this).css("border-color", "#FF0000");
            $('#login-submit').attr('disabled',true);
            $('#login-submit').css('color',"#565656");
            $("#error_logpass").text("* Введіть пароль!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#login-submit').attr('disabled',false);
            $('#login-submit').css('color',"white");
            $("#error_logpass").text("");

        }
    });

    $("#password-reg").focusout(function(){
        $pass = $('#password-reg').val();
        if($(this).val()===''){
            $(this).css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $('#register-submit').css('color',"#565656");
            $("#error_pass").text("* Введіть пароль!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#register-submit').attr('disabled',false);
            $('#register-submit').css('color',"white");
            $("#error_pass").text("");
        }
    });
    $("#email").focusout(function(){
        var r = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
        if($(this).val()===''){
            $(this).css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $('#register-submit').css('color',"#565656");
            $("#error_mail").text("* Введіть пошту!");
        }
        else if (!r.test($(this).val())) {
            $(this).css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $('#register-submit').css('color',"#565656");
            $("#error_mail").text("* Введіть правильну пошту!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#register-submit').attr('disabled',false);
            $('#register-submit').css('color',"white");
            $("#error_mail").text("");
        }
    });
    $("#confirm-password").focusout(function(){
        if($(this).val()===''){
            $(this).css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $('#register-submit').css('color',"#565656");
            $("#error_confpass").text("* Підтвердіть пароль!");
        }
        else if ($(this).val()!==$pass)
        {
            $(this).css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $("#error_confpass").text("* Пароль не співпадає");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#register-submit').attr('disabled',false);
            $('#register-submit').css('color',"white");
            $("#error_confpass").text("");
        }
    });
    $("#tel").focusout(function(){
        $pho =$("#name").val();
        if($(this).val()===''){
            $(this).css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $('#register-submit').css('color',"#565656");
            $("#error_name").text("* Введіть ім'я!");
        }
        else{
            $(this).css({"border-color":"#2eb82e"});
            $('#register-submit').attr('disabled',false);
            $('#register-submit').css('color',"white");
            $("#error_name").text("");
        }
    });
    $( "#submit" ).click(function() {
        if($("#name").val()==='')
        {
            $("#name").css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $('#register-submit').css('color',"#565656");
            $("#error_name").text("* Введіть ім'я!");
        }
        if($("#email").val()==='')
        {
            $("#email").css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $('#register-submit').css('color',"#565656");
            $("#error_mail").text("* Введіть пошту!");
        }
        if($("#password-reg").val()==='')
        {
            $("#password-reg").css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $('#register-submit').css('color',"#565656");
            $("#error_pass").text("* Введіть пароль!");
        }
        if($("#confirm-password").val()==='')
        {
            $("#confirm-password").css("border-color", "#FF0000");
            $('#register-submit').attr('disabled',true);
            $('#register-submit').css('color',"#565656");
            $("#error_confpass").text("* Підтвердіть пароль!");
        }
        if($("#password").val()==='')
        {
            $("#password").css("border-color", "#FF0000");
            $('#login-submit').attr('disabled',true);
            $('#login-submit').css('color',"#565656");
            $("#error_logpass").text("* Введіть пароль!");
        }
        if($("#username").val()==='')
        {
            $("#username").css("border-color", "#FF0000");
            $('#login-submit').css('color',"#565656");
            $('#login-submit').attr('disabled',true);
            $("#error_logname").text("* Введіть ім'я!");
        }
    });
});
