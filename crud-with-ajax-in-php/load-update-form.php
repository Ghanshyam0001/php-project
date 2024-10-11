<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");

$edit_id = $_POST['editid'];

$sql = "SELECT * FROM students WHERE id = {$edit_id}";
$result = mysqli_query($conn, $sql) or die("Query Failed");

$output = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output = "
        <tr>
   
    <td><input type='hidden' id='edit-id' value='{$row["id"]}'></td>
</tr>
        <tr>
        
            <td>First Name</td>
            <td><input type='text' id='edit-fname' value='{$row["first_name"]}'></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type='text' id='edit-lname' value='{$row["last_name"]}'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' id='edit-submit' value='save'></td>
        </tr>";
    }
} else {
    $output = "<h2>Record not found</h2>";
}

mysqli_close($conn);
echo $output;
