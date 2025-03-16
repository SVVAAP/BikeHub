


<!DOCTYPE html>
<html lang="en">
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeHub.com - Premium Bike Rentals</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body style="margin: 0; padding: 0; font-family: 'Poppins', sans-serif; background-color: #f5f5f5; color: #333; line-height: 1.6;">

    <!-- Header Section -->
    <?php include 'header.php'; ?>
    <header style="background-color:rgb(0, 0, 0); box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); position: sticky; top: 0; z-index: 1000;">
        <div style="display: flex; justify-content: center; align-items: center; padding: 20px 5%; max-width: 1400px; margin: 0 auto; text-align: center;">
            
            <nav>
                <ul style="display: flex; list-style: none; margin: 0; padding: 0;">
                    <li style="margin-left: 30px;"><a href="#hero" style="text-decoration: none; color:rgb(255, 255, 255); font-weight: 500; font-size: 16px; transition: color 0.3s;">Home</a></li>
                    <li style="margin-left: 30px;"><a href="#about" style="text-decoration: none; color:rgb(255, 255, 255); font-weight: 500; font-size: 16px; transition: color 0.3s;">About</a></li>
                    <li style="margin-left: 30px;"><a href="#services" style="text-decoration: none; color:rgb(255, 255, 255); font-weight: 500; font-size: 16px; transition: color 0.3s;">Services</a></li>
                    <li style="margin-left: 30px;"><a href="#bikes" style="text-decoration: none; color:rgb(255, 255, 255); font-weight: 500; font-size: 16px; transition: color 0.3s;">Bikes</a></li>
                    <li style="margin-left: 30px;"><a href="#testimonials" style="text-decoration: none; color:rgb(255, 255, 255); font-weight: 500; font-size: 16px; transition: color 0.3s;">Testimonials</a></li>
                    <li style="margin-left: 30px;"><a href="#contact" style="text-decoration: none; color:rgb(255, 255, 255); font-weight: 500; font-size: 16px; transition: color 0.3s;">Contact</a></li>
                    
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://preview.redd.it/cbnfmisinxbz.png?auto=webp&s=98b0f89b8024f6a16bd5a78e7b173008289eadbe'); background-size: cover; background-position: center; height: 80vh; display: flex; align-items: center; color: white; text-align: center;">
        <div style="max-width: 800px; margin: 0 auto; padding: 0 20px;">
            <h1 style="font-size: 48px; margin-bottom: 20px; letter-spacing: 1px;">Experience the Freedom of Two Wheels</h1>
            <p style="font-size: 18px; margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">Discover the joy of riding with our premium bike rental service. From mountain trails to city streets, we've got the perfect ride for your adventure.</p>
            <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                <a href="#bikes" style="display: inline-block; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: 600; transition: all 0.3s ease; cursor: pointer; border: none; background-color: #e74c3c; color: white;">View Bikes</a>
                <a href="#about" style="display: inline-block; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: 600; transition: all 0.3s ease; cursor: pointer; background-color: transparent; color: white; border: 2px solid white;">Learn More</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" style="padding: 80px 20px; background-color: white;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 36px; margin-bottom: 15px; color: #2c3e50;">About BikeHub</h2>
                <p style="color: #7f8c8d; max-width: 700px; margin: 0 auto;">Providing premium bike rental services since 2010. We're passionate about two wheels and dedicated to your adventure.</p>
            </div>
            
            <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 40px;">
                <div style="flex: 1; min-width: 300px; border-radius: 10px; overflow: hidden;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRw89cgTaKy8tgXihiQpIJM3auunggcFtNabg&s" alt="About BikeHub" style="width: 100%; height: auto; display: block;">
                </div>
                
                <div style="flex: 1; min-width: 300px;">
                    <h3 style="font-size: 28px; margin-bottom: 20px; color: #2c3e50;">Why Choose Us?</h3>
                    <p style="margin-bottom: 15px; color: #555;">At BikeHub, we believe that the best way to explore is on two wheels. Our mission is to provide high-quality bikes and exceptional service to make your riding experience memorable.</p>
                    <p style="margin-bottom: 15px; color: #555;">With a diverse fleet of well-maintained bikes and knowledgeable staff, we cater to all levels of riders – from beginners to experts.</p>
                    
                    <div style="display: flex; flex-wrap: wrap; margin-top: 20px; gap: 15px;">
                        <div style="flex: 1; min-width: 140px; background-color: #f9f9f9; padding: 15px; border-radius: 8px; text-align: center;">
                            <i class="fas fa-bicycle" style="font-size: 24px; color: #e74c3c; margin-bottom: 10px;"></i>
                            <h4 style="margin: 0;">Quality Bikes</h4>
                        </div>
                        <div style="flex: 1; min-width: 140px; background-color: #f9f9f9; padding: 15px; border-radius: 8px; text-align: center;">
                            <i class="fas fa-shield-alt" style="font-size: 24px; color: #e74c3c; margin-bottom: 10px;"></i>
                            <h4 style="margin: 0;">Safe Rides</h4>
                        </div>
                        <div style="flex: 1; min-width: 140px; background-color: #f9f9f9; padding: 15px; border-radius: 8px; text-align: center;">
                            <i class="fas fa-headset" style="font-size: 24px; color: #e74c3c; margin-bottom: 10px;"></i>
                            <h4 style="margin: 0;">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" style="padding: 80px 20px; background-color: #f5f5f5;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 36px; margin-bottom: 15px; color: #2c3e50;">Our Services</h2>
                <p style="color: #7f8c8d; max-width: 700px; margin: 0 auto;">We offer a variety of services tailored to meet all your biking needs.</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                <div style="background-color: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); transition: transform 0.3s, box-shadow 0.3s;">
                    <img src="https://4kwallpapers.com/images/wallpapers/bmw-s-1000-rr-sports-bikes-2023-white-background-5k-4480x2520-8690.jpg" alt="Short-term Rentals" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 25px;">
                        <h3 style="margin-bottom: 15px; color: #2c3e50;">Hourly & Daily Rentals</h3>
                        <p style="color: #7f8c8d; margin-bottom: 20px;">Perfect for tourists or locals looking to enjoy a day out on two wheels. Flexible pickup and return options.</p>
                        <a href="#bikes" style="display: inline-block; padding: 10px 20px; background-color: #2c3e50; color: white; text-decoration: none; border-radius: 5px; font-weight: 500;">Learn More</a>
                    </div>
                </div>
                
                <div style="background-color: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); transition: transform 0.3s, box-shadow 0.3s;">
                    <img src="https://4kwallpapers.com/images/wallpapers/bmw-m-1000-rr-sports-bikes-5k-2023-white-background-3840x2160-8832.jpg" alt="Long-term Rentals" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 25px;">
                        <h3 style="margin-bottom: 15px; color: #2c3e50;">Weekly & Monthly Rentals</h3>
                        <p style="color: #7f8c8d; margin-bottom: 20px;">Extended rental periods at discounted rates. Ideal for visitors staying longer or locals needing a temporary ride.</p>
                        <a href="#bikes" style="display: inline-block; padding: 10px 20px; background-color: #2c3e50; color: white; text-decoration: none; border-radius: 5px; font-weight: 500;">Learn More</a>
                    </div>
                </div>
                
                <div style="background-color: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); transition: transform 0.3s, box-shadow 0.3s;">
                    <img src="https://images5.1000ps.net/images_bikekat/2020/7-BMW/9500-R_1250_GS/018-637111516288179993.jpg?format=webp&quality=80&width=1200&height=790&bgcolor=rgba_39_42_44_0&mode=pad" alt="Guided Tours" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 25px;">
                        <h3 style="margin-bottom: 15px; color: #2c3e50;">Guided Bike Tours</h3>
                        <p style="color: #7f8c8d; margin-bottom: 20px;">Explore the city or countryside with our experienced guides. Group and private tours available.</p>
                        <a href="#contact" style="display: inline-block; padding: 10px 20px; background-color: #2c3e50; color: white; text-decoration: none; border-radius: 5px; font-weight: 500;">Book Tour</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bikes Section -->
    <section id="bikes" style="padding: 80px 20px; background-color: white;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 36px; margin-bottom: 15px; color: #2c3e50;">Our Bikes</h2>
                <p style="color: #7f8c8d; max-width: 700px; margin: 0 auto;">Choose from our wide selection of quality bikes for any terrain or purpose.</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 30px;">
                <?php   
                $sql1 = "SELECT * FROM bikes WHERE bike_availability='yes'";
                $result1 = mysqli_query($conn,$sql1);
                $available_bikes_count = mysqli_num_rows($result1);

                if($available_bikes_count > 0) { 
                    while($row1 = mysqli_fetch_assoc($result1)){
                        $bike_id = $row1["bike_id"];
                        $bike_name = $row1["bike_name"];
                        $price = $row1["price"];
                        $price_per_day = $row1["price_per_day"];
                        $bike_img = $row1["bike_img"];
                ?>
                <div style="background-color: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); transition: transform 0.3s ease;">
                    <div style="height: 250px; overflow: hidden;">
                        <img src="<?php echo $bike_img; ?>" alt="<?php echo $bike_name; ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                    </div>
                    <div style="padding: 20px;">
       
                        <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 10px; color: #2c3e50;"><?php echo $bike_name; ?></h3>
                        <p style="color: #e74c3c; font-weight: 500; margin-bottom: 20px;">Fare: <?php echo "Rs. " . $price . "/km & Rs." . $price_per_day . "/day"; ?></p>
                        <a href="booking.php?id=<?php echo($bike_id) ?>" style="background-color: #e74c3c; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: 500; transition: background-color 0.3s; display: inline-block; text-decoration: none;">Book Now</a>
                    </div>
                </div>
                <?php 
                    }
                } else {
                    echo "<p style='text-align: center; grid-column: 1 / -1; font-size: 18px; color: #7f8c8d;'>No bikes available at the moment. Please check back soon!</p>";
                } 
                ?>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" style="padding: 80px 20px; background-color: #f5f5f5;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 36px; margin-bottom: 15px; color: #2c3e50;">What Our Customers Say</h2>
                <p style="color: #7f8c8d; max-width: 700px; margin: 0 auto;">Don't just take our word for it, hear from our satisfied customers.</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                <div style="background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); position: relative;">
                    <i class="fas fa-quote-right" style="font-size: 50px; color: #e74c3c; opacity: 0.2; position: absolute; top: 20px; right: 20px;"></i>
                    <p style="font-style: italic; margin-bottom: 20px; color: #555;">BikeHub made our family vacation special. The bikes were in perfect condition and the staff was extremely helpful with route suggestions. Will definitely rent from them again!</p>
                    <div style="display: flex; align-items: center;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; margin-right: 15px;">
                            <img src="/api/placeholder/50/50" alt="Customer" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div>
                            <h4 style="font-weight: 600; margin-bottom: 5px; color: #2c3e50;">Rahul Sharma</h4>
                            <p style="font-size: 14px; color: #7f8c8d;">Mumbai</p>
                        </div>
                    </div>
                </div>
                
                <div style="background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); position: relative;">
                    <i class="fas fa-quote-right" style="font-size: 50px; color: #e74c3c; opacity: 0.2; position: absolute; top: 20px; right: 20px;"></i>
                    <p style="font-style: italic; margin-bottom: 20px; color: #555;">As a cycling enthusiast, I'm very particular about the bikes I ride. BikeHub exceeded my expectations with their high-quality mountain bikes. The pricing was also very reasonable!</p>
                    <div style="display: flex; align-items: center;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; margin-right: 15px;">
                            <img src="/api/placeholder/50/50" alt="Customer" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div>
                            <h4 style="font-weight: 600; margin-bottom: 5px; color: #2c3e50;">Priya Patel</h4>
                            <p style="font-size: 14px; color: #7f8c8d;">Bangalore</p>
                        </div>
                    </div>
                </div>
                
                <div style="background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); position: relative;">
                    <i class="fas fa-quote-right" style="font-size: 50px; color: #e74c3c; opacity: 0.2; position: absolute; top: 20px; right: 20px;"></i>
                    <p style="font-style: italic; margin-bottom: 20px; color: #555;">I rented a bike for a month while in the city for work. The process was seamless, and when I had a flat tire, their support team was there within an hour to help. Amazing service!</p>
                    <div style="display: flex; align-items: center;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; margin-right: 15px;">
                            <img src="/api/placeholder/50/50" alt="Customer" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div>
                            <h4 style="font-weight: 600; margin-bottom: 5px; color: #2c3e50;">Amit Kumar</h4>
                            <p style="font-size: 14px; color: #7f8c8d;">Delhi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" style="padding: 80px 20px; background-color: white;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 36px; margin-bottom: 15px; color: #2c3e50;">Contact Us</h2>
                <p style="color: #7f8c8d; max-width: 700px; margin: 0 auto;">Have questions or need assistance? We're here to help!</p>
            </div>
            
            <div style="display: flex; flex-wrap: wrap; gap: 40px;">
                <div style="flex: 1; min-width: 300px;">
                    <h3 style="font-size: 24px; margin-bottom: 20px; color: #2c3e50;">Get In Touch</h3>
                    
                    <div style="margin-bottom: 30px;">
                        <div style="display: flex; align-items: flex-start; margin-bottom: 20px;">
                            <i class="fas fa-map-marker-alt" style="color: #e74c3c; font-size: 18px; margin-right: 15px; margin-top: 5px;"></i>
                            <div>
                                <h4 style="font-size: 18px; margin-bottom: 5px; color: #2c3e50;">Our Location</h4>
                                <p style="color: #7f8c8d;">123 Bike Street, Mumbai, Maharashtra 400001</p>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: flex-start; margin-bottom: 20px;">
                            <i class="fas fa-phone-alt" style="color: #e74c3c; font-size: 18px; margin-right: 15px; margin-top: 5px;"></i>
                            <div>
                                <h4 style="font-size: 18px; margin-bottom: 5px; color: #2c3e50;">Phone</h4>
                                <p style="color: #7f8c8d;">+91 9876543210</p>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: flex-start; margin-bottom: 20px;">
                            <i class="fas fa-envelope" style="color: #e74c3c; font-size: 18px; margin-right: 15px; margin-top: 5px;"></i>
                            <div>
                                <h4 style="font-size: 18px; margin-bottom: 5px; color: #2c3e50;">Email</h4>
                                <p style="color: #7f8c8d;">info@bikehub.com</p>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: flex-start; margin-bottom: 20px;">
                            <i class="fas fa-clock" style="color: #e74c3c; font-size: 18px; margin-right: 15px; margin-top: 5px;"></i>
                            <div>
                                <h4 style="font-size: 18px; margin-bottom: 5px; color: #2c3e50;">Working Hours</h4>
                                <p style="color: #7f8c8d;">Mon - Sat: 8:00 AM - 8:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="flex: 1; min-width: 300px;">
                    <form action="contact_process.php" method="POST">
                        <div style="margin-bottom: 20px;">
                            <input type="text" name="name" placeholder="Your Name" style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;" required>
                        </div>
                        
                        <div style="margin-bottom: 20px;">
                            <input type="email" name="email" placeholder="Your Email" style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;" required>
                        </div>
                        
                        <div style="margin-bottom: 20px;">
                            <input type="text" name="subject" placeholder="Subject" style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;" required>
                        </div>
                        
                        <div style="margin-bottom: 20px;">
                            <textarea name="message" placeholder="Your Message" style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px; height: 150px; resize: vertical;" required></textarea>
                        </div>
                        
                        <button type="submit" style="background-color: #e74c3c; color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-weight: 600; transition: background-color 0.3s;">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="background-color: #2c3e50; color: white; padding-top: 60px;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px;">
            <div>
                <h4 style="font-size: 18px; margin-bottom: 20px; position: relative; padding-bottom: 10px;">About BikeHub</h4>
                <p style="color: #bdc3c7; margin-bottom: 20px;">BikeHub.com is India's premier bike rental service, offering high-quality bikes for all your adventures. We pride ourselves on exceptional service and well-maintained equipment.</p>
                <div style="display: flex; gap: 15px; margin-top: 20px;">
                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%; color: white; text-decoration: none; transition: background-color 0.3s;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%; color: white; text-decoration: none; transition: background-color 0.3s;"><i class="fab fa-twitter"></i></a>
                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%; color: white; text-decoration: none; transition: background-color 0.3s;"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div>
                <h4 style="font-size: 18px; margin-bottom: 20px; position: relative; padding-bottom: 10px;">Quick Links</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;"><a href="#hero" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">Home</a></li>
                    <li style="margin-bottom: 10px;"><a href="#about" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">About Us</a></li>
                    <li style="margin-bottom: 10px;"><a href="#services" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">Services</a></li>
                    <li style="margin-bottom: 10px;"><a href="#bikes" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">Bikes</a></li>
                    <li style="margin-bottom: 10px;"><a href="#contact" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">Contact</a></li>
                </ul>
            </div>
            
            <div>
                <h4 style="font-size: 18px; margin-bottom
                20px; position: relative; padding-bottom: 10px;">Services</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;"><a href="#bikes" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">Bike Rentals</a></li>
                    <li style="margin-bottom: 10px;"><a href="#services" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">Guided Tours</a></li>
                    <li style="margin-bottom: 10px;"><a href="#services" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">Long-term Rentals</a></li>
                    <li style="margin-bottom: 10px;"><a href="#services" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">Bike Maintenance</a></li>
                    <li style="margin-bottom: 10px;"><a href="#services" style="color: #bdc3c7; text-decoration: none; transition: color 0.3s;">Group Bookings</a></li>
                </ul>
            </div>
            
            <div>
                <h4 style="font-size: 18px; margin-bottom: 20px; position: relative; padding-bottom: 10px;">Contact Info</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 15px; display: flex; align-items: flex-start;">
                        <i class="fas fa-map-marker-alt" style="color: #e74c3c; margin-right: 10px; margin-top: 5px;"></i>
                        <span style="color: #bdc3c7;">123 Bike Street, Mumbai, Maharashtra 400001</span>
                    </li>
                    <li style="margin-bottom: 15px; display: flex; align-items: center;">
                        <i class="fas fa-phone" style="color: #e74c3c; margin-right: 10px;"></i>
                        <span style="color: #bdc3c7;">+91 123 456 7890</span>
                    </li>
                    <li style="margin-bottom: 15px; display: flex; align-items: center;">
                        <i class="fas fa-envelope" style="color: #e74c3c; margin-right: 10px;"></i>
                        <span style="color: #bdc3c7;">info@bikehub.com</span>
                    </li>
                </ul>
            </div>
            </div>
            </footer>
            </body>
</html>