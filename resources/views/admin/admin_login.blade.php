<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('backend/css/style.login.css')}}">
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="{{URL::to('/admin-dashboard')}}" >
                        	{{ csrf_field() }}		
                            <h3 class="text-center text-info">Login</h3>
                            <p class="alert-danger">
                                <?php
                                $message=Session::get('message');
                                if($message){
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                            </p>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="admin_email" id="username" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="admin_password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                               <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>-->
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <!--<div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
