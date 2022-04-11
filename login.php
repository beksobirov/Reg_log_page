<!DOCTYPE html>
<?php
  session_start();
	include_once 'connect.php';

	$message = "";
	
	try{
		$con = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		if(isset($_POST["signin"])){
			if(empty($_POST["login"]) || empty($_POST["password"])){
				$message = 'Maydonlarni to`ldirishni unitdingiz!';
			}else{
				$query = "SELECT * FROM participants WHERE login = :l AND password = :p";
				$statement = $con->prepare($query);
				$statement->execute(
					array(
                'l' => $_POST["login"],
                'p' => md5($_POST["password"])
					)
				);
				$count = $statement->rowCount();
				if($count > 0){
					$_SESSION["participant"] = $_POST["login"];
					header("Location: olympiad.php");
				}else{
					$message = 'Login yoki parolni xato kiritdingiz!';
				}
			}
		}
	}catch(PDOEXCEPTION $ex){
		$message = $ex->getMessage();
	}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KIRISH - Dasturlash olimpiadasi</title>
  <style>
  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  form {
    border: 3px solid #f1f1f1;
    max-width: 500px;
    margin: auto;
    box-shadow: 0 10px 20px blue
  }

  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  button {
    background-color: dodgerblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }

  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
  }

  img.avatar {
    include 'connect.php';
    width: 40%;
    border-radius: 50%;
  }

  .container {
    padding: 16px;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }
    .cancelbtn {
      width: 100%;
    }
  }
  </style>
</head>
<body>
  <form method="POST">
  <h2><center>DASTURLASH OLIMPIADASI</center></h2>
    <div class="imgcontainer">
      <img src="logo.jpg" alt="Logo">
    </div>
    <?php
        if(isset($message)){
            echo '<center><h2 style="color: dodgerblue">'.$message.'</h2></center>';
        }
    ?>

    <div class="container">
      <input type="text" placeholder="Loginingizni kiriting" name="login" required>

      <input type="password" placeholder="Parolingizni kiriting" name="password" required>
          
      <button type="submit" class="btn" name="signin">Kirish</button>
      <br>
      <br>
      <b>Ro`yhatdan o`tmaganmisiz?</b>
      <a href="index.php">Ro`yhatdan o`tish</a>
    </div>
  </form>
  <br><br><br>
  <center>
    <b>A'loqa uchun:</b>
    <i>Avezmatov Ixtiyor +998 99 966 59 24</i>
    <a href="https://t.me/ixtiyor0101" target="_blank">Telegram</a>
  </center>
</body>
</html>
