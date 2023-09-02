<header class="header" id="header">
    <div class="header_wrapper">
        <div class="header_logo_wrapper">
            <a href="./viewer_dashboard.php"><img src="../assets/images/Land_Registration_Authority_Logo.png" alt="Land_Registration_Authority_Logo" class="header_logo"></a>
            <h1 class="header_logo_name">
                LAND <br>
                REGISTRATION <br>
                AUTHORITY
                <hr>
                <span class="header_web_system_name">CASE STATUS MANAGEMENT SYSTEM</span>
            </h1>
        </div>
        <div class="gear_wrapper">
            <button class="gear_btn" onclick="gear_button_menu()">
                <img src="../assets/images/gear_solid.png" alt="gear_btn" class="gear_icon">
            </button>
            <div class="log_out_wrapper">
                <a href="./viewer_change_password_form.php" class="change_password_link">CHANGE PASSWORD</a>
                <form action="../logout.php" method="POST">
                    <button type="submit" class="log_out_btn">LOGOUT</button>
                </form>
            </div>
        </div>
    </div>
</header>