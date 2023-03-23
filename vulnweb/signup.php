<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
    <body>
        <h1 align=center>Signup</h1>
            <div align=center>
                <form action="signup-validate.php" method="post" novalidate>
                    <label for="fname">FirstName</label>
                    <input type="text" id="fname" name="fname">

                    <label for="lname">LastName</label>
                    <input type="text" id="lname" name="lname">

                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob">

                    <label for="mobile">Mobile Number</label>
                    <input type="number" id="mobile" name="mobile">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">

                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password">

                    <button>Sign up</button>
                    <p>Already Have an Account? <a href="index.php">Log in</a></p>
                </form>
            </div>
    </body>
</html>