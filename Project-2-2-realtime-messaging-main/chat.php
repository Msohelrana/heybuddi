<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: 'Josefin Sans', sans-serif;
     /* background: rgb(240, 255, 250); */
}
body{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-image: radial-gradient( circle, #E1EBEE, #E0FFFF,#B2FFFF,#AFEEEE);
}
.wrapper{
    background: #fff;
    width: 450px;
    border-radius: 16px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),0 32px 64px -48px rgba(0,0,0,0.5);
}



.users{
    padding: 25px 30px;
}
.users header,
.users-list a{
    display: flex;
    align-items: center;
    padding-bottom: 20px;
    justify-content: space-between;
    border-bottom: 1px solid #e6e6e6;
}
.wrapper img{
    object-fit: cover;
    border-radius: 50%;
}
:is(.users, .users-list) .content{
    display: flex;
    align-items: center;
}
.users header .content img{
    height: 50px;
    width: 50px;
}
:is(.users, .users-list) .details{
    margin-left: 15px;
    color: #000;
}
:is(.users, .users-list) .details span{
    font-size: 18px;
    font-weight: 500;
}
.users header .logout{
    background: #333;
    color: #fff;
    font-size: 17px;
    padding: 7px 15px;
    border-radius: 5px;
}
.users .search{
    margin: 20px 0;
    display: flex;
    align-items: center;
    position: relative;
    justify-content: space-between;
  
}
.users .search .text{
    font-size: 18px;
}
.users .search input{
    position: absolute;
    height: 42px;
    width: calc(100% - 40px);
    border: 1px solid #ccc;
    padding: 0 13px;
    font-size: 16px;
    border-radius: 5px 0 0 5px;
    outline: none;
    opacity: 0;
    pointer-events: none;
    transition: all 0.1s ease;
}
.users .search input.active{
    opacity: 1;
    pointer-events: auto;
}
.users .search button{
    width: 47px;
    height: 42px;
    border: none;
    outline: none;
    color: #333;
    background: #fff;
    cursor: pointer;
    font-size: 17px;
    border-radius: 0 5px 5px 0;
    transition: all 0.1s ease;
}
.users .search button.active{
    color: #fff;
    background: #333;
}
.users .search button.active i::before{
    content: "\f00d";
}
.users-list{
 max-height: 350px;
 overflow-y: auto;
}
:is(.users-list, .chat-box)::-webkit-scrollbar{
    width: 0;
}
.users-list a{
    padding-right: 15px;
    page-break-after: 10px;
    margin-bottom: 15px;
    border-block-color: #f1f1f1;
}
.users-list a:last-child{
    border: none;
    margin-bottom: 0px;
}
.users-list a .content img{
    height: 40px;
    width: 40px;
}
.users-list a .content p{
    color: #67676a;
}
.users-list a .status-dot{
    font-size: 12px;
    color: #468669;
}
.users-list a .status-dot.offline{
    color: #ccc;
}

.chat-area header{
    display: flex;
    align-items: center;
    padding: 18px 30px;
    background-color: aliceblue;
}
.chat-area header .back-icon{
    font-size: 18px;
    color: #333;
}
.chat-area header img{
    height: 45px;
    width: 45px;
    margin: 0 15px;
}
.chat-area header span{
    font-size: 17px;
    font-weight: 500;
}
.chat-box{
    height: 500px;
    overflow-y: auto;
    background: #f7f7f7;
    padding: 10px 30px 20px 30px;
    box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-box .chat{
    margin: 15px 0;
}
.chat-box .chat p{
    word-wrap: break-word;
    padding: 8px 16px;
    box-shadow: 0 0 32px rgb(0 0 0 / 8%),
                0 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-box .outgoing{
    display: flex;
}
.outgoing .details{
    margin-left: auto;
    max-width: calc(100% - 130px);
}
.outgoing .details p{
    background: #333;
    color: #fff;
    border-radius: 18px 18px 0 18px;
}
.chat-box .incoming{
    display: flex;
    align-items: flex-end;
}
.chat-box .incoming img{
    height: 35px;
    width: 35px;
}
.incoming .details{
    margin-left: 10px;
    margin-right: auto;
    max-width: calc(100% - 130px);
}
.incoming .details p{
    color: #333;
    background: #fff;
    border-radius: 18px 18px 18px 0;
}
.chat-area .typing-area{
    padding: 18px 30px;
    display: flex;
    justify-content: space-between;
}
.typing-area input{
    height: 45px;
    width: calc(100% - 58px);
    font-size: 17px;
    border: 1px solid #ccc;
    padding: 0 13px;
    border-radius: 5px 0 0 5px;
    outline: none;
}
.typing-area button{
    width: 55px;
    border: none;
    outline: none;
    background: #333;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    border-radius: 0 5px 5px 0;
}
</style>


<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
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
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type your message here." autocomplete="off">
        <button>
            <i class="fab fa-telegram-plane"></i>
 
        </button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
