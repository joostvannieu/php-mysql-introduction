<?php
    require "auth.php";

    checkIfLoggedIn();

    $userId = $_GET['user'];
    $data = fetchUserInfo(openConnection(), $userId);
    //var_dump($_GET);
    //var_dump($data);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php">Overview</a></li>
                <li><a href="register.php">Insert</a></li>
                <li><a href="#">Placeholder</a></li>
                <li><a href="#">Placeholder2</a></li>
            </ul>
        </nav>
        <div>
            <div>
                <div>
                    <img src="<?php echo $data['avatar'] ?>" alt="avatar" width="100px">
                </div>
                <div>
                    <?php echo $data['username'] ?>
                </div>
                <div>
                    <?php echo "Member since: " . $data['created_at'] ?>
                </div>
            </div>
            <div>
                <div>
                    <?php echo $data['first_name'] . " " . $data['last_name'] ?>
                </div>
            </div>
            <div>
                <div>
                    <?php echo "LinkedIn: " . $data['linkedin'] . "<br>Github: " . $data['github'] ?>
                </div>
            </div>
            <div>
                <div>
                    <?php echo "E-mail: " . $data['email'] ?>
                </div>
                <div>
                    <?php echo "Language: " . $data['preferred_language'] ?>
                </div>
            </div>
            <div>
                <div>
                    <?php echo "E-mail: " . $data['email'] ?>
                </div>
            </div>
            <div>
                <div>
                    <?php echo "My YouTube: " . $data['video'] ?>
                </div>
            </div>
            <div>
                <div>
                    <?php echo "My favorite quote: " . $data['quote'] ?>
                </div>
                <div>
                    <?php echo "By: " . $data['quote_author'] ?>
                </div>
            </div>
        </div>
    </body>
</html>