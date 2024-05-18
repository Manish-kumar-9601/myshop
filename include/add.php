<?php
$name = '';
$email = '';
$phone = 0;
$errorMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    do {
        if (empty($name) || empty($email) || empty($phone) != '') {
            $errorMessage = "all the fields are required";
            break;
        }
    } while (false);
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        // rest of your code
    } else {
        echo "FILL THE DETAILS";
        // handle the error
    }



    require_once "db.inc.php";
    $query = "INSERT INTO myshop.clients(name,email,phone) 
    VALUES(?,?,?)";
    $stmt = $connect->prepare($query);
    $params = array($name, $email, $phone);
    $stmt->execute($params);
} else {
    header("Location:../index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="m-3">
        <label for="name">
            name
        </label>
        <input type="text" name="name" value="<?php echo $name ?>" required>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $email ?>" aria-describedby="emailHelp" name='email' required>
            <label for="phone">phone</label>
            <input type="number" name="phone" value="<?php echo $email ?>" class="form-control" required>
        </div>
        <input type="submit" class="btn btn-success" value="submit">
    </form> <button class="m-3" type="button" onclick="exit()">exit</button>
    <!-- <?php

            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $phone =  $_POST['phone'];
                // rest of your code
            } else {
                echo "Name is not set.";
                exit();
                // handle the error
            }
            require_once "db.inc.php";
            $query = "INSERT INTO myshop.clients(name,email,phone) 
    VALUES(?,?,?)";
            $stmt = $connect->prepare($query);
            $params = array($name, $email, $phone);
            $stmt->execute($params);

            ?> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </script>
</body>

</html>