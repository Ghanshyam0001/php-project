<?php

$conn  = mysqli_connect("localhost","root","","test1") or die("Connection Failed");

$page_limit = 5;

if(isset($_POST["page_id"])){
  $page = $_POST["page_id"];
}else{
  $page = 0;
}

$sql = "SELECT * FROM students LIMIT {$page},$page_limit";

$result = mysqli_query($conn,$sql) or die("Query Failed");




if(mysqli_num_rows($result)>0){

  $output = "";
  $output = '<tbody>';

        while($row = mysqli_fetch_assoc($result)){

          $last_id = $row["id"];

          $output .= "<tr>
          <td>{$row["id"]}</td>
          <td>{$row["first_name"]}  {$row["last_name"]}</td>
        </tr>";
        }

                  $output .="</tbody> 
                  <tbody id='pagination'>
                    <tr>
                      <td colspan='2'>
                        <button id='ajaxbtn' data-id='{$last_id}'>Load More</button>
                      </td>
                    </tr>
                  </tbody>";

  


                  

echo $output;


}else{
  echo "";
}

mysqli_close($conn);

?>