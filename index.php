<?php
require "connection.php";

$fullname = $email = $password = $repassword = $username = "";
$nameErr = $emailErr = $passwordErr = $userErr = $passErr2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "please enter a valid name";
    } else {
        $fullname = cleaner($_POST["name"]);
    }
    if (empty($_POST["email"])) {
        $emailErr = "please enter a valid email like : user@email.com";
    } else {
        $email = cleaner($_POST["email"]);
    }

    if (empty($_POST["username"]) || strpos(cleaner($_POST["username"]), "@") === true) {
        $userErr = "please enter a valid username";
    } else {
        $username = cleaner($_POST["username"]);
    }

    if (empty($_POST["pass"]) || empty($_POST["pass-rep"])) {
        $passwordErr = "please enter a valid password";
    } elseif (cleaner($_POST["pass-rep"]) !== cleaner($_POST["pass"])) {
        $passErr2 = "passwords do not match";
    } elseif (strlen($_POST["pass"]) < 8) {
        $passwordErr = "password must be at least 8 characters";
    } else {
        $password = password_hash(cleaner($_POST["pass"]), PASSWORD_DEFAULT);
    }

    $id = rand(1000, 9999);

    $id_list = "SELECT * FROM Users WHERE UserID = $id";
    $result = $conn->query($id_list);
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO Users (UserID, FullName, Username, Email, Pass)
        VALUES ('$id', '$fullname', '$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "UserID already exists. Please try again.";
    }
    $conn->close();
}

function cleaner($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing-in</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="left-said">
            <h3>Creat Your Account</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="name">
                    <p>Full Name</p>
                    <input type="text" id="name" name="name" placeholder="Enter your Full Name"
                        value="<?php echo $fullname; ?>">
                    <span class="error"><?php echo $nameErr; ?></span>
                </label>
                <label for="Username">
                    <p>Username</p>
                    <input type="text" id="username" name="username" placeholder="Username ..."
                        value="<?php echo $username; ?>">
                    <span class="error"><?php echo $userErr; ?></span>
                </label>
                <label for="Email">
                    <p>Email</p>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        value="<?php echo $email; ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </label>
                <label for="pass">
                    <p>Password</p>
                    <input type="password" id="pass" name="pass" placeholder="Enter your password">
                    <span class="error"><?php echo $passwordErr; ?></span>
                </label>
                <label for="pass-rep">
                    <p>Repeat Password</p>
                    <input type="password" id="pass-rep" name="pass-rep" placeholder="Repeat password">
                    <span class="error"><?php echo $passErr2; ?></span>
                </label>
                <button type="submit">Sing Up</button>
            </form>
        </div>
        <div class="right-said">
            <h5>YOUR PARTNER TO BUILD</h5>
            <h2>INTERNAL TOOLS</h2>
            <img src="https://nocodedistrict.com/wp-content/uploads/2024/06/Ativo-35@2x.png" alt="">
        </div>
    </div>
</body>

</html>