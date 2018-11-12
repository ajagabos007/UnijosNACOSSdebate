<?php
session_start();
 include_once('db.php');
 $query1 = "SELECT *  FROM participants WHERE debate_group='A' GROUP BY name ASC;";
 $query2 = "SELECT * FROM participants WHERE debate_group='B'GROUP BY name ASC;";

 $query_run1 = mysqli_query($connect,$query1);
 $query_run2 = mysqli_query($connect,$query2);
 $index = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NACOSS debate groups</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <script src="main.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul class="nav nav-tabs">
                <li><a href="index.php">NACOSS Debate</a></li>
                <li class="active"><a href="#">View group members</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row"> 
                <div class=" success col-sm-12">
                    <?php
                    if(isset($_SESSION['registration_status']))
                        echo $_SESSION['registration_status'];
                    session_destroy();
                    ?>
                </div>
                <div class="col-sm-6"> 
                    <h2>Group A</h2>
<?php if($query_run1){ 
    if(mysqli_num_rows($query_run1)!=0) {        
?>                    <div class="table-responsive table-bordered table-striped">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>
<?php       while($result = mysqli_fetch_assoc($query_run1)){
                     echo "<tr>
                             <td>".++$index."</td>
                             <td>".$result['name']."</td> 
                             <td>".$result['level']."</td> 
                             <td>".$result['phone_number']."</td>    
                           </tr>   
                     ";
}
?>
                        </tbody>
                        </table>
                    </div>  
<?php
    }
    else
         echo "<h3>No member in group A yet...! ";
        $index =0;
}?>            
                </div> 
                <div class="col-sm-6">
                    <h2>Group B</h2>
<?php if($query_run1){ 
    if(mysqli_num_rows($query_run2)!=0) {        
?>  
                    <div class="table-responsive table-bordered table-striped ">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>
 <?php       while($result = mysqli_fetch_assoc($query_run2)){
                     echo "<tr>
                             <td>".++$index."</td>
                             <td>".$result['name']."</td> 
                             <td>".$result['level']."</td> 
                             <td>".$result['phone_number']."</td>       
                           </tr>   
                     ";
}
?>          
                        </tbody>
                        </table>
                    </div>           
               
                <?php
    }
    else
         echo "<h3>No member in  group B yet...! ";
        $index =0;
}?>         
              </div>
            </div>
        </div>
    </main>
    <footer><center>NACOSS WEEK &copy; 2018</center></footer>
</body>
</html>