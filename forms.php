<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //define variables
        $fullname= $email= $gender="";   $comment=  $number=   $age="";
        
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $fullname=test_input($_POST['name']);
            $email=test_input($_POST['email']);
            $comment=test_input($_POST['comment']);
            $number=test_input($_POST['number']);
            $gender=test_input($_POST['gender']);
            $age=test_input($_POST['age']);
        }

        function test_input($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
    ?>

    <h2>Form Validation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>

    Full Name: <input type='text' name="name"/>
    <br/> <br/>
    Email: <input type='text' name="email"/>
    <br/> <br/>
    Age: <input type='text' name="age"/>
    <br/> <br/>
    Number(optional): <input type='text' name="number"/>
    <br/> <br/>
    Gender: 
    <input type='radio' name="gender" value='male'/>
    <input type='radio' name="gender" value='female'/>
    <br/> <br/>
    Comment: <textarea type='text' name="comment" row="30" col="10"></textarea>
    <br/> <br/>
    <input value="click here" name='click here' type="submit"/>
    </form>

    <?php
    echo "<h1>Your Input</h1>";
    echo $fullname;
    echo "<br/>";
    echo $email ;
    echo "<br/>";
    echo $age ;
    echo "<br/>";
    echo $number ;
    echo "<br/>";
    echo $gender ;
    echo "<br/>";
    echo $comment ;
    echo "<br/>";
    ?>
</body>
</html>