<?php include 'header.php'; ?>
<?php
$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';
    
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone'] ?? '');
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);
    
    $sql = "INSERT INTO contacts (name, email, phone, subject, message) 
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";
    
    if ($conn->query($sql)) {
        $success = "Thank you for contacting us! We will get back to you within 24 hours.";
    } else {
        $error = "Something went wrong. Please try again later.";
    }
    $conn->close();
}
?>

<h2 style="text-align: center;"><i class="fas fa-address-card"></i> Contact Us</h2>

<div class="contact-container">
    <div class="contact-form">
        <h3><i class="fas fa-paper-plane"></i> Send us a message</h3>
        <?php if($success): ?>
            <div class="success-message"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Your Full Name" required>
            <input type="email" name="email" placeholder="Your Email Address" required>
            <input type="tel" name="phone" placeholder="Your Phone Number">
            <select name="subject" required>
                <option value="">Select Subject</option>
                <option value="Product Inquiry">Product Inquiry</option>
                <option value="Bulk Order">Bulk Order</option>
                <option value="Partnership">Partnership</option>
                <option value="Feedback">Feedback</option>
                <option value="Other">Other</option>
            </select>
            <textarea name="message" rows="5" placeholder="Your Message here..." required></textarea>
            <button type="submit"><i class="fas fa-paper-plane"></i> Send Message</button>
        </form>
    </div>
    
    <div class="contact-info">
        <h3><i class="fas fa-info-circle"></i> Get in touch</h3>
        <p><i class="fas fa-phone-alt"></i> <strong>Phone:</strong> <a href="tel:+923001234567">+92 300 1234567</a></p>
        <p><i class="fab fa-whatsapp"></i> <strong>WhatsApp:</strong> <a href="https://wa.me/923001234567">+92 300 1234567</a></p>
        <p><i class="fas fa-envelope"></i> <strong>Email:</strong> info@chickenfarm.com</p>
        <p><i class="fas fa-clock"></i> <strong>Business Hours:</strong><br>
        Monday - Saturday: 8:00 AM - 8:00 PM<br>
        Sunday: 10:00 AM - 4:00 PM</p>
        <p><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong><br>
        123 Poultry Road, Defence Housing Authority,<br>
        Lahore, Punjab, Pakistan - 54000</p>
        
        <a href="https://wa.me/923001234567" class="whatsapp-btn" target="_blank">
            <i class="fab fa-whatsapp"></i> Chat on WhatsApp
        </a>
        
        <a href="tel:+923001234567" class="whatsapp-btn" style="background: #4CAF50; margin-left: 10px;" target="_blank">
            <i class="fas fa-phone-alt"></i> Call Now
        </a>
    </div>
</div>

<div class="map-container">
    <h3 style="margin-bottom: 1rem;"><i class="fas fa-map-marked-alt"></i> Find Us Here</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d217508.35156023253!2d74.20096517518703!3d31.482719742844703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391903ebaba89a0b%3A0xc9feb6d470579311!2sLahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1700000000000!5m2!1sen!2s" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

<?php include 'footer.php'; ?>