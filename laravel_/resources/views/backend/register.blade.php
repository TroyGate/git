<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Our Photos Login</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- <link rel="stylesheet" href="{{URL::asset('/css/bootstrap.min.css')}}" /> -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/unicorn.register.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>

<!--         <div id="left">
            <img src="img/logo.jpg" style="width:54%; height:90%; " alt="">
        </div>
 -->

        <div id="logo">
            <img src="img/logo.png" alt="" />
        </div>
        
        <!--  表单 div  -->
        <div id="loginbox">
            <form  action="register" method="post" id="loginform" class="form-vertical" />
				<p style="color:red">请认真填写您个人信息， 以便忘记密码方便找回：）</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input name="user_name" type="text" placeholder="username" />
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input name="pwd" type="password" placeholder="new_password" />
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input name="passwords" type="password"  placeholder="new_passwords" />
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on" ><i class="icon-lock"></i></span><input type="email" name="email" id="exampleInputEmail1" placeholder="Email">
                        </div>
                    </div>
                </div>
                    
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input name="tel" type="number" placeholder="TEL" />
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link" id="to-recover">忘记密码?</a></span>
                    <span class="pull-right"><a class="btn btn-info" href="login" role="button">GoBack</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Commit" /></span>
                </div>
            </form>
        </div>

        <script src="js/jquery.min.js"></script>  
         <!-- <script src="js/unicorn.login.js"></script>  -->
    </body>
</html>
