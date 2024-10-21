<?php
session_start(); // Pastikan sesi dimulai
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="posttest.css">
    <title>DonateNow - Online Donation</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo">Donasi<span>Kita</span></div>
            <ul class="nav-links" id="nav-links">
                <li><a href="index.php#home">Home</a></li>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="index.php#programs">Programs</a></li>
                <li><a href="index.php#donation">Donate</a></li>
                <li><a href="index.php#testimonials">Testimonials</a></li>
                <li><a href="index.php#contact">Contact</a></li>
                <li><a href="kelola_program.php">Kelola Program</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
            <button id="mode-toggle" class="mode-toggle"><b>Dark Mode</b></button>
            <div class="burger" id="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Home Section -->
        <section id="home" class="home-section">
            <div class="hero-content">
                <h1><strong>DONASIKITA</strong></h1>
                <p>Donasi Anda membawa harapan dan perubahan nyata bagi yang membutuhkan. <br>Setiap kontribusi berarti.</p>
                <button class="donate-btn" id="open-popup">Donate Now</button>
            </div>
        </section>

        <!-- Programs Section -->
        <section id="programs" class="programs-section"><br>
            <h2>Our Donation Programs</h2>
            <div class="program-cards">
                <div class="card">
                    <img src="edukasi.jpeg" alt="Edukasi anak-anak" class="small-image1">
                    <h3>Program Edukasi untuk <br>Anak-anak</h3>
                    <p>
                        Kami menyediakan akses pendidikan berkualitas untuk anak-anak di daerah terbelakang, membantu memutus siklus kemiskinan melalui pengetahuan dan pembelajaran.
                    </p>
                </div>
                <div class="card">
                    <img src="kesehatan.jpeg" alt="Healthcare Icon" class="small-image2">
                    <h3>Program Bantuan Kesehatan</h3>
                    <p>
                        Program kesehatan, kami memberikan bantuan terhadap mereka yang perawatan kritis dan dukungan medis kepada mereka yang tidak mampu, memastikan semua orang dapat mengakses pengobatan yang tepat.
                    </p>
                </div>
                <div class="card">
                    <img src="bencana.jpg" alt="Disaster Relief Icon" class="small-image3">
                    <h3>Program Bantuan Bencana</h3>
                    <p>
                        Kami merespons dengan cepat terhadap bencana alam, kami akan memberikan makanan, tempat tinggal, dan perlengkapan medis kepada mereka yang terkena dampaknya, serta membantu komunitas untuk pulih.
                    </p>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials-section">
            <h2>What People Say About Us</h2>
            <div class="testimonial-cards">
                <div class="testimonial-card">
                    <p>"Saya merasa sangat puas bisa berkontribusi melalui organisasi ini. Setiap donasi yang saya berikan digunakan dengan transparan dan berdampak langsung pada kehidupan orang-orang yang membutuhkan. Melihat anak-anak mendapatkan pendidikan dan keluarga mendapatkan akses ke layanan kesehatan membuat saya merasa bangga. Saya akan terus mendukung program-program luar biasa ini!"</p>
                    <h3>— Budi W.</h3>
                </div>
                <div class="testimonial-card">
                    <p>"Ketika bencana melanda desa kami, kami merasa putus asa. Namun, berkat bantuan yang diberikan, kami mendapatkan makanan, perlindungan, dan dukungan medis. Kami sangat berterima kasih kepada semua donatur yang telah membantu kami melalui masa sulit ini. Kehidupan kami perlahan-lahan kembali normal berkat bantuan ini."</p>
                    <h3>— Andi T. </h3>
                </div>
                <div class="testimonial-card">
                    <p>"Saya sangat terkesan dengan dampak yang ditimbulkan oleh organisasi ini. Melalui donasi saya, saya bisa melihat langsung bagaimana bantuan kami membantu anak-anak mendapatkan pendidikan yang layak dan akses ke layanan kesehatan. Mereka benar-benar bekerja keras untuk membuat perubahan positif di komunitas yang membutuhkan. Saya merasa bangga bisa menjadi bagian dari inisiatif ini!"</p>
                    <h3>— Rina S.</h3>
                </div>
            </div>
        </section>

        <!-- Donation Section -->
        <section id="donation" class="donation-section">
            <h2>Ready to Make a Change?</h2>
            <p>Your contributions can help bring real change. Join us in making a difference today.</p>
            <button class="donate-btn" id="open-popup">Donate Now</button>
        </section>

        <!-- About Us Section -->
        <section id="about" class="about-section">
            <h2>About Us</h2>
            <div class="justified-text">
                <p>
                    Selamat datang di DonasiKita, platform donasi online yang bertujuan untuk mempermudah Anda berbagi kebaikan dengan mereka yang membutuhkan. Kami percaya bahwa setiap orang memiliki potensi untuk membantu, baik dalam bentuk dana, waktu, maupun perhatian. Melalui platform ini, kami menghubungkan para donatur dengan berbagai organisasi dan individu yang memerlukan bantuan di berbagai bidang, mulai dari kesehatan, pendidikan, hingga penanggulangan bencana.
                </p>
                <p>
                    Misi kami adalah menciptakan dunia yang lebih baik melalui kolaborasi. Kami berkomitmen untuk memberikan transparansi penuh, sehingga Anda dapat melihat dampak nyata dari setiap kontribusi yang Anda berikan. Dengan teknologi yang kami kembangkan, donasi Anda dapat sampai ke tujuan dengan cepat, aman, dan tepat sasaran.
                </p>
                <p>
                    Mari bergabung bersama kami dalam perjalanan menuju perubahan. Bersama, kita bisa membuat perbedaan.
                </p>
            </div>
            <div class="about-image">
                <img src="kucing.jpg" alt="About Us Image">
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact-section">
            <div class="contact-container">
                <div class="contact-left">
                    <h2>DonasiKita.com</h2>
                    <p>Kami telah memiliki Izin Pengumpulan Uang dan Barang untuk Non Bencana di Kementerian Sosial Republik Indonesia dengan no surat izin 341/HUK-PS/2023</p>
                    <div class="social-links">
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Popup Box -->
                <div class="popup-overlay" id="popup-overlay">
                    <div class="popup">
                        <h2>Metode Pembayaran</h2>
                        <div class="payment-methods">
                            <h3></h3>
                            <ul>
                                <li>
                                    <img src="Bank BRI.png" alt="Bank BRI">
                                    <span class="method-name"><b>BRI</b></span>
                                    <span class="arrow">></span>
                                </li>
                                <li>
                                    <img src="Permata Bank.png" alt="Permata">
                                    <span class="method-name"><b>Permata</b></span>
                                    <span class="arrow">></span>
                                </li>
                                <li>
                                    <img src="maybank.png" alt="Maybank">
                                    <span class="method-name"><b>Maybank</b></span>
                                    <span class="arrow">></span>
                                </li>
                                <li>
                                    <img src="CIMB Niaga Logo.png" alt="CIMB">
                                    <span class="method-name"><b>CIMB</b></span>
                                    <span class="arrow">></span>
                                </li>
                                <li>
                                    <img src="BSI (Bank Syariah Indonesia).png" alt="BSI">
                                    <span class="method-name"><b>BSI</b></span>
                                    <span class="arrow">></span>
                                </li>
                                <li>
                                    <img src="Bank Danamon.png" alt="Danamon">
                                    <span class="method-name"><b>Danamon</b></span>
                                    <span class="arrow">></span>
                                </li>
                            </ul>
                            <h4></h4>
                            <ul>
                                <li>
                                    <img src="visa.png" alt="Visa/Mastercard">
                                    <span class="method-name"><b>Visa/Mastercard</b></span>
                                    <span class="arrow">></span>
                                </li>
                                <li>
                                    <img src="logo alfamart.png" alt="Alfamart/Pegadaian/POS">
                                    <span class="method-name"><B>Alfamart/Pegadaian/POS</B></span>
                                    <span class="arrow">></span>
                                </li>
                            </ul>
                        </div>
                        <button class="close-popup" id="close-popup">Close</button>
                    </div>
                </div>

                <!-- Footer -->
                <footer>
                    <br><br>
                    <p>&copy; 2024 DonasiKita. All rights reserved.</p>
                </footer>
                <script src="posttest.js"></script>
            </div>
        </section>
    </main>
</body>

</html>