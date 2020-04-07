<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Login Dashboard - Balai Pengelola Transportasi Darat</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<style>
    *{
        font-size:11pt;
    }
    body{
        background-color:#232464;
    }
    .loginbox{
        width:400px;
        min-height:200px;
        background-color:#FFF;
        border-radius:5px;
        margin:0 auto;
        margin-top:100px;
        padding:30px 20px 10px 20px;
    }
    .title{
        font-weight: bold;
    }
</style>
<body>
<div class="container">
    <div class="loginbox">
        <span class="title">Login Dashboard</span>
        <hr>
        <form action="<?php echo e(route('login')); ?>" method="POST">
           <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="email">Username</label>
<!--                <input type="text" id="username" value="<?php echo e(old('username')); ?>" name="username" class="form-control<?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" required autofocus>-->
                  <input id="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>


                  <?php if($errors->has('username')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('username')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
</body>
</html>