<?php
   // connect to database
   $conn = mysqli_connect('localhost', 'maskoul', 'test123', 'soli_food');

   // check connection
   if(!$conn){
       echo 'Connection error: ' . mysqli_connect_error(); 
   }

?>