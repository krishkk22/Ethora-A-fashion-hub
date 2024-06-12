<?php
    include("auth_session.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $db_connection = pg_connect("host=localhost dbname=GymStore user=postgres password=aaditya");
    
        // Check if the connection is successful
        if (!$db_connection) {
            die("Connection failed: " . pg_last_error());
        }
    
        // Get the form data
        $email = $_POST["email"];
        $message = $_POST["message"];
    
        // Insert the data into the database
        $query = "INSERT INTO contact_messages (email, message) VALUES ($1, $2)";
        $result = pg_query_params($db_connection, $query, array($email, $message));
    
        // Check if the query was successful
        if ($result) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . pg_last_error($db_connection);
        }
    
        // Close the database connection
        pg_close($db_connection);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>Ethora</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2Hhh_14Uam62GXGaTMcXWhhVkYg0EbDY&callback=initMap" async defer></script>

        <!-- Custom CSS File Link -->
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/convo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><!-- font awesome cdn link -->
        <link rel="icon" type="image/x-icon" href="../assets/images/logo.jpg"><!-- Favicon / Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- Google font cdn link -->
    </head>
    <body>
        <!-- HEADER SECTION -->
        <header class="header">
            <a href="#" class="logo">
                <img src="../assets/images/logo.jpg" class="img-logo" alt="Ethora Logo">
            </a>

            <!-- MAIN MENU FOR SMALLER DEVICES -->
            <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#home" class="text-decoration-none">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="text-decoration-none">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#menu" class="text-decoration-none">Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="#gallery"class="text-decoration-none">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a href="#blogs" class="text-decoration-none">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="text-decoration-none">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="text-decoration-none">Logout</a>
                        </li>
                       <li class="nav-item">
                            <a href="wordcloud.php" class="text-decoration-none">Reviews</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>

            <!-- SEARCH TEXT BOX -->
            <div class="search-form">
                <input type="search" id="search-box" class="form-control" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </div>

            <!-- CART SECTION -->
            <div class="cart">
                <h2 class="cart-title">Your Cart:</h2>
                <div class="cart-content">
                    
                </div>
                <div class="total">
                    <div class="total-title">Total: </div>
                    <div class="total-price">Rs 0</div>
                </div>
                <!-- BUY BUTTON -->
                <button type="button" class="btn-buy">Checkout Now</button>
            </div>
        </header>

        <!-- HERO SECTION -->
        <section class="home" id="home">
            <div class="content">
                 <h3>Welcome to Ethora <?php echo $_SESSION['username']; ?>!</h3>
                <a href="#menu" class="btn btn-dark text-decoration-none">Order Now!</a>
            </div>
        </section>

        <!-- ABOUT US SECTION -->
        <section class="about" id="about">
            <h1 class="heading"> <span>About</span> Us</h1>
            <div class="row g-0">
                <div class="image">
                <img src="../assets/images/im-23.jpg" class="img-hero" alt="Hero Image">
                </div>
                <div class="content">
                <h3>Welcome to Ethora!</h3>
                    <p>
                    At Ethora, we are dedicated to empowering fitness enthusiasts on their journey to wellness. Our mission is to provide a comprehensive platform that serves as a haven for fitness aficionados, offering a wide array of top-notch gym equipment, premium fitness products, stylish workout attire, and essential supplements like protein shakes.
                    </p>
                    <p>
                    Our platform isn't just about selling products; it's about building a vibrant community of like-minded individuals. Integrated discussion forums will enable users to connect, share their fitness experiences, seek advice, and inspire one another on their fitness odyssey.
                    </p>
                    <a href="#menu" class="btn btn-dark text-decoration-none">Order Now!</a>
                </div>
            </div>
        </section>

        <!-- MENU SECTION -->
        
<section class="menu" id="menu">
    <h1 class="heading">Our <span>Products</span></h1>
    <div class="box-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <img src="../assets/images/im-12.jpg" alt="Tanktops" class="product-img">
                        <h3 class="product-title">Flannel Shirt</h3>
                        <div class="price">Rs.450.00</div>
                        <a class="btn add-cart">Add to Cart</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <img src="../assets/images/im-15.jpg" alt="MuscleTech" class="product-img">
                        <h3 class="product-title">Ripped Jeans</h3>
                        <div class="price">Rs. 900.00</div>
                        <a class="btn add-cart">Add to Cart</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <img src="../assets/images/im-23.jpg" alt="FemaleT" class="product-img">
                        <h3 class="product-title">Plain T-Shirt</h3>
                        <div class="price">Rs.450.00</div>
                        <a class="btn add-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-4">
                            <div class="box">
                            <img src="../assets/images/image3.jpg" alt="Dumbells" class="product-img">
                                <h3 class="product-title">Shirt</h3>
                                <div class="price">Rs 750.00</div>
                                <a class="btn add-cart">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="../assets/images/im-22.jpg" alt="GymBag" class="product-img">
                                <h3 class="product-title">Printed T-Shirt</h3>
                                <div class="price">Rs 300.00</div>
                                <a class="btn add-cart">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="../assets/images/Tanktops.webp" alt="Whey" class="product-img">
                                <h3 class="product-title">tank tops</h3>
                                <div class="price">Rs 1055.00</div>
                                <a class="btn add-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row row-to-hide">
                        <div class="col-md-4">
                            <div class="box">
                            <img src="../assets/images/image6.jpg" alt="PreWorkout" class="product-img">
                                <h3 class="product-title">Jeans</h3>
                                <div class="price">Rs 835.00</div>
                                <a class="btn add-cart">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="../assets/images/image11.png" alt="Resistance Bands" class="product-img">
                                <h3 class="product-title">Jacket</h3>
                                <div class="price">Rs 585.00</div>
                                <a class="btn add-cart">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="../assets/images/im-19.jpg" alt="Kettlebells" class="product-img">
                                <h3 class="product-title">Accessories</h3>
                                <div class="price">Rs. 680.00</div>
                                <a class="btn add-cart">Add to Cart</a>
                            </div>
                            
            </div>
            <center>
                <button id="showHideBtn" class="btn btn-dark">SHOW MORE</button>
            </center>
        </div>
    </div>
</section>


         <!-- GALLERY SECTION -->
         <section class="gallery" id="gallery">
            <h1 class="heading">The <span>Bestsellers</span></h1>
            <div class="box-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="../assets/images/image8.jpg" alt="gallery1">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 1</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="../assets/images/image10.jpg" alt="gallery2">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 2</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="../assets/images/im-17.jpg" alt="gallery3">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 3</h3>
                                </div>
                            </div>
                        </div>
                    </div><br />
                    <div class="row pic-to-hide">
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="../assets/images/gallery4.webp" alt="gallery4">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 4</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="../assets/images/gallery5.webp" alt="gallery5">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 5</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="../assets/images/gallery6.webp" alt="gallery6">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 6</h3>
                                </div>
                            </div>
                        </div>
                    </div><br />
                    <center>
                        <button id="showBtn" class="btn btn-dark">SHOW MORE</button>
                    </center> 
                </div> 
            </div>
        </section>


                              

        <!-- TESTIMONIALS SECTION -->
        <section class="review" id="review">
            <h1 class="heading"><span>Testimonials</span></h1>
            <div class="box-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/quote-img.png" alt="" class="quote">
                                <p>
                                Finally, a fashion brand that prioritizes sustainability without sacrificing style! I love that this website offers eco-friendly options without compromising on quality or aesthetics. From the materials used to the ethical production practices, every aspect of their business is aligned with my values. Shopping here feels good, both for me and the planet!"
                                </p>
                                <img src="../assets/images/pic-1.png" alt="" class="user">
                                <h3>Jane Doe</h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/quote-img.png" alt="" class="quote">
                                <p>
                                This website goes beyond just selling clothes; it's a platform for empowerment and self-expression. The inclusive representation in their campaigns and product offerings is inspiring. Plus, the clothes are top-notch quality and incredibly stylish. I feel confident and empowered every time I wear something from this brand. Keep up the fantastic work!"
                                </p>
                                <img src="../assets/images/pic-2.png" alt="" class="user">
                                <h3>John Doe</h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/quote-img.png" alt="" class="quote">
                                <p>
                                Ethora is my go-to destination for all my fitness apparel needs. Their collection is trendy, 
                            comfortable, and affordable. Plus, their website is easy to navigate, making shopping a breeze!
                                </p>
                                <img src="../assets/images/pic-3.png" alt="" class="user">
                                <h3>Jane Doe</h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </section>

        <!-- CONTACT US SECTION -->
        <section class="contact" id="contact">
                <h1 class="heading"><span>Contact</span> Us</h1>
                <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.7926506302797!2d72.89735127593626!3d19.07285205206993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c627a20bcaa9%3A0xb2fd3bcfeac0052a!2sK.%20J.%20Somaiya%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1711996533423!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


                    <form id="contactForm" name="contact" method="POST" action="index.php">

                        <h3> Get in touch with us!</h3>
                        <div class="inputBox">
                            <span class="fas fa-envelope"></span>
                            <input type="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="inputBox">
                            <textarea name="message" placeholder="Enter your message..."></textarea>
                        </div>
                        <button type="submit" class="btn">Contact Now</button>
                    </form>
                </div>
            </section>


        <!-- FOOTER SECTION -->
        <section class="footer">
            <div class="footer-container">
               <div class="logo">
              <img src="../assets/images/logo.jpg" class="img"><br />
              <a href="mailto:TheFitnessStore@gmail.com">
              <i class="fas fa-envelope"></i>
              <p>TheFitnessStore@gmail.com</p>
              </a><br />
              <a href="tel:+919869461489">
              <i class="fas fa-phone"></i>
              <p>+91 9869461489</p>
              </a><br />
              <i class="fab fa-facebook-messenger"></i>
              <p>@TheFitnessStore</p><br />
            </div>

             <div class="support">
                    <h2>Support</h2>
                    <br /> 
                    <a href="#contact">Contact Us</a>
                    <a href="#">Chatbot Inquiry</a>
                    <a href="#">FAQ</a>
                </div>
            <div class="company">
                    <h2>Company</h2>
                    <br /> 
                     <a href="#about">About Us</a>
                    <a href="#menu">Our Products</a>
                    <a href="#gallery">Gallery</a>
                    <a href="#blogs">Blog</a>
                    <a href="#review">Reviews</a>
 </div>
                <div class="newsletters">
                    <h2>Newsletters</h2>
                    <br /> 
                    <p>Subscribe to our newsletter for news and updates!</p>
                    <div class="input-wrapper">
                        <input type="email" class="newsletter" placeholder="Your email address">
                        <i id="paper-plane-icon" class="fas fa-paper-plane"></i>
                    </div>
                </div>
                <div class="credit">
                    <hr /><br/>
                    <h2>Ethora © 2023 | All Rights Reserved.</h2>
                </div>
            </div>
        </section>

        <!-- CHAT BAR BLOCK -->
        <div class="chat-bar-collapsible">
            <button id="chat-button" type="button" class="collapsible">Chat with us! &nbsp;
                <i id="chat-icon" style="color: #fff;" class="fas fa-comments"></i>
            </button>
            <div class="content">
                <div class="full-chat-block">
                    <!-- Message Container -->
                    <div class="outer-container">
                        <div class="chat-container">
                            <!-- Messages -->
                            <div id="chatbox">
                                <h5 id="chat-timestamp"></h5>
                                <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                            </div>
                            <!-- User input box -->
                            <div class="chat-bar-input-block">
                                <div id="userInput">
                                    <input id="textInput" class="input-box" type="text" name="msg"
                                        placeholder="Tap 'Enter' to send a message">
                                    <p></p>
                                </div>
                                <div class="chat-bar-icons">
                                    <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-paper-plane"
                                        onclick="sendButton()"></i>
                                </div>
                            </div>
                            <div id="chat-bar-bottom">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JS File Link -->
        <script src="../assets/js/googleSignIn.js"></script>
        <script src="../assets/js/script.js"></script>
        <script src="../assets/js/responses.js"></script>
        <script src="../assets/js/convo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            // CODE FOR THE FORMSPREE
            window.onbeforeunload = () => {
                for(const form of document.getElementsByTagName('form')) {
                    form.reset();
                }
            }

            // CODE FOR THE GOOGLE MAPS API
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 14.99367271992383, lng: 120.17629231186626},
                    zoom: 9
                });

                var marker = new google.maps.Marker({
                    position: {lat: 14.99367271992383, lng: 120.17629231186626},
                    map: map,
                    title: 'Your Location'
                });
            }

            // CODE FOR THE SHOW MORE & SHOW LESS BUTTON IN MENU
            $(document).ready(function() {
                $(".row-to-hide").hide();
                $("#showHideBtn").text("SHOW MORE");
                $("#showHideBtn").click(function() {
                    $(".row-to-hide").toggle();
                    if ($(".row-to-hide").is(":visible")) {
                        $(this).text("SHOW LESS");
                    } else {
                        $(this).text("SHOW MORE");
                    }
                });
            });

            // CODE FOR THE SHOW MORE & SHOW LESS BUTTON IN GALLERY
            $(document).ready(function() {
                $(".pic-to-hide").hide();
                $("#showBtn").text("SHOW MORE");
                $("#showBtn").click(function() {
                    $(".pic-to-hide").toggle();
                    if ($(".pic-to-hide").is(":visible")) {
                        $(this).text("SHOW LESS");
                    } else {
                        $(this).text("SHOW MORE");
                    }
                });
            });
            // CODE FOR THE REDIRECT CART
            function redirectCart() {
                // Check if the user is logged in
                if(!"<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : '' ?>") {
                    // Redirect the user to the login page
                    alert("You are not logged in. Please log into your account and try again.");
                    window.location.href = "users/login.php";
                }
            }
        </script> 
    </body>
</html>
