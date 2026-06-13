//
// SpaceINT JavaScript
//

// ===== DOM Ready =====
document.addEventListener('DOMContentLoaded', function() {
    console.log('SpaceINT - Website loaded');
    
    initMobileMenu();
    initSmoothScroll();
    initLazyLoading();
    initStickyHeader();
});

// ===== Mobile Menu Toggle =====
function initMobileMenu() {
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileBtn.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    }
}

// ===== Smooth Scroll =====
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// ===== Lazy Loading Images =====
function initLazyLoading() {
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.dataset.src;
                    if (src) {
                        img.src = src;
                        img.classList.add('loaded');
                    }
                    observer.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
}

// ===== Sticky Header =====
function initStickyHeader() {
    const header = document.querySelector('nav');
    if (header) {
        let lastScroll = 0;
        
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > lastScroll && currentScroll > 100) {
                header.style.transform = 'translateY(-100%)';
            } else {
                header.style.transform = 'translateY(0)';
            }
            
            lastScroll = currentScroll;
        });
    }
}

// ===== Toast Notification =====
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type} animate-fade-in-up`;
    toast.innerHTML = `
        <div class="flex items-center gap-2">
            <i class="ti ti-${type === 'success' ? 'circle-check' : 'alert-circle'} text-lg"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.animation = 'fade-in-up 0.3s ease-out reverse';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// ===== Loading Spinner =====
function showLoading(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        const spinner = document.createElement('div');
        spinner.className = 'spinner';
        spinner.style.margin = '40px auto';
        container.innerHTML = '';
        container.appendChild(spinner);
    }
}

function hideLoading(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        const spinner = container.querySelector('.spinner');
        if (spinner) spinner.remove();
    }
}

// ===== Form Validation =====
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return true;
    
    let isValid = true;
    const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('border-red-500');
            
            // Show error message
            let errorMsg = input.nextElementSibling;
            if (!errorMsg || !errorMsg.classList.contains('error-message')) {
                errorMsg = document.createElement('p');
                errorMsg.className = 'error-message text-red-500 text-xs mt-1';
                input.parentNode.insertBefore(errorMsg, input.nextSibling);
            }
            errorMsg.textContent = 'Field ini harus diisi';
        } else {
            input.classList.remove('border-red-500');
            const errorMsg = input.nextElementSibling;
            if (errorMsg && errorMsg.classList.contains('error-message')) {
                errorMsg.remove();
            }
        }
    });
    
    return isValid;
}

// ===== Copy to Clipboard =====
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        showToast('Berhasil disalin!', 'success');
    }).catch(() => {
        showToast('Gagal menyalin', 'error');
    });
}

// ===== Filter Portfolio =====
function filterPortfolio(category) {
    const items = document.querySelectorAll('.portfolio-item');
    
    items.forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'block';
            item.style.animation = 'scale-up 0.3s ease-out';
        } else {
            item.style.display = 'none';
        }
    });
    
    // Update active filter button
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('bg-black', 'text-white');
        btn.classList.add('bg-gray-100', 'text-gray-700');
    });
    
    const activeBtn = document.querySelector(`.filter-btn[data-filter="${category}"]`);
    if (activeBtn) {
        activeBtn.classList.remove('bg-gray-100', 'text-gray-700');
        activeBtn.classList.add('bg-black', 'text-white');
    }
}

// ===== Back to Top =====
function initBackToTop() {
    const backBtn = document.getElementById('backToTop');
    if (!backBtn) return;
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backBtn.classList.remove('hidden');
        } else {
            backBtn.classList.add('hidden');
        }
    });
    
    backBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// ===== Counter Animation =====
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 20);
}

function initCounters() {
    const counters = document.querySelectorAll('.counter');
    
    if ('IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.dataset.target);
                    animateCounter(counter, target);
                    counterObserver.unobserve(counter);
                }
            });
        });
        
        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    }
}

// ===== Expose functions globally =====
window.showToast = showToast;
window.showLoading = showLoading;
window.hideLoading = hideLoading;
window.validateForm = validateForm;
window.copyToClipboard = copyToClipboard;
window.filterPortfolio = filterPortfolio;
window.showLoading = showLoading;
window.hideLoading = hideLoading;