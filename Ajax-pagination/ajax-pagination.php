<?php

$conn = mysqli_connect("localhost","root","","test1") or die("Connection Failed");

$limit_page = 3;

$page = "";

if(isset($_POST["page_no"])){
  $page = $_POST["page_no"];
}else{
  $page = 1;
}

$offset = ($page -1) * $limit_page;


$sql = "SELECT * FROM students LIMIT {$offset},{$limit_page}";

$result = mysqli_query($conn,$sql) or die("Query Failed");

$output = "";

if(mysqli_num_rows($result )>0){

  $output = '  <table border="1" width="100%" cellspacing="0" cellspadding="10px">
        <tr>
          <th width="100px">ID</th>
          <th>Name</th>
        </tr>';

        while($row = mysqli_fetch_assoc($result)){

          $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["first_name"]}   
          {$row["last_name"]}</td></tr>";
        }
$output .= ' </table>';

$sql_total = "SELECT * FROM students";
$records = mysqli_query($conn,$sql_total) or die("Query Failed");
$total_records = mysqli_num_rows($records);
$total_page = ceil($total_records/$limit_page);
$output .= '<div id="pagination">';

for($i=1; $i<=$total_page; $i++){

  if($i == $page){
    $class_name = "active";
  }else{
    $class_name = "";
  }

  $output .= "<a class='{$class_name}' id='{$i}'>{$i}</a>";
  


}
$output .= '</div>';



echo $output;


}else{
  echo "<h2>No Reccord Found</h2>";
}


?>