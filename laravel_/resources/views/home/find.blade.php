<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Our Photos Login</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- <link rel="stylesheet" href="{{URL::asset('/css/bootstrap.min.css')}}" /> -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/unicorn.login.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <div id="logo">
            <img src="img/logo2.png" alt="" />
        </div>
        <div id="loginbox">            
            <form  action="{{URL::asset('find_add')}}" method="post" id="loginform" class="form-vertical" />
				<p>密码找回..</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input name="username" type="text" placeholder="qq邮箱" />
                        </div>
                    </div>
                </div>


                <div class="form-actions">
                    <span class="pull-left"><a href="mm_find" class="flip-link" id="to-recover">忘记密码?</a></span>
                    <span class="pull-right"><a class="btn btn-info" href="#" role="button">放弃</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="提交" /></span>
                </div>

            </form>

        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/unicorn.login.js"></script> 
    </body>
</html>
