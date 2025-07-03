<?php
session_start();

// Admin login credentials
$admin_username = 'meloroma';
$admin_password = 'sametkoc34';

// Check if user is logged in
$is_logged_in = isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;

// Handle login
if ($_POST['action'] === 'login') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: admin.php');
        exit;
    } else {
        $login_error = 'Kullanıcı adı veya şifre hatalı!';
    }
}

// Handle logout
if ($_GET['action'] === 'logout') {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// If not logged in, show login form
if (!$is_logged_in) {
    include 'admin-login.php';
    exit;
}

// Admin is logged in, show admin panel
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MELO ROMA - Admin Panel</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .admin-panel {
            background: var(--primary-color);
            min-height: 100vh;
            padding: 2rem;
        }
        
        .admin-header {
            background: var(--gradient-primary);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .welcome-message {
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            animation: welcomeGlow 2s ease-in-out infinite;
        }
        
        @keyframes welcomeGlow {
            0%, 100% { text-shadow: 0 0 20px rgba(255, 215, 0, 0.3); }
            50% { text-shadow: 0 0 30px rgba(255, 215, 0, 0.6); }
        }
        
        .admin-nav {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .admin-nav-item {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            text-decoration: none;
            color: var(--text-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .admin-nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 215, 0, 0.1), transparent);
            transition: left 0.3s ease;
        }
        
        .admin-nav-item:hover::before {
            left: 100%;
        }
        
        .admin-nav-item:hover {
            transform: translateY(-5px);
            border-color: var(--accent-color);
            box-shadow: 0 10px 25px rgba(255, 215, 0, 0.2);
        }
        
        .admin-nav-item i {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }
        
        .admin-nav-item h3 {
            margin-bottom: 1rem;
            color: var(--accent-color);
        }
        
        .admin-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .admin-stat-card {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
        }
        
        .admin-stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }
        
        .admin-stat-label {
            color: var(--text-secondary);
            font-size: 1rem;
        }
        
        .logout-btn {
            position: fixed;
            top: 2rem;
            right: 2rem;
            background: var(--gradient-gold);
            color: var(--primary-color);
            border: none;
            padding: 1rem 2rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }
        
        .recent-activity {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 15px;
            padding: 2rem;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            color: var(--accent-color);
            font-size: 1.2rem;
        }
        
        .activity-text {
            flex: 1;
        }
        
        .activity-time {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <a href="admin.php?action=logout" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Çıkış Yap
        </a>
        
        <div class="admin-header">
            <div class="welcome-message">
                <i class="fas fa-crown"></i>
                Samet Patron Hoşgeldin Mekanına
            </div>
            <p>MELO ROMA Admin Panel'e hoş geldiniz!</p>
        </div>
        
        <div class="admin-stats">
            <div class="admin-stat-card">
                <div class="admin-stat-number">32</div>
                <div class="admin-stat-label">Aktif Sponsor</div>
            </div>
            <div class="admin-stat-card">
                <div class="admin-stat-number">4</div>
                <div class="admin-stat-label">Banner</div>
            </div>
            <div class="admin-stat-card">
                <div class="admin-stat-number">45.7K</div>
                <div class="admin-stat-label">Toplam Üye</div>
            </div>
            <div class="admin-stat-card">
                <div class="admin-stat-number">₺2.5M</div>
                <div class="admin-stat-label">Toplam Bonus</div>
            </div>
        </div>
        
        <div class="admin-nav">
            <a href="admin-banners.php" class="admin-nav-item">
                <i class="fas fa-images"></i>
                <h3>Banner Yönetimi</h3>
                <p>Banner ekle, düzenle ve sil</p>
            </a>
            
            <a href="admin-sponsors.php" class="admin-nav-item">
                <i class="fas fa-star"></i>
                <h3>Sponsor Yönetimi</h3>
                <p>Sponsor kartlarını yönet</p>
            </a>
            
            <a href="admin-channels.php" class="admin-nav-item">
                <i class="fab fa-telegram"></i>
                <h3>Kanal Yönetimi</h3>
                <p>Telegram kanallarını yönet</p>
            </a>
            
            <a href="admin-deals.php" class="admin-nav-item">
                <i class="fas fa-handshake"></i>
                <h3>Anlaşma Yönetimi</h3>
                <p>Yeni anlaşmaları yönet</p>
            </a>
            
            <a href="admin-settings.php" class="admin-nav-item">
                <i class="fas fa-cog"></i>
                <h3>Site Ayarları</h3>
                <p>Genel site ayarlarını düzenle</p>
            </a>
            
            <a href="admin-stats.php" class="admin-nav-item">
                <i class="fas fa-chart-bar"></i>
                <h3>İstatistikler</h3>
                <p>Detaylı raporları görüntüle</p>
            </a>
        </div>
        
        <div class="recent-activity">
            <h3 style="color: var(--accent-color); margin-bottom: 2rem;">
                <i class="fas fa-clock"></i> Son Aktiviteler
            </h3>
            
            <div class="activity-item">
                <i class="fas fa-plus activity-icon"></i>
                <div class="activity-text">Yeni sponsor eklendi: Lunabet</div>
                <div class="activity-time">2 saat önce</div>
            </div>
            
            <div class="activity-item">
                <i class="fas fa-edit activity-icon"></i>
                <div class="activity-text">Banner güncellendi: Politika Bonus</div>
                <div class="activity-time">4 saat önce</div>
            </div>
            
            <div class="activity-item">
                <i class="fas fa-users activity-icon"></i>
                <div class="activity-text">Telegram kanalı güncellendi</div>
                <div class="activity-time">1 gün önce</div>
            </div>
            
            <div class="activity-item">
                <i class="fas fa-cog activity-icon"></i>
                <div class="activity-text">Site ayarları değiştirildi</div>
                <div class="activity-time">2 gün önce</div>
            </div>
        </div>
    </div>
    
    <script>
        // Admin welcome animation
        document.addEventListener('DOMContentLoaded', function() {
            const welcomeMessage = document.querySelector('.welcome-message');
            
            // Show welcome animation
            setTimeout(() => {
                welcomeMessage.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    welcomeMessage.style.transform = 'scale(1)';
                }, 200);
            }, 500);
            
            console.log('MELO ROMA Admin Panel - Loaded Successfully');
        });
        
        // Stats animation
        function animateStats() {
            const statNumbers = document.querySelectorAll('.admin-stat-number');
            
            statNumbers.forEach(element => {
                const target = element.textContent;
                const numericValue = parseInt(target.replace(/[^\d]/g, ''));
                
                if (isNaN(numericValue)) return;
                
                let current = 0;
                const increment = numericValue / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= numericValue) {
                        current = numericValue;
                        clearInterval(timer);
                    }
                    
                    if (target.includes('K')) {
                        element.textContent = Math.floor(current / 1000) + '.7K';
                    } else if (target.includes('M')) {
                        element.textContent = '₺' + (current / 1000000).toFixed(1) + 'M';
                    } else {
                        element.textContent = Math.floor(current);
                    }
                }, 50);
            });
        }
        
        // Start animations after page load
        setTimeout(animateStats, 1000);
    </script>
</body>
</html>