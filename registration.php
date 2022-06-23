<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login_css">
    <title>REGISTRATION|Project 2</title>
</head>

<body>
    <div class="container">
        <h1><u>Sign-Up</u> </h1>
        <form action="insert.php" method="POST">
            <div class="form-control">
                <input type="text" required name="uname" placeholder="What would you like to be called?">
                <label>Name</label>
            </div>
    
            <div class="form-control">
                <input type="text" required name="email" placeholder="Please enter valid email address">
                <label>Email</label>
            </div>
            <div class="form-control">
                <input type="password" required name="pwd" placeholder="Enter a strong password">
                <label>Password</label>
            </div>

            <button class="btn" name="register">Register</button>
            <p class="text">Already have an account? <a href="login.php" style="color: blue;">Login</a> </p>
        </form>
    </div>
    <script type="text/javascript">
        const labels = document.querySelectorAll('.form-control label')
        labels.forEach(label => {
            label.innerHTML = label.innerText
                .split('')
                .map((letter, idx) => `<span style="transition-delay:${idx * 50}ms">${letter}</span>`)
                .join('')
        })
    </script>
</body>

</html>