<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <?php
    $nameErr= $emailErr= $genderErr= 
    $name= $email= $gender= $comment=""; 

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        if(empty($_POST["name"])){
            $nameErr='PLaese enter a valid name';
        }else{
            $name=test_input($_POST["name"]);
            if(!preg_match("/^[a-zA-Z-']*$/",$name)){
                $nameErr="Only letters and white spaces allowed";
            }
        }
        if(empty($_POST["email"])){
            $emailErr='PLaese enter a valid email adress';
        }
        else{
            $email=test_input($_POST["email"]);   
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                $emailErr='The email Adress is incorrect';
            }
        if(empty($_POST["comment"])){
            $comment='';
        }
        else{
            $comment=test_input($_POST["comment"]);  
        }
        if(empty($_POST["gender"])){
            $genderErr='Plese select your gender';
        }
        else{
            $gender=test_input($_POST["gender"]);  
        }
    }
    function test_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    ?>
    <h2>Php Form validation Example</h2>
    <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>
    Full Name: <input type='text' name="name"/>
    <span class='error'>* <?php echo $nameErr; ?></span>
    <br/> <br/>
    Email: <input type='text' name="email"/>
    <span class='error'>* <?php echo $emailErr; ?></span>
    <br/> <br/>
    Gender: 
    <input type='radio' name="gender" value='male'/>
    <input type='radio' name="gender" value='female'/>
    <span class='error'>* <?php echo $genderErr; ?></span>
    <br/> <br/>
    Comment: <textarea type='text' name="comment" row="30" col="10"></textarea>
    <br/> <br/>
    <input value="click here" name='click here' type="submit"/>
</form>
<?php
    echo "<h1>Your Input</h1>";
    echo $name;
    echo "<br/>";
    echo $email ;
    echo "<br/>";
    echo $gender ;
    echo "<br/>";
    echo $comment ;
    echo "<br/>";
    ?>
</body>
</html>