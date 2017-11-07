<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Our Photos Login</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/unicorn.login.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <div id="logo">
            <img src="img/logo2.png" alt="" />
        </div>
        <div id="loginbox">            
            <form  action="mm_saves" method="post" id="loginform"  class="form-vertical" />
				<p>输入原密码进行继续继续.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input name="load_mm" type="text" id="load" placeholder="旧密码" />
                        </div>
                    </div>
                </div>


                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input id="new" name="password" type="password" placeholder="新密码" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    {{--<span class="pull-left"><a href="mm_find" class="flip-link" id="to-recover">忘记密码?</a></span>--}}
                    <span class="pull-right"><a class="btn btn-info" href="register" role="button">Register</a></span>
                    <span class="pull-right"><input type="submit" id="save" class="btn btn-success" value="修改" /></span>
                </div>
            </form>

        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/unicorn.login.js"></script> 
    </body>
</html>
<script>
//    $('#save').click(function(){
//        var mm = $('#load').val();  /* 原密码 */
//        var new_mm = $('#new').val(); /* 新密码 */
//        alert(mm);
//        alert(new_mm);
//        $.ajax({
//            url:'http://www.home.com/mm_saves/'+mm+'/'+new_mm,
//            type:'get',
//            success:function(msg){
//                location.href="http://www.home.com/contact";
////                alert(msg)
//                if(msg == 1){
//                }else{
//                    alert('修改失败!!')
//                }
//            }
//        })
//    })

</script>
