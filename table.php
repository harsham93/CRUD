
<?php


$link = mysqli_connect("127.0.0.1", "root", "", "form");

  if  (mysqli_connect_error()){
      
    die("There was an error connecting to the database");
}

$query = "SELECT * from FORM";

if($result = mysqli_query($link, $query)){
    
     echo '<table> 
         <tr>
   <th> Email </th>
   <th> Subject </th>
   <th> Content </th>
   <th> Action </th>
   <tr>';
  while ($row = mysqli_fetch_array($result)){
          echo'
  
  <tr>
   <td>'. $row["Email"].'</td>
   <td>'. $row["Subject"].'</td>
    <td>'. $row["Text"].'</td>
    <td> <a href="read.php?Id='.$row["Id"].' title="View Record" data-toggle="tooltip">Read</a></td>
    <td><button><a href="update.php?Id='. $row["Id"] .'" title="Update Record" data-toggle="tooltip">Update</a></button></td>
     <td><button><a href="delete.php?Id='. $row["Id"] .'" title="Delete Record" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span>Delete</a></button></td>
  </tr>';       
  }
  
 echo   '</table>'    ; }



?>



