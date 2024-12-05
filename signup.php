<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
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


}
body{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-image: radial-gradient( circle, #E1EBEE, rgba(0,200,50,0.1),#B2FFFF,#AFEEEE);
 /* background-image: url(1.jpg); */

}
.wrapper{
    background: #fff;
    width: 450px;
    border-radius: 30px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),0 32px 64px -48px rgba(0,0,0,0.5);
}
.form{
    padding: 25px 30px;
    border-radius: 20px;

}
.form header{
    font-size: 30px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #e6e6e6;
}
.form form{
    margin: 20px 0;
}
.form form .error-text{
    color: #721c24;
    background: #f8d7da;
    padding: 8px 10px;
    text-align: center;
    border-radius: 5px;
    margin-bottom: 10px;
    border: 1px solid #f5c6cb;
     display: none ;
}
.form form .name-details{
    display: flex;
}
form .name-details .field:first-child{
    margin-right: 10px;
}
form .name-details .field:last-child{
    margin-left: 10px;
}
.form form .field{
    display: flex;
    position: relative;
    flex-direction: column;
    margin-bottom: 10px; 
}
.form form .field label{
    margin-bottom: 2px;
}
.form form .field input{
    outline: none;
}
.form form .input input{
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.form form .image input{
    font-size: 17px;
}
.form form .button input{
    margin-top: 13px;
    height: 45px;
    border: none;
    font-size: 17px;
    font-weight: 400;
    background: rgb(36, 47, 100);
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}
.form form .button input:hover{
    background: rgba(36, 47, 100,0.95);
    color: #abdbe3;
}
.form form .field i{
    position: absolute;
    right: 15px;
    color: rgb(95, 94, 94);
    top: 70%;
    transform: translateY(-50%);
    cursor: pointer;
}
.form form .field i.active::before{
    color: #333;
    content: "\f070";
}
.form .link{
    text-align: center;
    margin: 10px 0;
    font-size: 17px;
}
.form .link a{
    color: rgb(58, 40, 158);
}
.form .link a:hover{
    text-decoration: underline;
} 


</style>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>HeyBuddy</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First Name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last Name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Sign Up">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
