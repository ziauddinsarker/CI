<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</head>
<body style="background-color: #D0D0D0;">
<div class="row">
    <div class="col-md-4 col-md-offset-4" style="margin-top: 200px;">
        <label class="control-lable">Country Name</label>
        <input type="text" id="country" autocomplete="off" name="country" class="form-control" placeholder="Start typing and see the magic! :P">
        <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">
        </ul>
    </div>
</div>
</body>
</html>