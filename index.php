<!DOCTYPE html>
<?php
  include_once 'connect.php';

	$con = new mysqli($host, $username, $password, $dbname);

	if($con->connect_error){
		die("Xatolik yuz berdi. Xatolik sababi: " . $con->connect_error);
	}
  
	if(isset($_POST["signup"])){
    $full_name = $_POST['full_name'];
    $birthday = $_POST['birthday'];
		$home = $_POST["home"];
		$passport = $_POST["passport"];
		$school = $_POST["school"];
		$phone = $_POST["phone"];
    $login = $_POST["login"];
    $password = md5($_POST["password"]);

		$insertParticipant = "INSERT INTO participants (full_name, birthday, home, passport, school, phone, login, password, reg_time)
                            VALUES ('$full_name', '$birthday', '$home', '$passport', '$school', '$phone', '$login', '$password', now())";
  }
  if(isset($_POST["signup"])){
    if ($con->query($insertParticipant) === TRUE) {
      $participant_image = $_FILES["participant_image"]["tmp_name"];
      move_uploaded_file($participant_image, "images/".$full_name.".jpg");
      echo '<center style="color: dodgerblue">
                <h3>'.$full_name.' siz muvaffaqiyatli ro`yhatdan o`tdingiz!</h3>
              </center>';
    } else {
      echo "Xatolik: " . $insertParticipant . "<br>" . $con->error;
    }
  }
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dasturlash olimpiadasi</title>
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    *{
      box-sizing: border-box;
    }

    .input-container {
      display: -ms-flexbox;
      display: flex;
      width: 100%;
      margin-bottom: 15px;
    }

    .icon {
      padding: 10px;
      background: dodgerblue;
      color: white;
      min-width: 50px;
      text-align: center;
    }

    .input-field {
      width: 100%;
      padding: 10px;
      outline: none;
    }

    .input-field:focus {
      border: 2px solid dodgerblue;
    }

    .btn {
      background-color: dodgerblue;
      color: white;
      padding: 15px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .btn:hover {
      opacity: 1;
    }
    form{
      box-shadow: 0 10px 20px blue;
      max-width: 500px;
      margin: auto;
      box-sizing: border-box;
      padding: 20px;
    }
  </style>
</head>
<body>

  <form accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
    <h2><center>DASTURLASH OLIMPIADASI</center></h2>
    <div class="input-container">
      <i class="fa fa-user icon"></i>
      <input class="input-field" type="text" placeholder="F.I.SH" name="full_name" required>
    </div>

    <div class="input-container">
      <i class="fa fa-image icon"></i>
      <input class="input-field" type="file" name="participant_image" required>
    </div>
    
    <div class="input-container">
      <i class="fa fa-calendar icon"></i>
      <input class="input-field" type="date" name="birthday" required>
    </div>
    
    <div class="input-container">
      <i class="fa fa-home icon"></i>
      <select class="input-field" name="home">
        <option value="Andijon viloyati">Andijon viloyati</option>
        <option value="Buxoro viloyati">Buxoro viloyati</option>
        <option value="Farg`ona viloyati">Farg`ona viloyati</option>
        <option value="Jizzax viloyati">Jizzax viloyati</option>
        <option value="Xorazm viloyati">Xorazm viloyati</option>
        <option value="Namangan viloyati">Namangan viloyati</option>
        <option value="Navoiy viloyati">Navoiy viloyati</option>
        <option value="Qashqadaryo viloyati">Qashqadaryo viloyati</option>
        <option value="Qoraqolpog`iston Respublikasi">Qoraqolpog`iston Respublikasi</option>
        <option value="Samarqand viloyati">Samarqand viloyati</option>
        <option value="Sirdaryo viloyati">Sirdaryo viloyati</option>
        <option value="Surxondaryo viloyati">Surxondaryo viloyati</option>
        <option value="Toshkent viloyati">Toshkent viloyati</option>
      </select>
    </div>
    
    <div class="input-container">
      <i class="fa fa-male icon"></i>
      <input class="input-field" type="text" placeholder="Passport ma'lumoti (AB1234567)" name="passport" required>
    </div>
    
    <div class="input-container">
      <i class="fa fa-university icon"></i>
      <input class="input-field" type="text" placeholder="Tahsil olayotgan maktabi (1-son maktab)" name="school" required>
    </div>

    <div class="input-container">
      <i class="fa fa-phone icon"></i>
      <input class="input-field" type="text" placeholder="+998901234567" name="phone" required>
    </div>

    <div class="input-container">
      <i class="fa fa-user icon"></i>
      <input class="input-field" type="text" placeholder="Login" name="login" required>
    </div>

    <div class="input-container">
      <i class="fa fa-key icon"></i>
      <input class="input-field" type="password" placeholder="Parol" name="password" required>
    </div>

    <button type="submit" class="btn" name="signup">Ro`yhatdan o`tish</button>
    <br>
    <br>
    <b>Ro`yhatdan o`tganmisiz?:</b>
    <a href="login.php">Kirish</a>
  </form>
  <br><br><br>
  <center>
    <b>A'loqa uchun:</b>
    <i>Avezmatov Ixtiyor +998 99 966 59 24</i>
    <a href="https://t.me/ixtiyor0101" target="_blank">Telegram</a>
  </center>
</body>
</html>