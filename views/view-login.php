<html lang="en">

<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form {
            width: 500px;
            height: 500px;
            box-shadow: 0px 0px 1px 0px black;
            padding: 30px;
        }

        .group {
            width: 500px;
            height: 100px;
        }

        .group input {
            width: 500px;
            height: 50px;
            text-align: center;
            border: 1px solid whitesmoke;
        }

        .group input[type=submit] {
            cursor: pointer;
            border: 0;
        }
        .alert-danger{
            width: 500px;
            height: 50px;
            background-color: red;
            text-align: center;
            color: white;
            line-height: 50px;
        }
        .alert-success{
            width: 500px;
            height: 50px;
            background-color: red;
            text-align: center;
            color: white;
            line-height: 50px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form">
            <form action="../Auth/login.php" method="post">

                <?php if ($_SESSION['response']): ?>
                    <div class="group">
                        <div class="alert alert-danger"><?php echo $_SESSION['response'] ?></div>
                    </div>
                <?php endif;
                $_SESSION['response'] = NULL ?>
                <?php if ($_SESSION['danger']): ?>
                    <div class="group">
                        <div class="alert alert-success"><?php echo $_SESSION['danger'] ?></div>
                    </div>
                <?php endif;
                $_SESSION['danger'] = NULL ?>

                <div class="group">
                    <input required  type="text" name="username" placeholder="please enter your username">
                </div>

                <div class="group">
                    <input  required type="password" name="password" placeholder="please enter your password">
                </div>

                <div class="group">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
        </div>
    </div>


</body>

</html>