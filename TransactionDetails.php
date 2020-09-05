<?php

  



$conn = new mysqli('localhost','id14220343_tanya','4WJFc[3NUHl=\9H!','id14220343_sparks');


if ($conn->connect_error) {
  die("Connectionfailed: " . $conn->connect_error);
}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Transaction</title>
  </head>
  <style type="text/css">
html { 
        background: url(https://images.unsplash.com/photo-1554034483-04fda0d3507b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
}
body{
    background:none;
    color:white;
    text-align:justify;
    margin:auto;
}
#alert1{
    width:400px;
    margin:auto;
    margin-top:100px;
}
#alert2{
    width:400px;
    margin:auto;
    margin-top:100px;
}
#alert3{
    width:400px;
    margin:auto;
    margin-top:100px;
}
h3{
    color:green;
    
}
#details{
    margin:auto;
    border:black 2px solid;
    padding:50px;
    width:500px;
    margin-top:100px;
    
}
#deets{
    color:black;
}
  </style>
  <body>
       <div id="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="sparks1.php">CREDIT MANAGEMENT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item">
        <a class="nav-link" href="userslist.php">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="transfer.php">Transfer Credits</a>
      </li>
     
      <li class="nav-item">
    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#deets" aria-expanded="false" aria-controls="collapseExample">
    About Us
  </button>
</p>

 

      </li>
     
    </ul>
    </nav>
    <div class="collapse" id="deets">
  <div class="card card-body">
    Credit Management is a simple dynamic website which keeps you updated with your current credit status and lets you send and recieve credits anytime and anywhere!
 </div>
  </div>
    
  </div>
  </div>
  <?php

$from_user=filter_input(INPUT_POST,'From_user');
$to_user=filter_input(INPUT_POST,'To_user');
$credits_tr=filter_input(INPUT_POST,'Credits');

$current_cr="select * from customers where name='" . $from_user . "'";
$result = mysqli_query($conn, $current_cr);
$row=mysqli_fetch_array($result);
$flag=0;
$check=mysqli_query($conn,"select * from customers");
while($checklist=mysqli_fetch_array($check))
     {
            if(($from_user == $checklist["Name"]) || ($to_user == $checklist["Name"]))
                   $flag+=1;
                   
     }
if($flag < 2)
     {
	    echo '<div id="alert3" class="alert alert-danger" role="alert">'."ERROR:".'</br>'."Enter valid username." . "<br/>".'</div>';
     }
else if($credits_tr > $row["Credit"])
     {
            echo '<div id="alert2" class="alert alert-danger" role="alert">'."ERROR:".'</br>'." Credits transferred cannot be more than user's current credits ."  . "<br>".'</div>';
            
     }
else 
     {
	    //updates Users table information and makes an entry in Transfers table.
            $query = "update customers set Credit=Credit-" . $credits_tr . " where name='" . $from_user . "'";
            $query2= "update customers set Credit=Credit+" . $credits_tr . " where name='" . $to_user . "'";    
           
            mysqli_query($conn,$query);
            mysqli_query($conn,$query2);
             
                                   
            echo '<div id="alert1" class="alert alert-success" role="alert">'."Transaction Successful!!!".'</br>'."TRANSACTION DETAILS :".'</br>'."$credits_tr"." "."Credits are Transferred To"." "."$to_user"." "."From"." "."$from_user".'</div>';

            
            
            
    }
?>
<div id="details">
 <h3>Click to get your details</h3>
 <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#deets" aria-expanded="false" aria-controls="collapseExample">
    Go!
  </button>
</p>
<div class="collapse" id="deets">
  <div class="card card-body">
     <table>
                        <tr>
                        <th> NAME </th>
                        <th> EMAIL </th>
                        <th> CREDITS </th>
                        </tr>
                        <?php
                             $q = "SELECT * FROM customers WHERE Name='" . $from_user . "'";
                             $res = mysqli_query($conn, $q);
                             while ($row = mysqli_fetch_array($res)) 
                            {
                                 echo "<tr>";
                                 echo "<td>" . $row["Name"] . "</td>";
                                 echo "<td>" . $row["Email"] . "</td>";
                                 echo "<td>" . $row["Credit"] . "</td>";
                                 echo "</tr>";
                            }
                        mysqli_close($conn);
                        ?>
                        </table>
 </div>
  </div>
 </div>
     

                                                      
			   
      
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
