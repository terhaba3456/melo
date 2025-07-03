<?php
session_start();
require_once 'config/database.php';
require_once 'includes/functions.php';

// Load site settings
$settings = loadSettings();
$banners = loadBanners();
$sponsors = loadSponsors();
$stats = loadStats();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $settings['site_title'] ?? 'MELO ROMA - Casino Affiliate'; ?></title>
    <meta name="description" content="<?php echo $settings['site_description'] ?? 'Türkiye\'nin en güvenilir casino affiliate platformu'; ?>">
    
    <!-- HTTPS Compatible External Resources -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Local Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    
    <!-- Meta Tags for SEO -->
    <meta property="og:title" content="<?php echo $settings['site_title'] ?? 'MELO ROMA'; ?>">
    <meta property="og:description" content="<?php echo $settings['site_description'] ?? 'Türkiye\'nin en güvenilir casino affiliate platformu'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST']; ?>">
</head>
<body>
    <!-- Popup Modal -->
    <?php if ($settings['popup_enabled'] ?? true): ?>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-modal">
            <button class="popup-close" onclick="closePopup()">
                <i class="fas fa-times"></i>
            </button>
            <div class="popup-content">
                <div class="popup-header">
                    <h3>BİGWİNO 333% DENEME BONUSU</h3>
                </div>
                <div class="popup-image">
                    <img src="assets/images/popup-banner.jpg" alt="333% Deneme Bonusu">
                </div>
                <div class="popup-footer">
                    <p><?php echo $settings['popup_text'] ?? 'Melo Yazılım ile Özel Bonuslar'; ?></p>
                    <a href="<?php echo $settings['popup_link'] ?? 'https://t.me/melo_roma'; ?>" 
                       target="_blank" class="popup-btn">
                        Görüntüle
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <div class="logo-text">
                        <h1>MELO ROMA</h1>
                        <p>Değerli İş Ortakları</p>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="desktop-nav">
                    <a href="#home">Ana Sayfa</a>
                    <a href="#sponsors">Sponsorlar</a>
                    <a href="#channels">Kanallarımız</a>
                    <a href="#stats">İstatistikler</a>
                    <a href="#deals">Yeni Anlaşmalar</a>
                </nav>
                
                <div class="header-actions">
                    <div class="user-stats">
                        <i class="fas fa-users"></i>
                        <span><?php echo $stats['active_users'] ?? 847; ?></span>
                    </div>
                    <a href="https://t.me/melo_roma" target="_blank" class="telegram-btn">
                        <i class="fab fa-telegram"></i>
                        Telegram
                    </a>
                    <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-header">
            <h3>Menü</h3>
            <button onclick="toggleMobileMenu()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="mobile-nav">
            <a href="#home" onclick="toggleMobileMenu()">Ana Sayfa</a>
            <a href="#sponsors" onclick="toggleMobileMenu()">Sponsorlar</a>
            <a href="#channels" onclick="toggleMobileMenu()">Kanallarımız</a>
            <a href="#stats" onclick="toggleMobileMenu()">İstatistikler</a>
            <a href="#deals" onclick="toggleMobileMenu()">Yeni Anlaşmalar</a>
        </nav>
    </div>

    <!-- Main Banner Section -->
    <section id="home" class="banner-section">
        <div class="banner-container">
            <div class="banner-slider" id="bannerSlider">
                <?php foreach ($banners as $index => $banner): ?>
                <div class="banner-slide <?php echo $index === 0 ? 'active' : ''; ?>" 
                     style="background-image: url('<?php echo htmlspecialchars($banner['image']); ?>')">
                    <div class="banner-overlay">
                        <div class="banner-content">
                            <h2><?php echo htmlspecialchars($banner['title']); ?></h2>
                            <?php if (!empty($banner['subtitle'])): ?>
                            <p><?php echo htmlspecialchars($banner['subtitle']); ?></p>
                            <?php endif; ?>
                            <a href="<?php echo htmlspecialchars($banner['link']); ?>" 
                               target="_blank" class="banner-btn">
                                <i class="fab fa-telegram"></i>
                                <?php echo htmlspecialchars($banner['button_text']); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Banner Navigation -->
            <?php if (count($banners) > 1): ?>
            <div class="banner-nav">
                <button class="banner-prev" onclick="prevSlide()">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="banner-next" onclick="nextSlide()">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            
            <!-- Banner Dots -->
            <div class="banner-dots">
                <?php foreach ($banners as $index => $banner): ?>
                <button class="dot <?php echo $index === 0 ? 'active' : ''; ?>" 
                        onclick="currentSlide(<?php echo $index + 1; ?>)"></button>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Aktif Kullanıcı</h3>
                        <span class="stat-number"><?php echo $stats['active_users'] ?? 847; ?></span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon gold">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Sponsorlar</h3>
                        <span class="stat-number"><?php echo $stats['sponsor_count'] ?? 12; ?></span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Günlük Ziyaret</h3>
                        <span class="stat-number"><?php echo $stats['daily_visits'] ?? '1,254'; ?></span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Başarı Oranı</h3>
                        <span class="stat-number"><?php echo $stats['success_rate'] ?? '98.5%'; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sponsors Section -->
    <section id="sponsors" class="sponsors-section">
        <div class="container">
            <div class="section-header">
                <h2>Sponsorlarımız</h2>
                <p>Güvenilir ve lisanslı bahis sitelerimiz</p>
            </div>
            
            <!-- Filter Tabs -->
            <div class="filter-tabs">
                <button class="filter-btn active" onclick="filterSponsors('all')">Tümü</button>
                <button class="filter-btn" onclick="filterSponsors('vip')">VIP</button>
                <button class="filter-btn" onclick="filterSponsors('guvenilir')">Güvenilir</button>
                <button class="filter-btn" onclick="filterSponsors('yeni')">Yeni</button>
            </div>
            
            <!-- Sponsors Grid -->
            <div class="sponsors-grid" id="sponsorsGrid">
                <?php foreach ($sponsors as $sponsor): ?>
                <div class="sponsor-card" data-category="<?php echo $sponsor['category']; ?>">
                    <div class="sponsor-header">
                        <div class="sponsor-icon <?php echo $sponsor['category']; ?>">
                            <i class="<?php echo getSponsorIcon($sponsor['category']); ?>"></i>
                        </div>
                        <span class="sponsor-badge <?php echo $sponsor['category']; ?>">
                            <?php echo strtoupper($sponsor['category']); ?>
                        </span>
                    </div>
                    
                    <div class="sponsor-logo">
                        <?php if (!empty($sponsor['logo'])): ?>
                        <img src="<?php echo htmlspecialchars($sponsor['logo']); ?>" 
                             alt="<?php echo htmlspecialchars($sponsor['name']); ?>">
                        <?php else: ?>
                        <div class="sponsor-name-fallback">
                            <?php echo htmlspecialchars($sponsor['name']); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="sponsor-content">
                        <h3><?php echo htmlspecialchars($sponsor['name']); ?></h3>
                        <p><?php echo htmlspecialchars($sponsor['description']); ?></p>
                        
                        <div class="sponsor-rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                            <i class="fas fa-star <?php echo $i <= $sponsor['rating'] ? 'active' : ''; ?>"></i>
                            <?php endfor; ?>
                        </div>
                        
                        <div class="sponsor-bonus">
                            <span class="bonus-amount"><?php echo generateBonusAmount(); ?></span>
                            <span class="bonus-text"><?php echo $sponsor['bonus_text']; ?></span>
                        </div>
                        
                        <div class="sponsor-actions">
                            <a href="<?php echo htmlspecialchars($sponsor['link']); ?>" 
                               target="_blank" class="sponsor-btn primary">
                                <?php echo htmlspecialchars($sponsor['button_text']); ?>
                            </a>
                            <div class="sponsor-sub-actions">
                                <button class="sponsor-btn secondary">
                                    <?php echo $sponsor['button1_text'] ?? 'MELO ÖZEL'; ?>
                                </button>
                                <button class="sponsor-btn secondary">
                                    <?php echo $sponsor['button2_text'] ?? 'TELEGRAM'; ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Channels Section -->
    <section id="channels" class="channels-section">
        <div class="container">
            <div class="section-header">
                <h2>Kanallarımız</h2>
                <p>MELO'nun resmi Telegram kanalları ve toplulukları</p>
            </div>
            
            <div class="channels-grid">
                <div class="channel-card featured">
                    <div class="channel-icon">
                        <i class="fab fa-telegram"></i>
                    </div>
                    <div class="channel-content">
                        <h3>MELO Ana Kanal</h3>
                        <p>Güncel bonuslar, özel teklifler ve anında bildirimler</p>
                        <div class="channel-stats">
                            <span><i class="fas fa-users"></i> 15.2K Üye</span>
                            <span class="online"><i class="fas fa-circle"></i> Aktif</span>
                        </div>
                    </div>
                    <a href="https://t.me/melo_roma" target="_blank" class="channel-btn">
                        <i class="fab fa-telegram"></i>
                        Katıl
                    </a>
                </div>
                
                <div class="channel-card">
                    <div class="channel-icon vip">
                        <i class="fas fa-crown"></i>
                    </div>
                    <div class="channel-content">
                        <h3>MELO VIP Grup</h3>
                        <p>VIP üyeler için özel bonuslar ve insider bilgileri</p>
                        <div class="channel-stats">
                            <span><i class="fas fa-users"></i> 3.4K Üye</span>
                            <span class="vip"><i class="fas fa-crown"></i> VIP</span>
                        </div>
                    </div>
                    <a href="https://t.me/melo_roma" target="_blank" class="channel-btn vip">
                        <i class="fab fa-telegram"></i>
                        VIP Katıl
                    </a>
                </div>
                
                <div class="channel-card">
                    <div class="channel-icon tips">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="channel-content">
                        <h3>MELO Bahis Tüyoları</h3>
                        <p>Uzman analizler, maç tahminleri ve kazanç stratejileri</p>
                        <div class="channel-stats">
                            <span><i class="fas fa-users"></i> 8.7K Üye</span>
                            <span class="tips"><i class="fas fa-chart-line"></i> Analiz</span>
                        </div>
                    </div>
                    <a href="https://t.me/melo_roma" target="_blank" class="channel-btn tips">
                        <i class="fab fa-telegram"></i>
                        Katıl
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- New Deals Section -->
    <section id="deals" class="deals-section">
        <div class="container">
            <div class="section-header">
                <h2>Yeni Anlaşmalar</h2>
                <p>MELO'nun yeni iş ortaklıkları ve anlaşmaları</p>
            </div>
            
            <div class="deals-grid">
                <div class="deal-card featured">
                    <div class="deal-status new">YENİ</div>
                    <div class="deal-date">29 Haziran 2025</div>
                    <h3>Premium Casino Partnership</h3>
                    <p>Yeni premium casino ortaklığımız ile özel bonuslar ve avantajlar sunuyoruz.</p>
                    <div class="deal-benefits">
                        <span>%200 Hoş Geldin Bonusu</span>
                        <span>Günlük Cashback</span>
                        <span>VIP Destek</span>
                    </div>
                    <a href="https://t.me/melo_roma" target="_blank" class="deal-btn">
                        <i class="fab fa-telegram"></i>
                        Detaylar için Telegram
                    </a>
                </div>
                
                <div class="deal-card">
                    <div class="deal-status pending">YAKINDA</div>
                    <div class="deal-date">Temmuz 2025</div>
                    <h3>Sports Betting Alliance</h3>
                    <p>Spor bahisleri için özel anlaşmamız yakında aktif olacak.</p>
                    <div class="deal-benefits">
                        <span>Canlı Bahis</span>
                        <span>Özel Oranlar</span>
                        <span>Risk-Free Bet</span>
                    </div>
                    <a href="https://t.me/melo_roma" target="_blank" class="deal-btn secondary">
                        <i class="fab fa-telegram"></i>
                        Bilgi Al
                    </a>
                </div>
                
                <div class="deal-card">
                    <div class="deal-status active">AKTİF</div>
                    <div class="deal-date">15 Haziran 2025</div>
                    <h3>Live Casino Partnership</h3>
                    <p>Canlı casino oyunları için özel masa ve dealer avantajları.</p>
                    <div class="deal-benefits">
                        <span>VIP Masalar</span>
                        <span>Özel Limitler</span>
                        <span>Türkçe Dealer</span>
                    </div>
                    <a href="https://t.me/melo_roma" target="_blank" class="deal-btn">
                        <i class="fab fa-telegram"></i>
                        Şimdi Katıl
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <div class="logo-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="logo-text">
                            <h3>MELO ROMA</h3>
                            <p>Değerli İş Ortakları</p>
                        </div>
                    </div>
                    <p><?php echo $settings['footer_text'] ?? 'Tüm hakları saklıdır. MELO Yazılım tarafından geliştirilmiştir.'; ?></p>
                </div>
                
                <div class="footer-section">
                    <h4>Hızlı Linkler</h4>
                    <ul>
                        <li><a href="#sponsors">Sponsorlar</a></li>
                        <li><a href="#channels">Kanallarımız</a></li>
                        <li><a href="#stats">İstatistikler</a></li>
                        <li><a href="#deals">Yeni Anlaşmalar</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>İletişim</h4>
                    <ul>
                        <li><i class="fas fa-envelope"></i> <?php echo $settings['contact_email'] ?? 'info@meloroma.com'; ?></li>
                        <li><i class="fas fa-phone"></i> <?php echo $settings['contact_phone'] ?? '+90 555 123 4567'; ?></li>
                        <li><i class="fab fa-telegram"></i> <a href="https://t.me/melo_roma" target="_blank">Telegram</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Güvenlik</h4>
                    <div class="security-badges">
                        <span class="security-badge">
                            <i class="fas fa-shield-alt"></i>
                            SSL Güvenli
                        </span>
                        <span class="security-badge">
                            <i class="fas fa-lock"></i>
                            +18
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 MELO ROMA. Tüm hakları saklıdır.</p>
                <p>Bu site CyberPanel üzerinde güvenle barındırılmaktadır.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>