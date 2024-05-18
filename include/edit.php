<?php
require_once "db.inc.php";
$id = '';
$name = '';
$email = '';
$phone = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location:../index.php");
        exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM clients WHERE id =$id ";
    $result = $connect->prepare($sql);
    $result->execute();
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    if (!$row) {
        header("Location:../index.php");
        exit;
    }

    $idData = $row['id'];
    $nameData = $row['name'];
    $emailData = $row['email'];
    $phoneData = $row['phone'];
} else {
    $id = $_POST['id'];
    $name = $$_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    do {
        if (empty($id) || empty($name) || empty($email)) {
            $errorMessage = "all the are reqired";
            break;
        }
        $sql = "UPDATE clients
        SET name=$name ,email=$email 
        WHERE id=$id
        ";
        $update = $connect->prepare($sql);
        $update->execute();
    } while (false);
}
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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="m-3">
        <input type="hidden" value="<?php echo $id; ?>">
        <label for="name">
            name
        </label>
        <input type="text" name="name" required>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' required>
            <label for="phone">phone</label>
            <input type="number" name="phone" class="form-control" required>
        </div>
        <input type="submit" class="btn btn-success" value="submit">
    </form> <button class="m-3" type="button">exit</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>