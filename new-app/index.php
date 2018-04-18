<!--apobiyaha@gmail.com-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Web project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" >
        <form action="reg.php" method="post" class="w-100">
            <div class="row my-2">
                <div class="col-sm-12 col-md-6 my-2 col-lg-12" >
                    <textarea name="input" class="form-control" rows="20" cols="50" required="required"></textarea>
                    <button type="submit" class="btn btn-danger btn-lg btn-block my-2">Clear</button>
                    <div class="d-none d-md-block d-lg-none py-2">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" name="login" placeholder="Enter login">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password"><br>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-danger">Clear</button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3  d-md-none d-lg-block my-2">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login"  placeholder="Enter login">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password"><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-danger">Clear</button>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-9 my-2">
                    <?php
                    require_once 'db.php';
                    $sql = "SELECT login, message FROM messages";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $messages = $stmt->fetchAll(PDO::FETCH_OBJ);
                    for ($i=count($messages)-1; $i>=0; $i--){
                        echo ("<label class='font-weight-bold'>" . $messages[$i]->login . "</label>
                                <p>" . $messages[$i]->message . "</p>
                                <hr>
                            ");
                    }
                    ?>
                </div>
            </div>
        </form>
	</div>

</body>
</html>

