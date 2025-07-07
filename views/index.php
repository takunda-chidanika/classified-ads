<?php
require_once __DIR__ . "./../service/AdService.php";
require_once __DIR__ . "./../service/CategoryService.php";
$categories = findAllCategories();
$ads = findAllAds();
?>

<?php require_once __DIR__ . '/../templates/header.php'; ?>
<?php require_once __DIR__ . '/../templates/navbar.php'; ?>

<?php require_once __DIR__ . '/../templates/styles.php'; ?>

<div class="animated-bg"></div>

<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Find Your Perfect Deal</h1>
                <p class="hero-subtitle">Discover amazing products from trusted sellers in your area</p>

                <div class="search-container">
                    <input type="text" class="search-bar" placeholder="Search for products, brands, or categories...">
                </div>

                <div class="hero-cta">
                    <a href="#categories" class="btn-modern btn-primary-modern">
                        <i class="fas fa-search mr-2"></i>Browse Categories
                    </a>
                    <a href="ads/create.php" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-plus mr-2"></i>Post Your Ad
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="category-section">
        <div class="container">
            <h2 class="section-title animate-on-scroll">Popular Categories</h2>
            <div class="category-grid">
                <?php
                $categoryIcons = [
                    'Electronics' => 'fas fa-laptop',
                    'Vehicles' => 'fas fa-car',
                    'Fashion' => 'fas fa-tshirt',
                    'Home & Garden' => 'fas fa-home',
                    'Sports' => 'fas fa-basketball-ball',
                    'Books' => 'fas fa-book',
                    'Jobs' => 'fas fa-briefcase',
                    'Services' => 'fas fa-tools'
                ];

                foreach ($categories as $index => $category):
                    $icon = $categoryIcons[$category['name']] ?? 'fas fa-tag';
                    $count = rand(20, 150); // Replace with actual count
                ?>
                    <div class="category-card animate-on-scroll" style="animation-delay: <?= $index * 0.1 ?>s">
                        <div class="category-icon">
                            <i class="<?= $icon ?>"></i>
                        </div>
                        <h3 class="category-title"><?= htmlspecialchars($category['name']) ?></h3>
                        <p class="category-count"><?= $count ?> active listings</p>
                        <a href="ads/index.php?category=<?= htmlspecialchars($category['id']) ?>"
                            class="btn-modern btn-secondary-modern">
                            <i class="fas fa-arrow-right mr-2"></i>Explore
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Sponsored Ads Section -->
    <section class="sponsored-section">
        <div class="container">
            <h2 class="section-title animate-on-scroll">Featured Listings</h2>

            <?php
            $sponsoredAds = [
                'Electronics' => $ads,
            ];

            foreach ($sponsoredAds as $categoryName => $ads): ?>
                <div class="mb-5">
                    <h3 class="h4 text-white mb-4 animate-on-scroll"><?= htmlspecialchars($categoryName) ?></h3>
                    <div class="ad-grid">
                        <?php foreach ($ads as $index => $ad): ?>
                            <div class="ad-card animate-on-scroll" style="animation-delay: <?= $index * 0.1 ?>s">
                                <img src="<?= htmlspecialchars(!empty($ad['image']) ? '../' . $ad['image'] : 'https://placehold.co/600x400/EEE/31343C') ?>"
                                    alt="<?= htmlspecialchars($ad['title']) ?>"
                                    class="ad-image">
                                <div class="ad-content">
                                    <h4 class="ad-title"><?= htmlspecialchars($ad['title']) ?></h4>
                                    <p class="ad-price">$<?= number_format($ad['price']) ?></p>
                                    <p class="ad-location">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        <?= htmlspecialchars($ad['contact_location']) ?>
                                    </p>
                                    <a href="ads/details.php?ad=<?= $index + 1 ?>"
                                        class="btn-modern btn-primary-modern">
                                        <i class="fas fa-eye mr-2"></i>View Details
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate elements on scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.animate-on-scroll');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;

                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('animated');
                }
            });
        };

        window.addEventListener('scroll', animateOnScroll);
        animateOnScroll(); // Initial check

        // Search functionality
        const searchBar = document.querySelector('.search-bar');
        if (searchBar) {
            searchBar.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const searchTerm = this.value.trim();
                    if (searchTerm) {
                        window.location.href = `ads/index.php?search=${encodeURIComponent(searchTerm)}`;
                    }
                }
            });
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add parallax effect to hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero-section');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Add loading animation to cards
        const cards = document.querySelectorAll('.category-card, .ad-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>



<?php require_once __DIR__ . '/../templates/footer.php'; ?>