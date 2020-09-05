<?php




$conn = new mysqli('localhost','id14220343_tanya','4WJFc[3NUHl=\9H!','id14220343_sparks');


if ($conn->connect_error) {
  die("Connectionfailed: " . $conn->connect_error);
}


?>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<title>Webpage</title>
<script src="https://cdn.jsdelivr.net/npm/lozad"></script>  

 <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
 </script> 
 <script src="jquery-ui/jquery-ui.js"></script>
 <link href="jquery-ui/jquery-ui.css" rel="stylesheet">
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
table{
    color:black;
    width:500px;
    height:400px;
    text-align:center;
    margin:auto;
    margin-top:100px;
}
tr{
    margin:20px;
}
</style>
</head>
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
        <a class="nav-link" href="transfer.php">Transfer Credit</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="">About Us</a>
      </li>
     
    </ul>
    </nav>
  </div>
  </div>
  
    <div id="list">
     <table>
                        <tr>
                        <th> NAME </th>
                        <th> EMAIL </th>
                        <th> CREDITS </th>
                        </tr>
                        <?php
                             $query = "SELECT * FROM customers";
                             $result = mysqli_query($conn, $query);
                             while ($row = mysqli_fetch_array($result)) 
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
               







</body>
</html>
