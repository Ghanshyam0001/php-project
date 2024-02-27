<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            height: 10px;
            width: 15px;
            margin: 6px;
            padding: 4px;
            color: black;
            background-color: blueviolet;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 5px;
        }
        a:hover{
            background-color: blue;
            color: white;
        }
    </style>



</head>

<body>
    <div id="main-content">
        <h2>All Records</h2>
        <?php
        include 'config.php';

        $sql = "SELECT * FROM student";

        $result = mysqli_query($conn, $sql) or die("Query Failed");

        if (mysqli_num_rows($result) > 0) {


        ?>


            <table cellpadding="7px">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Class</th>
                    <th>Phone</th>
                    <th>Action</th>
                </thead>


                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {


                    ?>

                        <tr>
                            <td><?php echo $row['sid']; ?></td>
                            <td><?php echo $row['sname']; ?></td>
                            <td><?php echo $row['saddress']; ?></td>
                            <td><?php echo $row['sclass']; ?></td>
                            <td><?php echo $row['sphone']; ?></td>
                            <td>
                                <a href='create.php'>create</a>
                                <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
                                <a href='delete.php?id=<?php echo $row['sid']; ?>'>Delete</a>

                            </td>
                        </tr>
                           <?php
                    }

                           ?>

                </tbody>


            </table>
    <?php
                }
    ?>


    </div>
</body>

</html>