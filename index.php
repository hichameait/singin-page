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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label for="name">
                    <p>Full Name</p>
                    <input type="text" id="name" name="name" placeholder="Enter your Full Name">
                </label>
                <label for="Username">
                    <p>Username</p>
                    <input type="text" id="username" name="username" placeholder="Username ...">
                </label>
                <label for="Email">
                    <p>Email</p>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                </label>
                <label for="pass">
                    <p>Password</p>
                    <input type="password" id="pass" name="pass" placeholder="Enter your password">
                </label>
                <label for="pass-rep">
                    <p>Repeat Password</p>
                    <input type="password" id="pass-rep" name="pass-rep" placeholder="Repeat password">
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