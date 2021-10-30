<?php 
    include('config/constants.php');
?>

<html>
    <head>
        <title>Registration Form</title>
        <link rel="stylesheet" href="style.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>


    <div class="registration-form">
    <h2>Fill the Form</h2>
    <form method="POST" action="">
        <div>
        <label>Name:</label>
        <input type="text" name="name" placeholder="Enter your Name">
        </div>

        <div>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter your Email">
        </div>

        <div>
        <label>Date Of Birth:</label>
        <input type="date" name="date" placeholder="Enter your DOB" required>
        </div>

        <div>
        <label>About yourself:</label>
        <textarea name="about_yourself" placeholder="aboutyourself"></textarea>
        </div>
         
        <div class="g-recaptcha" data-sitekey="6LeozooUAAAAABzm4nBRhxbcqapbiLACfaD1Y1F2">
        </div>

        <input type="submit" name="submit" value="submit">

    </form>

    <div class="status">

    </div>

    <?php
     if(isset($_POST['submit']))
     {

        $secretKey = "6LfKjAAdAAAAAEdXBNUrpzL46m78hRsurjVyAnb5"
;
        $url = "https://www.google.com/recaptcha/api/siteverify?
        secret=$secretKey";
    }

    ?>
    </div>

    </body>
</html>

<?php 
            
        //Connect Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //Select Database
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        //Create SQL Query to Get DAta from Databse
        $sql = "SELECT * FROM tbl_form";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);



//Check whether the SAVE button is clicked or not
if(isset($_POST['submit']))
{
    //echo "Button Clicked";
    //Get all the Values from Form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $about_yourself = $_POST['about_yourself'];
    
    
    //Connect Database
    $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    
    //SElect Database
    $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
    
    //CReate SQL Query to INSERT DATA into DAtabase
    $sql2 = "INSERT INTO tbl_form SET 
        name = '$name',
        email = '$email',
        date = '$date',
        about_yourself = '$about_yourself'
    ";
    
    //Execute Query
    $res2 = mysqli_query($conn2, $sql2);
}

?>