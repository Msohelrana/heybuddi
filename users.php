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
     background-color: rgb(240, 255, 250);
    /* background-color: rgb(228, 243, 255) */


}
body{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-image: radial-gradient( circle, #E1EBEE, #E0FFFF,#B2FFFF,#AFEEEE);
    
    /* background-image: linear-gradient(aqua, white, aqua, white); */


}
.wrapper{
    /* background: #fff; */
    width: 450px;
    border-radius: 30px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),0 32px 64px -48px rgba(0,0,0,0.5);
}
.users{
    padding: 25px 30px;
    border-radius: 30px;

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

</style>
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
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Chat with:</span>
        <input type="text" placeholder="Search name">
        <button>
            <i class="fas fa-search"></i>
    </button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
