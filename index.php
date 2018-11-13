<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NACOSS debate Unijos chapter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <script src="main.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#" >NACOSS Debate</a></li>
                <li><a href="groups.php">View group members</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row"> 
                <div class="col-sm-2"></div> 
                <div class="col-sm-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">JOIN the NACOSS Debate 2017/2018</div>
                        <div class="panel-body">
                            <form method="POST" action="enrollParticipant.php" onsubmit= "return validateForm();" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Name </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control"  minlength="3" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?>" required/>
                                        <span class="errors"><?php if(isset( $_SESSION['name_error'])) echo  $_SESSION['name_error'];?></span>
                                        <span class="errors" id="name_error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Mat_No. </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mat_no" id ="mat_no" class="form-control" placeholder="UJ/xxxx/NS/xxxx" value="<?php if(isset($_SESSION['mat_no'])) echo $_SESSION['mat_no'];?>" required/>
                                        <span class="errors"><?php if(isset( $_SESSION['mat_no_error'])) echo  $_SESSION['mat_no_error'];?></span>
                                        <span class="errors"><?php if(isset( $_SESSION['errorMsg1'])) echo  $_SESSION['errorMsg1'];?></span>
                                        <span class="errors" id="mat_no_error"></span>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Level </label>
                                    <div class="col-sm-9">
                                        <select id="level" class="form-control" name="level" required>
                                            <option><?php if(isset($_SESSION['level'])) echo $_SESSION['level'];?></option>
                                            <option>100</option>
                                            <option>200</option>
                                            <option>300</option>
                                            <option>400</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Phone number</label>
                                    <div class="col-sm-9">
                                         <input type="number" name="phone_number" class="form-control" id="phone_number" minlength="11" maxlength="11" value="<?php if(isset($_SESSION['phone_number'])) echo $_SESSION['phone_number'];?>" required>
                                         <span class="errors"><?php if(isset( $_SESSION['phone_number_error'])) echo  $_SESSION['phone_number_error'];?></span>
                                         <span class="errors"><?php if(isset( $_SESSION['errorMsg2'])) echo  $_SESSION['errorMsg2'];?></span>
                                         <span class="errors" id="phone_number_error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-9">Hackers are smarter, Intelligent and better than software developers</label>
                                    <div class="col-sm-3">
                                        <input type="radio" name="group" id="group A" value="A" <?php if(isset($_SESSION['group']) and $_SESSION['group']=='A') echo 'checked';?> required><label>YES</label>
                                        <input type="radio" name="group" id="group B" value="B" <?php if(isset($_SESSION['group']) and $_SESSION['group']=='B') echo 'checked';?> required><label>NO</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-default" name="clear">Clear</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </main>
    <footer><center>NACOSS WEEK &copy; 2018</center></footer>
</body>
</html>
<?php
   session_destroy();
?>