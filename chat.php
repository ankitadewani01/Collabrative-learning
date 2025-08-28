<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<head> <link rel="stylesheet" href="home.css"></head>
<body>
  
<header>
    <div class="nav-bar" >
            <h1 class="heading-nav">Quesol</h1>
        </div>
    <div class="nav-barr">
        <div class="home" onclick="window.location.href='quesol.html'">
            <p>HOME</p>
        </div>
        <div class="doctor-consultation" onclick="window.location.href='http://localhost/try chat/tryforums.html'">
            <p>QUERIES</p>
        </div>
        <div class="awareness" onclick="window.location.href='http://localhost/try chat/users.php'">
            <p>CHAT</p>
        </div>
        <!--<div class="accounts" onclick="window.location.href='http://localhost/try chat/indexx.php'">
                <p>ACCOUNTS</p>
            </div>-->
        </header>
  <div class="wrapper">
    <section class="chat-area">
      <glare>


      
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['image']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
        </glare>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
  <footer>
        <div class="footer-content">
            <p>Quesol</p>
            <ul class="social-links">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
                <!-- Add more social media links as needed -->
            </ul>
            <p>Contact Us: <a href="mailto:info@quesol.com">info@quesol.com</a></p>
        </div>
    </footer>
    
</body>
</html>
