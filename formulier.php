<!--  Dit is de code voor het aanmeldformulier voor het reserveringssysteem voor CLE 2
      Bevat meerdere invulvelden waarbij sommige verplicht zijn
      De input wordt aan de onderkant van de pagina meteen uitgeprint -->

<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #ff0000;}

    </style>
</head>
<body>

<?php
// define variables for the inputs
$nameTeacherErr = $nameChildErr = $emailErr = $dateErr = $timeErr = "";
$nameTeacher = $nameChild = $email = $date = $time = $comment =  "";

//display input or error if there is none
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameTeacherErr = "Name is required";
    } else {
        $nameTeacher = test_input($_POST["name"]);
    }

    if (empty($_POST["name"])) {
        $nameChildErr = "Name is required";
    } else {
        $nameChild = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["date"])) {
        $dateErr = "Date is required";
    } else {
        $date = test_input($_POST["date"]);
    }

    if (empty($_POST["time"])) {
        $timeErr = "Time is required";
    } else {
        $time = test_input($_POST["time"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

}

//function to test data input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!-- html code van het formulier -->
<h2>Formulier reserveringssysteem</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Naam docent: <input type="text" name="name">
    <span class="error">* <?php echo $nameTeacherErr;?></span> <!-- required field! displays error if empty-->
    <br><br>
    Naam kind: <input type="text" name="name">
    <span class="error">* <?php echo $nameChildErr;?></span> <!-- required field! displays error if empty-->
    <br><br>
    E-mail: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span> <!-- required field! displays error if empty-->
    <br><br>
    Datum: <input type="date" id="start" name="date"
           value="2018-07-22"
           min="2020-01-01" max="2022-12-31">
    <span class="error">* <?php echo $dateErr;?></span> <!-- required field! displays error if empty-->
    <br><br>
    Tijd: <input type="time" name="time">
    <span class="error">* <?php echo $timeErr;?></span> <!-- required field! displays error if empty-->
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <input type="submit" name="submit" value="Submit">
</form>

<!-- php echo gegeven input onderkant van de pagina-->
<?php
echo "<h2>Your Input:</h2>";
echo $nameTeacher;
echo "<br>";
echo $nameChild;
echo "<br>";
echo $email;
echo "<br>";
echo $date;
echo "<br>";
echo $time;
echo "<br>";
echo $comment;

?>

</body>
</html>