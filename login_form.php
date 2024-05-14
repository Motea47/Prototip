<div class="main">
    <div class="form">
        <h1 id="title">Log In</h1>
        <form id="loginForm" action="process_login.php" method="post">
            <div class="input-box" id="LogInFields">
                <div class="fields">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" id="username_or_email" name="username_or_email" placeholder="Email or Username" required>
                    <span class="required-field">*</span>
                </div>

                <div class="fields">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="required-field">*</span>
                </div>
                <p>Forgot Password <a href="forgotpass.php">Click Here</a></p> 
            </div>
            <div class="pindutan">
                <button type="submit" id="login">Log In</button>
            </div>
            <!-- Display area for login status -->
            <div id="loginStatus"></div>
        </form>
    </div>
</div>
