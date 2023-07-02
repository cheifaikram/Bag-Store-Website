<section class="head">
        <div class="logo">
            <i class="ri-menu-line menu"></i>
            <h2><span>KIM</span> Store.</h2>
        </div>
        <div class="header--items">
            <div class="dark--theme--btn">
                <i class="ri-moon-line moon"></i>
                <i class="ri-sun-line sun"></i>
            </div>
            
            <div class="icons">
                <img id="user-btn" src="../images/profile.jpeg" alt="">
            </div>
            <div class="account-box">
                <p>Username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
                <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
                <div class="dbtn_container">
                   <a href="../logout.php" class="delete-btn">Logout</a>
                </div>
                 
            </div>
        </div>
</section>