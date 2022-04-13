<?php 



$servername = "localhost";
$username= "root";
$password= "";
$dbase="classwork";
$conn = mysqli_connect($servername, $username, $password, $dbase);
if($conn){//test the connection
    echo "connection successful"."<br>";

}else{
    die("connection failed". mysqli_connect_error());
}
$sq1="CREATE TABLE IF NOT EXISTS paper
      ( SN INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         FULLNAME VARCHAR(50) NOT NULL,
         EMAIL VARCHAR(100) NOT NULL, MYSUBJECT VARCHAR(50) NOT NULL, TEXTAREA VARCHAR(200) NULL,
         DT DATE NULL)";
         
         if(mysqli_query($conn,$sq1)){
             echo "table has been created". "<br><br>";

         }else{
             echo "could not create the table".mysqli_error($conn);

         }

         $name = $_POST["fullname"];
         $email = $_POST["email"];
         $mysubject = $_POST["mysubject"];
         $textarea =$_POST["textarea"];
         $d=date("y-m-d");

         $sq2 = "INSERT INTO paper (FULLNAME, EMAIL, MYSUBJECT, TEXTAREA, DT)
         VALUES('$name', '$email','$mysubject','$textarea', '$d')";
         if(mysqli_query($conn,$sq2)){
             echo "Table update succesfull"."<br>";

         }else{
             echo "Table could not be updated".mysqli_error($conn);
         }
         mysqli_close($conn);
    header("Location:paper.html");
         
$errMessage ="";
//retrieving the form data in variables
// $name = $_POST["fullname"];
// $mysubject = $_POST["mysubject"];
// $textarea = $_POST["textarea"];
// $address = $_POST["address"];
// $phone = $_POST["phone"];
// $email = $_POST["email"];
// $passwword = $_POST["password"];
// $gender = $_POST["gender"];
// $filename = $_FILES["file"] ["name"];
 
if ($_POST) {
    //CHECKING WHETHER THE FORM FIELDS ARE EMPTY
    if (empty($name))
    $errMessage .= "Name cannot be left blank.<br>";
    if (empty($subject))
    $errMessage .= "subject cannot be left blank.<br>";
    if (empty($textarea))
    $errMessage .= "description cannot be left blank.<br>";
    // if (empty($address))
    // $errMessage .= "address cannot be left blank.<br>";
    // if (empty($phone))
    // $errMessage .= "phone cannot be left blank.<br>";

    //validatting the phone field for integer values

    // else if (!filter_var($phone, FILTER_VALIDATE_INT))
    //    $errMessage .= "invalid phone Number.<br>";
       if (empty($email))
       $errMessage .= "email cannot be left blank.<br>";
       //validating the email field for valid email
       else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
       $errMessage .= "invalid email ID.<br>";

    //    if(empty($password))
    //    $errMessage .= "password cannot be left blank.<br>";

    //    if(empty($_POST[$gender]))
    //    $errMessage .= "Gender cannot be left blank.<br>";

    //    if (empty($filename))
    //    $errMessage .= "please upload address proof.<br>";

       //checking wheteher password and confirm password are same
    //    if ($password!=$_POST["cpassword"])
    //    $errMessage .= "password and confirm password must be the same.<br>";

       if (empty($errMessage)){
           echo " <p>Thank you for registering . here is the information you submitted:</p>
         
       
           Name: $name<br>
         
           Email ID: $email<br> ";
        }
    }
        
           //retreiving the temporarry location of the uploaded file and moviing it to new location

        //    $pathname = $_FILES["file"] ["tmp_name"];
        //    if (move_uploaded_file($_FILES["files"] ["tmp_name"], "proof/addressproof.jpeg")){
        //        echo "address proof: successfully uploaded.<br>";
        //    }
        //    else {
        //        echo "address proof: There is a problem uploading your file - please try again<br>";
        //    }else {
        //        echo "<font color=red>$errMessage</font>";
        //        exit(0);
        //    }
           
     

         
?>