
<!--=============== BOXICONS ===============-->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


<div class="sidebar">
   <ul class="sidebar--items">
               <li>
                    <a href="admin_page.php">
                        <span class="icon"><i class='bx bxs-home'></i></span>
                        <div class="sidebar--item">Home</div>
                    </a>
               </li>
                <li>
                    <a href="admin_products.php">
                        <span class="icon"><i class='bx bxs-shopping-bag'></i></span>
                        <div class="sidebar--item">Product</div>
                    </a>
                </li>
                <li>
                    <a href="admin_users.php">
                        <span class="icon"><i class='bx bxs-user-circle'></i></span>
                        <div class="sidebar--item">Customers</div>
                    </a>
                </li>
                <li>
                    <a href="admin_orders.php">
                        <span class="icon"><i class='bx bxs-book-content'></i></span>
                        <div class="sidebar--item">Orders</div>
                    </a>
                </li>
                <li>
                    <a href="admin_contacts.php">
                        <span class="icon"><i class='bx bxs-message-dots'></i></span>
                        <div class="sidebar--item">Messages</div>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom--items">
              <li>
                    <a href="../logout.php">
                        <span class="icon"><i class='bx bx-log-out'></i></span>
                        <div class="sidebar--item">Logout</div>
                    </a>
                </li>

            </ul>
</div>

<script>
    const currentPageUrl = window.location.href;

// Get all the navigation links
const navLinks = document.querySelectorAll('a');

// Iterate through the navigation links
navLinks.forEach(link => {
  // Check if the link's href matches the current page URL
  if (link.href === currentPageUrl) {
    // Add the active class to the link
    link.classList.add('active');
  }
});
</script>

<script src="../js/admin_script.js"></script> 


