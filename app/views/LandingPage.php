<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UniConnect - Welcome</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

  </head>
<body>

  <div class="image-bg">
    <div class="overlay"></div>
  </div>

  <div class="content">
    <h1>Welcome to UniConnect</h1>
    <p>Streamline your campus life with ease.</p>
    <a href="/Student_Activity_Management_System/public/login.php">Get Started</a>


   

  </div>

  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden; /* Disable scrolling */
      font-family: 'Montserrat', sans-serif;
    }

    /* Full-screen image background */
    .image-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('../../public/images/pic.jpeg');
      background-size: cover;
      background-position: center;
    }

    /* Overlay text */
    .content {
      position: relative;
      z-index: 2;
      color: white;
      text-align: center;
      top: 50%;
      transform: translateY(-50%);
    }

    .content h1 {
      font-size: 3rem;
      margin-bottom: 20px;
    }

    .content p {
      font-size: 1.5rem;
      margin-bottom: 30px;
    }

    .content a {
      text-decoration: none;
      background-color: #00A7E1;
      color: white;
      padding: 10px 20px;
      font-size: 1.2rem;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .content a:hover {
      background-color: #0075A3;
    }

    /* Add a slight dark overlay on top of the image */
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }
  </style>

</body>
</html>
