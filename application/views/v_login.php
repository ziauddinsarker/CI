<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Login</title>
    <meta name="robots" content="index,follow" />
    <meta name="description" content="Login" />
    <meta http-equiv="Content-type" content="text/html; charset=iso8859-1" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="application/javascript">
        $(document).ready(function() {
            $('#submit').click(function() {
                var form_data = {
                    username : $('.username').val(),
                    password : $('.password').val(),
                    ajax : '1'
                };
                $.ajax({
                    url: "<?php echo site_url('login/ajax_check'); ?>",
                    type: 'POST',
                    async : false,
                    data: form_data,
                    success: function(msg) {
                        $('#message').html(msg);
                    }
                });
                return false;
            });
        });
    </script>

</head>
<body>
<div class="container">


    <?php
    echo form_open('login');
    ?>
    <div id="message">
    </div>

    <div class="form-group">
        <div class="row colbox">

            <div class="col-lg-4 col-sm-4">
                <label for="username" class="control-label">User Name</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <?=form_input(array('name'=>'email','value'=>'','class'=>'form-control username textbox'))?>
            </div>
        </div>
    </div>

     <div class="form-group">
        <div class="row colbox">

            <div class="col-lg-4 col-sm-4">
                <label for="password" class="control-label">Password</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <?=form_password(array('name'=>'password','value'=>'','class'=>'form-control password textbox'))?>
            </div>
        </div>
    </div>


        <?=form_submit('submit','Login','id="submit"','class="btn btn-default"')?>

    <?=form_close("\n")?>
</div>
</body>
</html>