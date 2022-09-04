<?php
	if(isset($_POST['name'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydata";

        $conn = new mysqli($servername,$username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        
        $name=$_POST['name'];
        $cardn=$_POST['n2'];
        $expd=$_POST['n3'];
        $cvv=$_POST['p1'];
        $sql = "INSERT INTO `payformdata`(`Name`, `Card Number`, `Exp. Date`, `CVV`) VALUES ('$name','$cardn','$expd','$cvv')";
        if($conn->query($sql) == true){
            $insert = true;
            echo "<h1 style='color:white;text-align: center;'>Successfully Updated</h1>";
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
        $conn->close(); 
        
	}       
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @media screen and (min-width:1000px){
            body{
                background-color: black;
            }
        }
        div
        {
            background-color: rgb(244, 237, 236);
            margin-top: 10px;
            margin-left: 20px;
            margin-right: 30px;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 20px;
            border: 0.1px solid black;
        }
        div h1
        {
            padding-top: 0px;
            padding-bottom: 0px;
            text-align: center;
        }
        
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <div class="d2">
            <b><h1>Payment Form</h1></b>
            <hr>
            <h2>User Information</h2>
            <h3>Name:*<br> <input name="name" id="name" type="text" placeholder="Oom Pandey" style="width: 99%; height: 30px; padding: 5px; " required></h3>
            <p>
                <fieldset style="background-color: white;">
                    <legend style="font-size: large;"><b>Gender</b></legend>
                    Male <input type="radio" name="a"> Female <input type="radio" name="a" >
                </fieldset>
            </p>
            <p>
                <b>Address:</b> <br>
                <textarea name="" id="ta1" placeholder="Enter your Address" cols="30" rows="10" style="width: 99%; "></textarea>
            </p>
            <p>
                <b>Email:</b><br>
                <input type="email" name="" id="e1" placeholder="abcdef@gmail.com" style="width: 99%; height: 30px; padding: 5px; ">
            </p>
            <p>
                <b>Pincode:</b><br>
                <input type="number" name="" id="n1" placeholder="123456" style="width: 99%; height: 30px; padding: 5px; ">
            </p>
        </div>
        <div class="d2">
            <b><h1>Payment Information</h1></b>
    
            <p><b>Accepted Cards</b><br>
                <img src="data:image/png;base64,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" style="width: 5%;" alt="img1">&nbsp;
    
                <img src="data:image/png;base64,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" style=" height: 36.4; width: 4%;" alt="">
            </p>
            <p><b>Card Type:</b><br>
                <select name="" id="o" style="width: 100%; height: 30px; padding: 5px;">
                    <option value="o1">--Select Card Type--</option>
                    <option value="o2">Visa</option>
                    <option value="o3">American Express</option>
                </select>
            </p>
            <p><b>Card Number:*</b><br>
                <input type="number" name="n2" id="n2" placeholder="1111-2222-3333-4444" style="width: 99%; height: 30px; padding: 5px; " required>
            </p>
            <p>
                <b>Expiration Date:</b><br>
                <input type="date" name="n3" id="n3" placeholder="dd/mm/yy" style="width: 99%; height: 30px; padding: 5px; ">
            </p>
            <p>
                <b>CVV:*</b><br>
                <input type="password" name="p1" id="p1" placeholder="123" style="width: 99%; height: 30px; padding: 5px; "required>
            </p>
            <p>
                <input type="submit" value="Pay Now" style="width: 100%; height: 30px; padding: 5px; background-color: seagreen ; color: whitesmoke;">
    
            </p>
        </div>
        
    </form>
    

</body>

</html>