<?php
header('Access-Control-Allow-Origin: *');//Should work in Cross Domaim ajax Calling request
$db = new PDO('mysql:dbname=trsIndia;host:localhost;', 'root', 'trsindiacumbre');
if(isset($_POST['type']))
{
    $res = [];

    if($_POST['type'] =="claim"){
        $fname  = $_POST ['FName'];
        $lname  = $_POST ['LName'];
        $mail  = $_POST ['Email'];
        $mobile  = $_POST ['Mob_Num'];
        $flightno=$_POST['Flight_no'];
        $bookno=$_POST['Book_no'];
        $bookdate=$_POST['Book_date'];
        $query1  = "insert into claim(firstName, lastName,email,flightNo,bookingNo,mobile,date) values('$fname','$lname','$mail','$mobile','$flightno','$bookno','$bookdate')";
        $result1 = mysql_query($query1);

        if($result1)
        {
            $res["flag"] = true;
            $res["message"] = "Data Inserted Successfully";
        }
        else
        {
            $res["flag"] = false;
            $res["message"] = "Oppes Errors";
        }

    }
}
else{
    $res["flag"] = false;
    $res["message"] = "Invalid format";
}

    echo json_encode($res);
    header('Location:index.html');
?>