<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container" id="signUp" style="display: none;">
        <h1 class="form-title">Register</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <input type="text" name="fname" id="fname" placeholder="Full Name" required>
                <label for="fname">Full Name</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="email@gmail.com" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="input-group">
                <input type="password" name="rePassword" id="rePassword" placeholder="Password" required>
                <label for="rePassword">Re-Enter Password</label>
            </div>
            <div class="error-message" id="errorMessage"></div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <div class="links">
            <p>Already Have Account ?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="login.php">
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="email@gmail.com" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <div class="links">
            <p>Don't Have Account ?</p>
            <button id="signUpButton">Sign Up</button>
        </div>
    </div>
    <script src="js/login.js"></script>
</body>
</html>