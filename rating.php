<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Star Rating in HTML CSS & JavaScript</title>
  <script src="js/rating.js"></script>
  <link href="css/rating.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  
</head>
<body>
  <div class="rating-box">
    <header>How was your experience?</header>
    <div class="stars">
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
    </div>
    <button class="submit-btn">Submit</button>
  </div>

  <!-- Modal HTML -->
  <div class="modal" id="thankYouModal">
    <div class="modal-content">
      <h2>Thank You!</h2>
      <p>We appreciate your feedback.</p>
      <button class="close-btn">Close</button>
    </div>
  </div>

  
</body>
</html>
