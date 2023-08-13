
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h3>Create an account ~working~</h3>

    <label>Username *</label>
    <input type="text" id="username" name="username" value="<?php if(isset($username)){echo $username;} // maintain state on page refresh / submit ?>"  />
    <span class="error"><?php echo $errors['username'] ?? '' ?></span>

    <label>Password *</label>
    <input type="password" id="password" name="password" value="<?php if(isset($password)){echo $password;} ?>"  />
    <span class="error"><?php echo $errors['password'] ?? '' ?></span>

    <label>First Name *</label>
    <input type="text" id="firstName" name="firstName" value="<?php if(isset($firstName)){echo $firstName;} ?>" />
    <span class="error"><?php echo $errors['firstName'] ?? '' ?></span>

    <label>Last Name *</label>
    <input type="text" id="lastName" name="lastName" value="<?php if(isset($lastName)){echo $lastName;} ?>" />
    <span class="error"><?php echo $errors['lastName'] ?? '' ?></span>

    <label>e-mail address *</label>
    <input type="text" id="email" name="email" value="<?php if(isset($email)){echo $email;} ?>"/>
    <span class="error"><?php echo $errors['email'] ?? '' ?></span>

    <p>please visit the <a href="../views/login.php">login</a> page if you already have an account </p>

    <p><input type="submit" name="submit" value="submit"/></p>
</form>