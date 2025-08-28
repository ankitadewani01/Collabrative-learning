<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<html>
    <head>
        <title>Quesol</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="home.css">
        <script src="ad.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
        </head>
        <header>
    <div class="nav-bar" >
            <h1 class="heading-nav">Collaborative E-Learning</h1>
        </div>
    <div class="nav-barr">
        <div class="home" onclick="window.location.href='quesol.html'">
            <p>HOME</p>
        </div>
        <div class="accounts" onclick="window.location.href='http://localhost:5173/select-language'">
                <p>PRACTICE</p>
            </div>
            
        <div class="accounts" onclick="window.location.href='http://127.0.0.1:5500/chatbot/index.html'">
            <p>AI CHATBOT</p>
        </div>
        <div class="doctor-consultation" onclick="window.location.href='http://localhost:3002/login'">
            <p>Code Rooms</p>
        </div>
        
        <div class="doctor-consultation" onclick="window.location.href='http://localhost/try chat/tryforums.html'">
            <p>QUERIES</p>
        </div>
        <div class="awareness" onclick="window.location.href='http://localhost/try chat/users.php'">
            <p>CHAT</p>
        </div>
        
        </header>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['image']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout" style="display:block;">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>
 <footer>
        <div class="footer-content">
            <p>Collaborative E-Learning</p>
            <ul class="social-links">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
                <!-- Add more social media links as needed -->
            </ul>
            <p>Contact Us: <a href="mailto:info@quesol.com">info@collaborativeelearning.com</a></p>
        </div>
    </footer>
</body>
</html>
