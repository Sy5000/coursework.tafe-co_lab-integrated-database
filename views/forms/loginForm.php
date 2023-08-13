<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <h3>Login.</h3>
        <p>username: 'test'</p>
        <p>password: '12345678'</p>

        <label>Username *</label>
        <input type="text" id="username" name="username" value="<?php if(isset($username)){echo $username;} // maintain state / refresh / submit ?>"  />
        <span class="error"><?php echo $usernameErr; ?></span>

        <label>Password *</label>
        <input type="password" id="password" name="password" value="<?php if(isset($password)){echo $password;} ?>"  />
        <span class="error"><?php echo $passwordErr; ?></span>

        <p>please visit the <a href="../views/createAccount.php">join</a> page if dont already have an account </p>
        
        <p><input type="submit" name="submit" value="submit" /></p>
</form>