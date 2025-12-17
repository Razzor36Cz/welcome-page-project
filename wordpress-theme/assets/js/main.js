/**
 * Jaganos AI Theme - Main JavaScript
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

(function() {
    'use strict';

    /**
     * DOM Ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initSmoothScroll();
        initHeaderScroll();
        initLanguageSwitcher();
        initAnimations();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        const navigation = document.querySelector('.main-navigation');
        
        if (!menuToggle || !navigation) return;

        menuToggle.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            navigation.classList.toggle('is-open');
            document.body.classList.toggle('menu-open');
        });

        // Close menu on link click
        navigation.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                menuToggle.setAttribute('aria-expanded', 'false');
                navigation.classList.remove('is-open');
                document.body.classList.remove('menu-open');
            });
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                
                if (target) {
                    e.preventDefault();
                    
                    const headerHeight = document.querySelector('.site-header').offsetHeight;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Header Background on Scroll
     */
    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        
        if (!header) return;

        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }

            // Hide/show header on scroll direction
            if (currentScroll > lastScroll && currentScroll > 200) {
                header.classList.add('is-hidden');
            } else {
                header.classList.remove('is-hidden');
            }
            
            lastScroll = currentScroll;
        });
    }

    /**
     * Language Switcher (Custom Implementation)
     */
    function initLanguageSwitcher() {
        const langButtons = document.querySelectorAll('.language-switcher .lang-btn');
        
        if (!langButtons.length) return;

        langButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const lang = this.dataset.lang;
                
                // Remove active class from all buttons
                langButtons.forEach(function(b) {
                    b.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Store language preference
                localStorage.setItem('jaganos_language', lang);
                
                // Trigger custom event for language change
                document.dispatchEvent(new CustomEvent('languageChange', {
                    detail: { language: lang }
                }));
                
                // For server-side implementation, you might redirect:
                // window.location.href = '?lang=' + lang;
            });
        });

        // Set initial active state from localStorage
        const savedLang = localStorage.getItem('jaganos_language') || 'en';
        const activeBtn = document.querySelector('.lang-btn[data-lang="' + savedLang + '"]');
        if (activeBtn) {
            activeBtn.classList.add('active');
        }
    }

    /**
     * Scroll Animations
     */
    function initAnimations() {
        const animatedElements = document.querySelectorAll('.fade-in-up, .fade-in, .scale-in');
        
        if (!animatedElements.length) return;

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.forEach(function(el) {
            observer.observe(el);
        });
    }

})();
