<?php
if (isset($message)) {
  foreach ($message as $message) {
    echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap'); */
    @import url('https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300;400;500;600;700;800;900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      /* font-family: 'Poppins', sans-serif; */
      font-family: 'Encode Sans', sans-serif;
    }

    html,
    body {
      min-width: 100%;
      overflow-x: hidden;
      font-size: 16px;
      /* font-family: 'Poppins', sans-serif; */
    }



    header {

     
      text-align: center;
      /* position: relative; */
    }

    header .navigation {
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      min-height: 12vh;
      min-width: 100%;
      z-index: 10;
      background: #fff;
    }

    header .navigation .logo {
      margin-left: 20px;
    }

    header .navigation .logo img {
      height: 70px;
    }

    .menu-list {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
      justify-content: space-around;
      align-items: center;
      width: 45%;
      margin: auto 20px auto 0;
      font-family: 'Encode Sans', sans-serif;
    }

    .menu-list li {
      margin: 0 15px;
    }

    .menu-list a {
      color: #268133;
      font-size: 1.25rem;
      /* letter-spacing: 2px; */
      text-transform: uppercase;
      cursor: pointer;
      transition: color 1s ease, border 1s ease;
      text-decoration: none;
      position: relative;
    }

    header .navigation .menu-list li a:hover {
      color: #3e9943;
      /* Change color on hover */
    }

    /* Active Link Effect */

    header .navigation .menu-list li a::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #268133;
      transform: scaleX(0);
      /* Initially hidden */
      transform-origin: left;
      transition: transform 0.1s ease;
    }

    header .navigation .menu-list li a:hover::after {
      transform: scaleX(1);
    }

    /* Hamburger Icon Styles */
    .hamburger {
      display: none;
      flex-direction: column;
      cursor: pointer;
      margin-right: 20px;
      /* padding: 2px; */
    }

    .bar {
      width: 30px;
      height: 2px;
      margin: 7px;
      background-color: #268133;
      transition: 0.4s;
      margin: 3.5px;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
      header .navigation .menu-list {
        width: 60%;
      }

      header .navigation .menu-list li a {
        font-size: 1rem;
      }

    }


    @media screen and (max-width: 768px) {
      .menu-list {
        display: none;
        position: absolute;
        top: 12vh;
        min-width: 100%;
        background-color: white;
        text-align: center;

        flex-direction: column;
        left: 0;
      }

      .menu-list li {
        display: block;
        margin: 10px 0;
      }

      header .navigation .menu-list li a {
        display: block;
        padding: 20px;
        transition: color 1s ease, padding 1s ease, background-color 1s ease;

      }

      header .navigation .menu-list li a:hover {
        color: #26822e;
        padding-left: 30px;
        background: whitesmoke;
      }

      .menu-list.show {
        display: flex;
        
      }

      .hamburger {
        display: flex;
        
      }
    }
  </style>

</head>

<body>
  <header>
    <nav class="navigation">
      <!-- Logo -->
      <div class="logo">
        <a href="../index.php"><img src="../img/logo.jpeg" alt="Espacios Logo"></a>
      </div>

      <!-- Navigation -->
      <ul class="menu-list">
        <li><a href="../index.php"><b>Home</b></a></li>
        <li><a href="../about.php"><b>About</b></a></li>
        <li><a href="../services.php"><b>Services</b></a></li>
        <!-- <li><a href="./home.php"><b>Blog</b></a></li> -->
        <li><a href="./home.php"><b>Blog</b></a></li>
        <li><a href="../contact.php"><b>Contact</b></a></li>
        <li><a href="../payment.php"><b>Register</b></a></li>
      </ul>

      <!-- <div class="humbarger">
        <div class="bar"></div>
        <div class="bar2 bar"></div>
        <div class="bar"></div>
      </div> -->

      <div class="hamburger" onclick="toggleMenu()">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>

    </nav>
  </header>

  <script>
    function toggleMenu() {
      var menuList = document.querySelector('.menu-list');
      menuList.classList.toggle('show');
    }
  </script>


</body>

</html>