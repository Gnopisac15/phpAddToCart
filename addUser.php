<?php 
    require_once 'store.php';
    $store->addUser();
    $users = $store->getUsers();

    foreach($users as $user)
    {
        echo $user['first_name']." ".$user['last_name']." ". $user['email']."<br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>PHP Store | Sign Up</title>
</head>
<body>
<div class="contanier">

    <div class="form-container col-sm-4 mx-auto mt-4 border rounded p-4">
        <p class="display-4 text-center p-3">Sign Up Form<p>
        <form action="" method="post" class="p-4">
            <div class="form-input">
                <label for="username">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name" required>
            </div>
            <div class="form-input">
                <label for="username">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name" required>
            </div>
            <div class="form-input">
                <label for="username">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="@email"required>
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password"required>
            </div>
            <button type="submit" name="add" class="btn btn-outline-dark mt-4  w-100">Login</button>
           
        </form>
    </div>
 
</div>
</body>
</html>