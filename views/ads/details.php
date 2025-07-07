<?php
session_start();
$error = $_SESSION['ad_error'] ?? '';
unset($_SESSION['ad_error']);

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_GET['ad'];

require_once __DIR__ . "./../../service/CategoryService.php";
require_once __DIR__ . "./../../service/AdService.php";

$ad = findAdById($id);
$categoryName = getCategoryName($ad["category"]);
$ads = findAllAdsByCategory($ad["category"]);
?>

<?php require_once __DIR__ . '/../../templates/header.php'; ?>
<?php require_once __DIR__ . '/../../templates/navbar.php'; ?>

<?php require_once __DIR__ . '/../../templates/styles.php'; ?>

<body>
    <div class="animated-bg"></div>

    <main>
        <!-- Main Content -->
        <section class="content-section">
            <div class="container">
                <div class="content-grid">
                    <!-- Image Gallery -->
                    <div class="glass-card image-gallery animate-on-scroll">
                        <div style="padding: 1.5rem;">
                            <div class="image-placeholder">
                                <img src="<?= htmlspecialchars(!empty($ad['image']) ? '../' . $ad['image'] : 'https://placehold.co/600x400/EEE/31343C') ?>"
                                    alt="<?= htmlspecialchars($ad['title']) ?>"
                                    class="ad-image">
                            </div>                            
                        </div>
                    </div>

                    <!-- Ad Details -->
                    <div class="glass-card ad-details animate-on-scroll">
                        <div class="ad-header">
                            <div class="ad-badges">
                                <span class="badge badge-success">Published</span>
                                <span class="badge badge-info">Sponsored</span>
                            </div>
                        </div>

                        <h2 class="ad-title"><?= htmlspecialchars($ad['title']) ?></h2>
                        <div class="ad-price">$<?= htmlspecialchars($ad['price']) ?></div>

                        <div class="ad-description">
                            <?= htmlspecialchars($ad['description']) ?>
                        </div>

                        <table class="details-table">
                            <tr>
                                <td><i class="fas fa-tag"></i> Category:</td>
                                <td><?= htmlspecialchars($categoryName) ?></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-map-marker-alt"></i> Location:</td>
                                <td><?= htmlspecialchars($ad['contact_location']) ?></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-envelope"></i> Contact:</td>
                                <td><a href="mailto:seller@example.com"><?= htmlspecialchars($ad['contact_email']) ?></a></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-calendar"></i> Posted:</td>
                                <td><?= htmlspecialchars($ad['created_at']) ?></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-edit"></i> Updated:</td>
                                <td><?= htmlspecialchars($ad['update_at']) ?></td>
                            </tr>
                        </table>

                        <div class="contact-section">
                            <a href="mailto:seller@example.com?subject=Interest in: iPhone 14 Pro Max" class="contact-btn">
                                <i class="fas fa-envelope"></i> Contact Seller
                            </a>                           
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Ads Section -->
        <section class="related-section">
            <div class="container">
                <div class="glass-card animate-on-scroll">
                    <div style="padding: 2rem;">
                        <h3 class="section-title">Related Ads</h3>

                        <div class="related-grid">
                            <?php foreach($ads as $ad):?>
                            <div class="related-card">
                                <div class="related-image-placeholder">
                                    <img src="<?= htmlspecialchars(!empty($ad['image']) ? '../../' . $ad['image'] : 'https://placehold.co/600x400/EEE/31343C') ?>"
                                    alt="<?= htmlspecialchars($ad['title']) ?>"
                                    class="ad-image">
                                </div>
                                <div class="related-content">
                                    <h4 class="related-title"><?= htmlspecialchars($ad['title']) ?></h4>
                                    <div class="related-price"><?= htmlspecialchars($ad['price']) ?></div>
                                    <a href="#" class="related-btn">
                                        <i class="fas fa-eye"></i> View Details
                                    </a>
                                </div>
                            </div>  
                            <?php endforeach;?>
                         
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Image Modal -->
    <div class="modal" id="imageModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Image View</h5>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <img id="modalImage" class="modal-image" src="" alt="Ad Image">
            </div>
        </div>
    </div>

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

            // Handle thumbnail clicks
            document.querySelectorAll('.thumbnail').forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const imageSrc = this.src;
                    showModal(imageSrc);
                });
            });

            // Modal functionality
            window.onclick = function(event) {
                const modal = document.getElementById('imageModal');
                if (event.target === modal) {
                    closeModal();
                }
            };

            // Add parallax effect to background
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const bg = document.querySelector('.animated-bg');
                if (bg) {
                    bg.style.transform = `translateY(${scrolled * 0.1}px)`;
                }
            });

            // Add stagger animation to related cards
            const relatedCards = document.querySelectorAll('.related-card');
            relatedCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });

        function showModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;
            modal.classList.add('active');
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
        }
    </script>
</body>
</html>