<?php
include('mailer.php');
//variables
$erreur_lastname = $erreur_firstname =  $erreur_message =  $erreur_gender =  $erreur_country = $erreur_mail = "";
$lastname = $firstname = $email = $message = $gender = $country = "";

$user = array(
    "firstname" => $firstname,
    "lastname" => $lastname,
    "gender" => $gender,
    "mail" => $email,
    "coutry" => $country,
    "message" => $message,
);

//securiser les entrées
function secu($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    return $data;
}

@$submit = secu($_POST['submit']);
@$lastname = secu($_POST["lastname"]);
@$firstname = secu($_POST["firstname"]);
@$email = secu($_POST["mail"]);
@$message = secu($_POST["message"]);
@$gender = secu($_POST["gender"]);
@$country = $_POST["country"];




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["lastname"])) {
        $erreur_lastname = "This field is required";
    } else {
        $lastname = secu($_POST["lastname"]);
    }


    if (empty($_POST["firstname"])) {
        $erreur_firstname = "This field is required";
    } else {
        $firstname = secu($_POST["firstname"]);
    }


    if (empty($_POST["message"])) {
        $erreur_message = "What is your question ?";
    } else {
        $message = secu($_POST["message"]);
    }

    if (empty($_POST["gender"])) {
        $erreur_gender = "What is your gender ?";
    } else {
        $gender = secu($_POST["gender"]);
    }

    if (empty($_POST["country"])) {
        $erreur_country = "Where are you from ?";
    } else {
        $country = $_POST["country"];
    }

    if (empty($_POST["mail"])) {
        $erreur_mail = "Please enter a valid mail adress";
    } else {
        $email = secu($_POST["mail"]);
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Hackers Poulette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <link href='https://fonts.googleapis.com/css?family=Bellota' rel='stylesheet'>
    <style>
    body {
        font-family: 'Bellota';
        font-size: 1em;
    }

    .error {
        color: #f54d05;
    }
    </style>
</head>

<header style="background-color:#0d8187" class="container-fluid mt-2">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="./asset/hackers-poulette-logo.png" width="120" height="100" alt="">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="#">Home</a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link active" href="#">Contact <span class="sr-only"></span></span></a>
        </div>
    </nav>

</header>

<body style="background-color:#303030">
    <div class="container-fluid  ">
        <img src="./asset/hackers-poulette-logo.png" alt="Hackers's poulette logo" width="350" height="300" />
    </div>

    <div class="container-fluid mt-2 row justify-content-center mx-auto">
        <h3 class="d-inline p-2 m-1  text-white" style="background-color:#0d8187">
            <strong>Please fill in your information and we'll answer ASAP !</strong>
        </h3>

        <!-- Le form -->

        <p><span class="error">* required field.</span></p>

        <form method="post" action="<?php
                                    echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group ">
                <div class="row">

                    <div class="col-md-4 text-white">
                        <label for="lastname">Last Name
                            <span class=" error">* <?php echo $erreur_lastname; ?></span>
                        </label>
                        <input id="lastname" class="form-control" type="text" name="lastname"
                            placeholder="Please enter your last name" required>
                    </div>

                    <div class="col-md-4 text-white">
                        <label for="firstname">First Name
                            <span class="error"> *<?php echo $erreur_firstname; ?></span>
                        </label>
                        <input id="firstname" class="form-control" type="text" name="firstname"
                            placeholder="Please enter your first name" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">

                        <div class="col-md-4 text-white">
                            <label for="mail">Mail
                                <span class="error"> *
                                    <?php echo $erreur_mail; ?></span>
                            </label>
                            <input id="mail" class="form-control" type="email" name="mail"
                                placeholder="example@mail.com" required>
                        </div>

                        <div class="col-md-4 text-white">
                            <label for="country">Country<span class="error"> *
                                    <?php echo $erreur_country; ?></span>
                            </label>
                            <input id="country" class="form-control" type="text" name="country"
                                placeholder="Your country" required>
                        </div>
                    </div>
                </div>

                <div class=" form-group">
                    <div class="row">

                        <div class="col-md-3 text-white">
                            <label for="message">Subject of your message </label>
                            <select class="form-control" name="selection">
                                <option selected>Open this select menu</option>
                                <option value="website">Our Website</option>
                                <option value="technical">Technical support</option>
                                <option value="SAV">After Sale</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5 text-white">
                        <label for="Textarea" class="form-label">Your message<span class="error"> *
                                <?php echo $erreur_message; ?></span>
                        </label>
                        <textarea class="form-control" rows="5" name="message"></textarea>
                    </div>

                    <div class="form-group text-white">
                        <label>Gender</label>
                        <div class="form-row">
                            <div class="custom-control custom-control-inline custom-radio">
                                <input type="radio" class="custom-control-input" name="gender" value="male" checked>
                                <label class="custom-control-label" for="radio1">Male<span class="error"> *
                                        <?php echo $erreur_gender; ?></span></label>
                            </div>
                            <div class="custom-control custom-control-inline custom-radio">
                                <input type="radio" class="custom-control-input" name="gender" value="female" checked>
                                <label class="custom-control-label" for="radio2">Female<span class="error"> *
                                        <?php echo $erreur_gender; ?></span></label>
                            </div>
                        </div>
                    </div>

                    <input class="btn text-white" type="submit" value="submit" style="background-color:#0d8187"
                        class="btn btn-success validate formulaire" />

        </form>
    </div>
    <div class="text-white">
        <?php
        echo "<h2>Your given values are as:</h2>";
        echo $lastname;
        echo "<br>";

        echo $firstname;
        echo "<br>";

        echo $email;
        echo "<br>";

        echo $message;
        echo "<br>";

        echo $gender;
        echo "<br>";

        echo $country;

        ?>
    </div>


    <!-- le footer -->


</body>