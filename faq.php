<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Bike Rental Service</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        /* Header Section */
        .page-header {
            background-color: #fff;
            padding: 25px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .page-header h1 {
            font-size: 32px;
            font-weight: 600;
            color: #222831;
            position: relative;
            padding-bottom: 10px;
            display: inline-block;
        }
        
        .page-header h1:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #4a90e2;
        }
        
        /* FAQ Container */
        .faq-container {
            max-width: 800px;
            margin: 0 auto 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        /* FAQ Item */
        .faq-item {
            border-bottom: 1px solid #eee;
            padding: 0;
            transition: all 0.3s ease;
        }
        
        .faq-item:last-child {
            border-bottom: none;
        }
        
        .faq-question {
            padding: 20px 30px;
            cursor: pointer;
            position: relative;
            font-weight: 500;
            font-size: 17px;
            color: #222831;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .faq-question:hover {
            background-color: #f7f9fc;
        }
        
        .faq-question i {
            font-size: 14px;
            color: #4a90e2;
        }
        
        .faq-answer {
            padding: 0 30px 20px;
            color: #666;
            font-size: 15px;
        }
        
        /* Contact Section */
        .contact-section {
            max-width: 800px;
            margin: 0 auto;
            background-color: #222831;
            border-radius: 8px;
            padding: 30px;
            color: white;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .contact-section h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 500;
        }
        
        .contact-methods {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        .contact-method {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            flex: 1;
            min-width: 200px;
            transition: all 0.3s ease;
        }
        
        .contact-method:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }
        
        .contact-method i {
            font-size: 24px;
            margin-bottom: 10px;
            color: #4a90e2;
        }
        
        .contact-method h3 {
            margin-bottom: 10px;
            font-weight: 500;
            font-size: 16px;
            color: white;
        }
        
        .contact-method p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .faq-container, .contact-section {
                margin-left: 15px;
                margin-right: 15px;
            }
            
            .contact-method {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php' ?>
    
    <!-- Page Header -->
    <div class="page-header">
        <h1>Frequently Asked Questions</h1>
    </div>
    
    <!-- FAQ Container -->
    <div class="faq-container">
        <div class="faq-item">
            <div class="faq-question">
                Do you charge by kilometers or days?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>We charge by days, not kilometers. You can rent a bike for a specific number of days and drive it as much as you want within that time frame without worrying about additional charges based on mileage.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question">
                What is your cancellation policy?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Yes, you can cancel your subscription at any time from your account settings. Cancellations made 24 hours before your scheduled pickup will receive a full refund. Cancellations within 24 hours may be subject to a cancellation fee.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question">
                Do I need a special license to rent a motorcycle?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Yes, you must have a valid motorcycle license or endorsement to rent any of our motorcycles. Different bike categories may require different license classifications depending on local regulations.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <div class="faq-question">
                Is insurance included with the rental?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Basic insurance is included with all rentals. However, we recommend purchasing additional coverage for complete peace of mind. Our staff can provide details about available insurance options when you pick up your bike.</p>
            </div>
        </div>
    </div>
    
    <!-- Contact Section -->
    <div class="contact-section">
        <h2>Still Have Questions?</h2>
        <div class="contact-methods">
            <div class="contact-method">
                <i class="fas fa-phone"></i>
                <h3>Phone Support</h3>
                <p>Call us at 123-456-7890</p>
                <p>Mon-Fri: 9am-6pm</p>
            </div>
            
            <div class="contact-method">
                <i class="fas fa-envelope"></i>
                <h3>Email Us</h3>
                <p>support@bikerental.com</p>
                <p>We reply within 24 hours</p>
            </div>
        </div>
    </div>
    
    <script>
        // Simple accordion functionality
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                
                // Toggle the active class
                if (answer.style.maxHeight) {
                    answer.style.maxHeight = null;
                    question.querySelector('i').classList.remove('fa-chevron-up');
                    question.querySelector('i').classList.add('fa-chevron-down');
                } else {
                    answer.style.maxHeight = answer.scrollHeight + "px";
                    question.querySelector('i').classList.remove('fa-chevron-down');
                    question.querySelector('i').classList.add('fa-chevron-up');
                }
            });
        });
    </script>
</body>
</html>