<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        /* Basic CSS for styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
			background-color:#12486B;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .content {
            padding: 20px;
            margin-top: 20px;
            margin-left: 50px;
            text-align: left;
            background-color: gray;
            width: 33%;
            border-radius: 20px;
            box-shadow: solid white;
        }
        .pic{
            width: 30%;
            position: absolute;
            left: 10%;
            margin-left: 45%;
            top: 8%;
        }
        .pic:hover{
            transform: translateX(-10%);
            transition: bottom 1s, left 1s;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="about_home.php">About</a>
        <a href="contact_home.php">Contact</a>
        <a href="register.php">Register</a>
    </div>
    <div class="content">
    <iframe src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=new%20ormoc%20city%20public%20cemetery%20Ormoc%20City+(new%20ormoc%20city%20public%20cemetery)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="450" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          
    </div>

    <div class="pic">
            <img src="img/contactpic.png" alt="cemetery map"/>

        </div>
</body>
</html>
