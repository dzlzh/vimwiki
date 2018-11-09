
$("#sub").click(function() {
    var nickname = $("#nickname").val(),
    content = $("#content").val(),
    email = $("#email").val();
if (nickname == "" || content == "") {
    alert("昵称或内容不能为空！");
    return false;
} else {
    var data = {
        nickname : nickname,
        content : content,
        email : ''
    };
    if (email !== "") {
        var email_reg = /\w+([-+.]\w+)*@\w+([-.]\w+)*.\w+([-.]\w+)*/;
        if (!email_reg.test(email)) {
            alert('email地址不合格！');
            return false;
        } else {
            data.email = email;
        }
    } else {
        alert("email地址不可为空！");
    }
    $.ajax({
        url: 'post.php',
        type: 'POST',
        dataType: 'json',
        data:data,
        success: function (res) {
            if (res.error === 0) {
                alert(res.msg);
                window.location.href = '?page = 1';
            } else {
                alert(res.msg);
            }
        }
    });


}

});
$("input[name='reply']").click(function(){
    var id = $(this).siblings("#id").val();
    var replydiv = $(this).siblings("div");

    if (replydiv.css("visibility") === "hidden") {
        replydiv.css("visibility","visible");
    } else {
        var replytext = replydiv.find("input").val();
        if (replytext === "") {
            alert("回复不能为空！");
        } else {
            var data = {
                id : id,
                reply : replytext 
            }
            $.ajax({
                url: 'reply.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                
                success: function (msg) {
                    if (msg.error === 0) {
                        alert(msg.msg);
                        window.location.href = '?page = 1';
                    } else {
                        alert(msg.msg);
                    }
                }
            });
        }
    }

});

$("input[name='delete']").click(function(){
    var id = $(this).siblings("#id").val();
    var data = {
        id : id
    }
    if (confirm('是否要删除')) {
     $.ajax({
         url: 'delete.php',
         type: 'POST',
         dataType: 'json',
         data: data,
         
         success: function (msg) {
             if (msg.error === 0) {
                 alert(msg.msg);
                 window.location.href = '?page = 1';
             } else {
                 alert(msg.msg);
             }
         }
     }); 
    }
});
