<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style type="text/css">
      body {
    margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #06101a !important;
}
        .register{
            /*background: -webkit-linear-gradient(left, #3931af, #00c6ff);*/
            margin-top: 3%;
            padding: 3%;
        }
        .register-left{
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }
        .register-left input{
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }
        .register-right{
            background: #e0e4e9;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }
        .register-left img{
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite  alternate;
            animation: mover 1s infinite  alternate;
        }
        @-webkit-keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .register-left p{
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }
        .register .register-form{
            padding: 10%;
            margin-top: 10%;
        }
        .btnRegister{
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }
        .register .nav-tabs{
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }
        .register .nav-tabs .nav-link{
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }
        .register .nav-tabs .nav-link:hover{
            border: none;
        }
        .register .nav-tabs .nav-link.active{
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }
        .register-heading{
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
            margin-right: 45%;
        }
    </style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>



<div class="container register">
                <div class="row" style="opacity: 65%;">
                    <div class="col-md-3 register-left">
                        <!-- <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/> -->
                        <h3>Welcome to</h3>
                        <img src="<?= base_url() ?>assets_admin/images/akk_logo.jpg" alt="Akkadian" style="height: 85px; width: 53%;">
                    </div>
                    <div class="col-md-9 register-right">
                       
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Login</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <?php if($this->session->flashdata('error')): ?>
                                        <div class="alert alert-danger" role="alert" id="alertBlock"><?= $this->session->flashdata('error') ?></div>
                                        <?php endif; ?>

                                        <?php if($this->session->flashdata('success')): ?>
                                        <div class="alert alert-success" role="alert" id="alertBlock"><?= $this->session->flashdata('success') ?></div>
                                        <?php endif; ?>
                                        <form method="post" action="<?php echo base_url('auth'); ?>">
                                           
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" required placeholder="Email"  />
                                                
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" required class="form-control" placeholder="Password *" value="" />
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-primary" type="submit">Login</button>
                                                <small>
                                                    <a href="<?php echo base_url('register'); ?>">Sign Up</a>
                                                    |
                                                    <a href="<?php echo base_url('forgot'); ?>">Forgot Password</a>
                                                    </small>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
</body>
</html>