<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');     //connot be home without the login//
}
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'quiz');
// if($con){
//     echo "succuss";
// }
?>


<html>
<head>
<title>home page</title>

<link rel="stylesheet"href="./css/style.css"/>
<link rel ="stylesheet" type="text/css"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    body{
        background:url(.//img/d.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    }
   
    </style>
</head>

<body>
<div>
    <marquee> Wellcome to online examination</marquee>
    </div>
    <div class="container">
    
    <h2 class="text-center text-success"> WELLCOME <?php echo $_SESSION['username']; ?> </h2><br>
    <div class="col-lg-8 m-auto d-block">
    <div class="card">

     <h3 class="text-center card-header">wellcome <?php echo $_SESSION['username']; ?> ,you have to select only one out of 4.goog luck:)</h3>
</div>  <br> 
<form action="next.php" method="post">  


<?php
for($i=1; $i<6;$i++){
$q="select * from questions where qid=$i";
$query=mysqli_query($con,$q);
while($rows=mysqli_fetch_array($query)){

    ?>


<div class="card">
    <h4 class="card-header"><?php echo $rows['question'] ?>  <h4>

   <?php

      $q="select * from answers  where ansid=$i";
       $query=mysqli_query($con,$q);
         while($rows=mysqli_fetch_array($query)){
   ?>
   <div class="card-body">
       <input type="radio" name="exam[<?php echo $rows['ansid'];?>]" value="<?php echo  $rows['aid'] ?>">
       <?php echo  $rows['answer'];?>
</div>

<?php 
}
}
}
?>
<input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">
</form>
</div>
</div><br><br>

<div class="m-auto d-block">
 <a  href="logout.php" class="btn btn-primary ">Logout</a>
</div><br>



<div>
    <h5 class="text-center">khari1275 &copy 2019-20</h5>
</div><br><br>
</div>
</body>
</html>
