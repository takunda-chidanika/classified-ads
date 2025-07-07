<style>
/* Combined Modern Landing Page Styles */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    --glass-bg: rgba(255, 255, 255, 0.1);
    --glass-border: rgba(255, 255, 255, 0.2);
    --shadow-light: 0 8px 32px rgba(0, 0, 0, 0.1);
    --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.2);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    overflow-x: hidden;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

/* ====== ANIMATED BACKGROUND ====== */
.animated-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.animated-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%" r="50%"><stop offset="0%" style="stop-color:rgba(255,255,255,0.1)"/><stop offset="100%" style="stop-color:rgba(255,255,255,0)"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)" opacity="0.6"><animate attributeName="cx" values="200;800;200" dur="10s" repeatCount="indefinite"/></circle><circle cx="800" cy="600" r="150" fill="url(%23a)" opacity="0.4"><animate attributeName="cy" values="600;100;600" dur="15s" repeatCount="indefinite"/></circle><circle cx="400" cy="800" r="80" fill="url(%23a)" opacity="0.5"><animate attributeName="cx" values="400;600;400" dur="12s" repeatCount="indefinite"/></circle></svg>') center/cover;
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { 
        transform: translateY(0) rotate(0deg); 
    }
    50% { 
        transform: translateY(-20px) rotate(180deg); 
    }
}

/* ====== GLASS MORPHISM CARDS ====== */
.glass-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid var(--glass-border);
    box-shadow: var(--shadow-light);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.glass-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.glass-card:hover::before {
    opacity: 1;
}

.glass-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-heavy);
}

/* ====== NAVIGATION ====== */
.nav-section {
    padding: 2rem 0;
    position: relative;
}

.breadcrumb {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 2rem;
    background: none;
    padding: 0;
}

.breadcrumb-item {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-item:hover {
    color: white;
}

.breadcrumb-item.active {
    color: white;
    font-weight: 600;
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.6);
}

/* ====== HERO SECTION ====== */
.hero-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    padding: 2rem 0;
}

.hero-content {
    max-width: 800px;
    z-index: 2;
}

.hero-title {
    font-size: clamp(3rem, 8vw, 6rem);
    font-weight: 800;
    background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    animation: fadeInUp 1s ease-out;
}

.hero-subtitle {
    font-size: clamp(1.2rem, 3vw, 1.5rem);
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2rem;
    animation: fadeInUp 1s ease-out 0.2s both;
}

.hero-cta {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    animation: fadeInUp 1s ease-out 0.4s both;
}

/* ====== HEADER SECTION ====== */
.header-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 3rem;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
    margin: 0;
}

.header-actions {
    display: flex;
    gap: 1rem;
}

/* ====== BUTTONS ====== */
.btn-modern {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-primary-modern {
    background: var(--secondary-gradient);
    color: white;
    box-shadow: 0 10px 30px rgba(241, 147, 251, 0.3);
}

.btn-secondary-modern {
    background: var(--glass-bg);
    color: white;
    border: 1px solid var(--glass-border);
    backdrop-filter: blur(10px);
}

.btn-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    color: white;
    text-decoration: none;
}

.contact-btn {
    background: var(--secondary-gradient);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    width: 100%;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-decoration: none;
}

.contact-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 40px rgba(241, 147, 251, 0.4);
    color: white;
}

.action-buttons {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-top: 1rem;
}

/* ====== SEARCH BAR ====== */
.search-container {
    max-width: 600px;
    margin: 0 auto 3rem;
    position: relative;
    animation: fadeInUp 1s ease-out 0.6s both;
}

.search-bar {
    width: 100%;
    padding: 1.5rem 2rem;
    border: none;
    border-radius: 50px;
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    border: 1px solid var(--glass-border);
    color: white;
    font-size: 1.1rem;
    outline: none;
    transition: all 0.3s ease;
}

.search-bar::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.search-bar:focus {
    box-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
    transform: scale(1.02);
}

/* ====== CONTENT GRID ====== */
.content-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    margin-bottom: 3rem;
}

/* ====== IMAGE GALLERY ====== */
.image-gallery {
    position: relative;
}

.main-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 15px;
    margin-bottom: 1rem;
    transition: transform 0.3s ease;
}

.main-image:hover {
    transform: scale(1.02);
}

.image-placeholder {
    width: 100%;
    height: 400px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    border: 1px dashed rgba(255, 255, 255, 0.3);
}

.image-placeholder-content {
    text-align: center;
    color: rgba(255, 255, 255, 0.6);
}

.image-placeholder-content i {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.thumbnail-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0.5rem;
}

.thumbnail {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.thumbnail:hover {
    border-color: var(--glass-border);
    transform: scale(1.05);
}

.thumbnail-placeholder {
    width: 100%;
    height: 80px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px dashed rgba(255, 255, 255, 0.2);
}

.thumbnail-placeholder i {
    color: rgba(255, 255, 255, 0.4);
    font-size: 1.5rem;
}

/* ====== SECTION TITLES ====== */
.section-title {
    font-size: 2rem;
    font-weight: 700;
    color: white;
    margin-bottom: 2rem;
    text-align: center;
}

/* ====== CATEGORY SECTION ====== */
.category-section {
    padding: 5rem 0;
    position: relative;
}

.category-section .section-title {
    font-size: 3rem;
    margin-bottom: 3rem;
    animation: fadeInUp 1s ease-out;
}

.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 5rem;
}

.category-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid var(--glass-border);
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--accent-gradient);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.category-card:hover::before {
    opacity: 0.1;
}

.category-card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: var(--shadow-heavy);
}

.category-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #4facfe;
    transition: all 0.3s ease;
}

.category-card:hover .category-icon {
    transform: scale(1.2) rotate(10deg);
}

.category-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: white;
    margin-bottom: 1rem;
    z-index: 2;
    position: relative;
}

.category-count {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    z-index: 2;
    position: relative;
}

/* ====== AD DETAILS ====== */
.ad-details {
    padding: 2rem;
}

.ad-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2rem;
}

.ad-badges {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge-success {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    color: white;
}

.badge-warning {
    background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
    color: white;
}

.badge-info {
    background: var(--accent-gradient);
    color: white;
}

.ad-title {
    font-size: 2rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
}

.ad-price {
    font-size: 2.5rem;
    font-weight: 800;
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 2rem;
}

.ad-description {
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
    margin-bottom: 2rem;
    font-size: 1.1rem;
}

.details-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 2rem;
}

.details-table tr {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.details-table td {
    padding: 1rem 0;
    vertical-align: top;
}

.details-table td:first-child {
    font-weight: 600;
    color: rgba(255, 255, 255, 0.8);
    width: 40%;
}

.details-table td:last-child {
    color: white;
}

.details-table a {
    color: #4facfe;
    text-decoration: none;
    transition: color 0.3s ease;
}

.details-table a:hover {
    color: #00f2fe;
}

.contact-section {
    margin-top: 2rem;
}

/* ====== SPONSORED ADS SECTION ====== */
.sponsored-section {
    padding: 5rem 0;
    position: relative;
}

.ad-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.ad-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid var(--glass-border);
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.ad-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--primary-gradient);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.ad-card:hover::before {
    opacity: 0.1;
}

.ad-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-heavy);
}

.ad-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.ad-card:hover .ad-image {
    transform: scale(1.1);
}

.ad-content {
    padding: 2rem;
    position: relative;
    z-index: 2;
}

.ad-content .ad-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: white;
    margin-bottom: 0.5rem;
}

.ad-content .ad-price {
    font-size: 1.5rem;
    font-weight: 700;
    color: #4facfe;
    margin-bottom: 1rem;
}

.ad-location {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
}

/* ====== RELATED ADS SECTION ====== */
.related-section {
    margin-top: 3rem;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.related-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    border: 1px solid var(--glass-border);
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.related-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-heavy);
}

.related-image {
    width: 100%;
    height: 150px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.related-card:hover .related-image {
    transform: scale(1.1);
}

.related-image-placeholder {
    width: 100%;
    height: 150px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.related-content {
    padding: 1.5rem;
}

.related-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: white;
    margin-bottom: 0.5rem;
}

.related-price {
    font-size: 1.3rem;
    font-weight: 700;
    color: #4facfe;
    margin-bottom: 1rem;
}

.related-btn {
    background: var(--glass-bg);
    color: white;
    border: 1px solid var(--glass-border);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.related-btn:hover {
    background: var(--accent-gradient);
    transform: translateY(-2px);
    color: white;
}

/* ====== MODAL STYLES ====== */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
}

.modal.active {
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid var(--glass-border);
    max-width: 90%;
    max-height: 90%;
    position: relative;
    overflow: hidden;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.modal-title {
    color: white;
    font-weight: 600;
    margin: 0;
}

.modal-close {
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    transition: color 0.3s ease;
}

.modal-close:hover {
    color: #4facfe;
}

.modal-body {
    padding: 2rem;
    text-align: center;
}

.modal-image {
    max-width: 100%;
    max-height: 70vh;
    border-radius: 10px;
}

/* ====== ANIMATIONS ====== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease;
}

.animate-on-scroll.animated {
    opacity: 1;
    transform: translateY(0);
}

/* ====== FLOATING ELEMENTS ====== */
.floating-element {
    position: absolute;
    opacity: 0.1;
    animation: float 6s ease-in-out infinite;
}

.floating-element:nth-child(1) { animation-delay: 0s; }
.floating-element:nth-child(2) { animation-delay: 2s; }
.floating-element:nth-child(3) { animation-delay: 4s; }

/* ====== RESPONSIVE DESIGN ====== */
@media (max-width: 768px) {
    .hero-cta {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-modern {
        width: 100%;
        max-width: 300px;
    }
    
    .content-grid {
        grid-template-columns: 1fr;
    }

    .header-section {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }

    .header-actions {
        flex-wrap: wrap;
        justify-content: center;
    }

    .btn-modern {
        flex: 1;
        min-width: 120px;
    }

    .page-title {
        font-size: 2rem;
    }

    .ad-title {
        font-size: 1.5rem;
    }

    .ad-price {
        font-size: 2rem;
    }
    
    .category-grid {
        grid-template-columns: 1fr;
    }
    
    .ad-grid {
        grid-template-columns: 1fr;
    }

    .related-grid {
        grid-template-columns: 1fr;
    }

    .action-buttons {
        grid-template-columns: 1fr;
    }
}
</style>