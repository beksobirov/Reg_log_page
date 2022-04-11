<!DOCTYPE html>
<?php
  include_once("check_session.php");
?>				

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dasturlash olimpiadasi</title>
  <style>
  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  form {
    border: 3px solid #f1f1f1;
    max-width: 800px;
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
    
  <form>
  <h2>
    <center>
      <?php
        echo '<b style="color: dodgerblue">'.$_SESSION["participant"].'</b>';
      ?>
      VIDEONI TOMOSHA QILING
      <a href="action_exit.php">CHIQISH</a>
    </center>
  </h2>
    <div class="imgcontainer">
    <iframe src="https://www.youtube.com/embed/PStRp9XE6Dc" title="Dasturlash olimpiadasida qatnashish video roligi" width="100%" height="400px"></iframe>
    </div>

    <div class="container">  
    <a href="#"><button>OLIMPIADADA QATNASHISH</button></a>
    </div>
  </form>

</body>
</html>
