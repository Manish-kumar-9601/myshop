<?php
require_once "include/db.inc.php";
$query = "SELECT * FROM myshop.clients";
$stmt = $connect->prepare($query);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    .<div class="container">
        <form action="include/add.php" method="post">
            <button type="submit" class="btn btn-primary">create new client</button>
        </form>

        <table class="tabl">
            <thead>
                <tr class="border    ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">phone</th>
                            </tr>
                        </thead>
                        <tbody>



                            <?php
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($data) {

                                foreach ($data as $row) {
                                    if ($row['name'] != null) {
                                        echo "  <tr>
<td  >{$row['id']}</td>
<td >{$row['name']}</td>
<td  >{$row['email']}</td>
<td  >{$row['phone']}</td>
<td>
    <a href='/myshop/include/edit.php?id=$row[id]' class='btn btn-primary'  >edit</a>
    <a href=' /myshop/include/delete.php?id=$row[id]' class='btn btn-danger'>delete</a>
</td>
</tr>

";
                                    }
                                }
                            } else {
                                echo "data is not reacive";
                            }


                            ?>


                        </tbody>
                    </table>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>