<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter | Insert Employee Details into MySQL Database</title>
    <!--link the bootstrap css file-->
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <!-- link jquery ui css-->
    <link href="<?php echo base_url('assets/css/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" type="text/css" />
    <!--include jquery library-->
    <script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
    <!--load jquery ui js file-->
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
    <script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

    <style type="text/css">
        .colbox {
            margin-left: 0px;
            margin-right: 0px;
        }
    </style>

    <script type="text/javascript">
        //load datepicker control onfocus
        $(function() {
            $("#hireddate").datepicker();
        });
    </script>
    <script>
        /*$(document).ready(function(){
            $('#search').typeahead({
            source: function(query) {

            });
            var result = [];

            $.ajax({
                url: "<?php echo base_url('employee/get_employee'); ?>",
                type: "post",
                data: "query=" + query,
                dataType: "json",
                async: false,
                success: function(data) {
                    alert(data); // verify that you actually get data from the model
                    result = data;
                }
            });
            return result;
        }
        });*/
    </script>

    <script>
/*        $(document).ready(function(){
            $("#search").typeahead({
                name : 'sear',
                remote: {
                    url : 'connection.php?query=%QUERY'
                }

            });
        });*/
    </script>

</head>
<body>
<div class="container">

    <div class="row">

        <?php
            foreach($results as $data) {
                echo $data->employee_name . "<br>";
            }
        ?>
        <p><?php echo $links; ?></p>


            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 200px;">
            <label class="control-lable">Name</label>
            <input type="text" id="country" autocomplete="off" name="country" class="form-control" placeholder="Start typing and see the magic! :P">
            <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
              <legend>Add Employee Details</legend>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "employeeform", "name" => "employeeform");
            echo form_open("employee/index", $attributes);?>
            <fieldset>

                <div class="form-group">
                    <div class="row colbox">

                        <div class="col-lg-4 col-sm-4">
                            <label for="employeeno" class="control-label">Employee No</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="employeeno" name="employeeno" placeholder="employeeno" type="text" class="form-control"  value="<?php echo set_value('employeeno'); ?>" />
                            <span class="text-danger"><?php echo form_error('employeeno'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="employeename" class="control-label">Employee Name</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="employeename" name="employeename" placeholder="employeename" type="text" class="form-control"  value="<?php echo set_value('employeename'); ?>" />
                            <span class="text-danger"><?php echo form_error('employeename'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="department" class="control-label">Department</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">

                            <?php
                            $attributes = 'class = "form-control" id = "department"';
                            echo form_dropdown('department',$department,set_value('department'),$attributes);?>
                            <span class="text-danger"><?php echo form_error('department'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="designation" class="control-label">Designation</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">

                            <?php
                            $attributes = 'class = "form-control" id = "designation"';
                            echo form_dropdown('designation',$designation, set_value('designation'), $attributes);?>

                            <span class="text-danger"><?php echo form_error('designation'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="hireddate" class="control-label">Hired Date</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="hireddate" name="hireddate" placeholder="hireddate" type="text" class="form-control"  value="<?php echo set_value('hireddate'); ?>" />
                            <span class="text-danger"><?php echo form_error('hireddate'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="salary" class="control-label">Salary</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="salary" name="salary" placeholder="salary" type="text" class="form-control" value="<?php echo set_value('salary'); ?>" />
                            <span class="text-danger"><?php echo form_error('salary'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                        <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insert" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
            <a class="btn btn-default" href="<?php echo base_url() . "deleteemployee/index"?>">Employee List</a>
            <a class="btn btn-default" href="<?php echo base_url() . "login/index"?>">Login</a>
            <a class="btn btn-default" href="<?php echo base_url() . "contactform/index"?>">Contact</a>
            <a class="btn btn-default" href="<?php echo base_url() . "uploadfile/index"?>">Upload</a>
        </div>

    </div>
</div>
</body>
</html>