<script type="text/javascript">
        $(document).ready(function () {
            $("#menutoggle").click(function () {
                $("nav ul").toggle();
                return false;
            });
        });
</script>

<div class='logocontainer'>
     <a href="index.php"><img src='Images/logo.jpg' title='Logo' id='logo'></a>
   
</div>
<nav>
    <a href="#" id='menutoggle'>&#9776;</a>
    <ul id='mainmenu'>
        <li><a href='index.php'>Home</a></li>
        <li><a href='aboutus.php'>About Us</a></li>
        <li><a href='location.php'>Store Location</a></li>
        <li><a href='grooming.php'>Grooming</a></li>
        <li><a href='contactus.php'>Contact Us</a></li>
    </ul>
</nav>
