<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home page</title>
</head>

<body>
  <div class="header">
    <div class=”footer-content”></div>
    <h3>Foolish Developer</h3>
    <p>Foolish Developer — source code.</p>
    <div class=”footer-bottom”></div>
    <div class=”footer-menu”>
      <ul class=”f-menu”>
        <li><a href=””>Mention légale</a></li>
        <li><a href=””>A propos</a></li>
      </ul>
    </div>


    <div class="container py-4 px-3 mx-auto">
      <h1>Hello, Bootstrap and Webpack!</h1>
      <button class="btn btn-primary">Primary button</button>
    </div>

    <div class="footer"></div>

    <?php 
      echo "damn";
    ?>
</body>

</html>


<style>
  .footer-menu{
  float: right;
}

.footer-menu ul{
  display: flex;
}

.footer-menu ul li{
padding-right: 10px;
display: block;
}

.footer-menu ul li a{
  color: #cfd2d6;
  text-decoration: none;
}

.footer-menu ul li a:hover{
  color: #27bcda;
}
</style>
