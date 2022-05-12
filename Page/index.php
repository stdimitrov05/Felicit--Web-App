<?php
include '../sql/dbFunction.php';
include '../Functions/customfun.php';
error_reporting();
$con = new dbFunction();
$id = $_SESSION['id'];

if (!isset($id)) {
  header('location:../index.php');
};
if ($con->SelectRoleById($id) == "staff") {
  header('location:./Staff/home.php');
} elseif ($con->SelectRoleById($id) == "admin") {
  header('location:./admin/html/dashboard.php');
}
if (isset($_GET['logout'])) {
  DeleteToken($con);
  session_destroy();
  header('location:../index.php');
}
$name  = $_SESSION['name'];

setcookie("profile", $name, time() + 3600, '/');
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/pizza-icon.png" type="">

  <title> Felicità </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="../Page/admin/dist/css/style.css" rel="stylesheet">

</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="./images/table.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">

          <a class="navbar-brand" href="#top">
            <img style="border-radius: 50%;
            width: 150px;    height: 150px;    background-position: center center;    background-repeat: no-repeat; " src="../Functions/image/<?php $con->SelectImageProfile($id) ?>">

            <span>Welcome back <?php echo $name ?> !</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link" href="#menu">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#book">Booking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Functions/updateProfile.php">Profile</a>
              </li>
            </ul>
            <div class="user_option">

              <a href="?logout=<?php echo $id; ?>">Logout</a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <section class="slider_section " id="top">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Italian Food Restaurant
                    </h1>
                    <p>
                      Italian Food Restaurant Felicità wolcome you with open heart
                      <br>We offer you the pizzas in the all country
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Pasta & Burgers
                    </h1>
                    <p>
                      Also different varieties of burgers and pasta
                      <br>The varied menu based on Italian cuisine is what you are offered at this restaurant.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      The Best Desserts
                    </h1>
                    <p>
                      Best Italian Desserts you've ever tasted
                      <br>talian desserts can give a lovely sweetness to the end of your meal
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- offer section -->

  <section class="offer_section layout_padding-bottom" id="menu">
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/des.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Dessert Friday
                </h5>
                <h6>
                  <span>30%</span> Off
                </h6>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/spar.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pasta Brunch
                </h5>
                <h6>
                  <span>25%</span> Off
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Menu
        </h2>
      </div>
      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".burger">Burger</li>
        <li data-filter=".pizza">Pizza</li>
        <li data-filter=".pasta">Pasta</li>
        <li data-filter=".dessert">Dessert</li>
      </ul>

      <div class="filters-content">
        <div class="row grid">
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pr.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Prosciutto & Fungi
                  </h5>
                  <p>
                    Tomato sauce, proscuitto, arugula leaves, olive oil, parmess cheese, mushrooms, parsley
                  </p>
                  <div class="options">
                    <h6>
                      $15
                    </h6>
                    <a> #03
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/veg.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Vegetariana
                  </h5>
                  <p>
                    Baby parsley, mozzarella, artichoke, bell pepper, cherry tomatoes, olives, sliced almonds
                  </p>
                  <div class="options">
                    <h6>
                      $10
                    </h6>
                    <a>#04
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/quatri.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Quatre Formaje
                  </h5>
                  <p>
                    cheese- feta, mozzarella, parmesan cheese, fontina cheese, basil, roma tomato, minced garlic
                  </p>
                  <div class="options">
                    <h6>
                      $17
                    </h6>
                    <a> #05
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all pasta">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/trad.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Traditional Pasta
                  </h5>
                  <p>
                    penne, whole tomatoes, garlic, chili flakes, virgin olive oil, parsely, basil, rushed red pepper
                  </p>
                  <div class="options">
                    <h6>
                      $14
                    </h6>
                    <a>#01
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all dessert">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/tiramisu.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Tiramisu
                  </h5>
                  <p>
                    egg yolks, mascarpone, espresso coffee, cognac, ocoa powder, ladyfingers, ittersweet chocolate
                  </p>
                  <div class="options">
                    <h6>
                      $5
                    </h6>
                    <a>#08
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all dessert">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/cook.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Butter Cookies
                  </h5>
                  <p>
                    butter, sugar, vanilla & almond extract, egg, salt, milk, chocolate, vanilla almond flavor, pink sprinkles
                  </p>
                  <div class="options">
                    <h6>
                      $3
                    </h6>
                    <a>#010
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all burger">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/steaks.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Steak Burger
                  </h5>
                  <p>
                    Beef steak, boneless short ribs, butter, vegetable oil, black pepper, cheddar cheese, pickles
                  </p>
                  <div class="options">
                    <h6>
                      $13
                    </h6>
                    <a>#012
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all burger">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pickles.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Pickle Burger
                  </h5>
                  <p>
                    fried pickles, worcestershire sauce, garlic powder, ketchup, mayonnaise, lettuce, bacon
                  </p>
                  <div class="options">
                    <h6>
                      $12
                    </h6>
                    <a>#012
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all burger">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/cheesy.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Cheese Burger
                  </h5>
                  <p>
                    onion, black pepper, cheddar cheese, feta cheese, meatball, red onion, tomato, lettuce, tomatoes
                  </p>
                  <div class="options">
                    <h6>
                      $9
                    </h6>
                    <a>#07
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all pasta">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/seatr.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Seafood Pasta
                  </h5>
                  <p>
                    olive oil, onion, garlic, red pepper, tomatoes, butter, shrimp, sea scallops, clams, mussels, parsley
                  </p>
                  <div class="options">
                    <h6>
                      $17
                    </h6>
                    <a>#06
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all pasta">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/plate.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Pasta Soup
                  </h5>
                  <p>
                    olive oil, carrots, tomato, peas and beans, fresh filled tortellini, basil, grated parmesan, chicken meat
                  </p>
                  <div class="options">
                    <h6>
                      $8
                    </h6>
                    <a>#06
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all dessert">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/panc.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Berries Pancakes
                  </h5>
                  <p>
                    egg, buttermilk, butter, frozen mixed berries, maple syrup, vanilla bean, ice cream vanilla
                  </p>
                  <div class="options">
                    <h6>
                      $7
                    </h6>
                    <a>#06
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end food section -->

  <!-- about section -->

  <section class="about_section layout_padding" id="about">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              Our italian food restaurant offers the most delicious food in the all country. We
              have different types of food such as - hamburger, pizza, pasta and etc. Every day
              we offer breakfast, lunch and dinner for your family.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- book section -->
  <section class="book_section layout_padding" id="book">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book A Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="../Functions/bookTable.php" method="post" enctype="multipart/form-data" id="sign-up-form">
              <input type="text" name="name" class="form-control" placeholder="Your Name " value="<?php $con->InsertNameByID($id); ?>" required />
              <input type="phone" name="phone" class="form-control" placeholder="Phone Number" required />
              <select name="book" required class="form-control nice-select wide">
                <option value="" disabled selected>
                  How many persons?
                </option>
                <option value="2 persons">
                  2
                </option>
                <option value="3 persons">
                  3
                </option>
                <option value="4 persons">
                  4
                </option>
                <option value="5 persons">
                  5
                </option>
                <option value="Food for Home">
                  Food for Home
                </option>
              </select>
              <input required name="date" type="time" class="form-control">
              <input required type="text" name="text" class="form-control" placeholder="More Informashion for booking" />
              <input type="submit" name="btn" value="Booking" class="btn_box">
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->



  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location: Burgas, Zornitsa 15
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +359 887954327
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  stanislav@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              Felicità
            </a>
            <p>
              You can find us on our social media accounts for more information and pictures we share with you
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
            9.00 Am -11.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> Stanislav Dimitrov/
          <a href="https://themewagon.com/" target="_blank">Felicità
          </a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>