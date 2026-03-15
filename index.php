<!DOCTYPE html>
<html lang="gu" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTC NEWS - આધુનિક સમાચાર વેબસાઇટ</title>
    <link rel="icon" href="logo/logo1.png" type="image/jpeg">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts (Inter for English, Noto Sans Gujarati for Gujarati) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&family=Noto+Sans+Gujarati:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        // Custom Tailwind configuration
        tailwind.config = {
            darkMode: 'class', // Enable dark mode using a class
            theme: {
                extend: {
                    colors: {
                        'brand-yellow': '#FFDE59', // Your new brand color!
                    },
                    fontFamily: {
                        sans: ['"Noto Sans Gujarati"', 'Inter', 'sans-serif'],
                    },
                    keyframes: {
                        flipIn: {
                            '0%': { transform: 'rotateY(90deg)', opacity: '0' },
                            '100%': { transform: 'rotateY(0deg)', opacity: '1' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(-10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeOut: {
                            '0%': { opacity: '1' },
                            '100%': { opacity: '0' },
                        },
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.95)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
                        },
                        marquee: {
                            '0%': { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(-50%)' },
                        }
                    },
                    animation: {
                        'flip-in': 'flipIn 0.6s ease-out forwards',
                        'fade-in': 'fadeIn 0.3s ease-out forwards',
                        'fade-out': 'fadeOut 0.5s ease-in-out forwards',
                        'scale-in': 'scaleIn 0.3s ease-out forwards',
                        'marquee': 'marquee 20s linear infinite',
                    }
                }
            }
        }
    </script>

    <style>
        /* Simple prose styles for article content */
        .prose p { margin-bottom: 1rem; }
        .prose h1, .prose h2, .prose h3 { margin-bottom: 1.5rem; font-weight: 700; }
        .dark .dark\:prose-invert { color: #d1d5db; }
        .prose ul { list-style-type: disc; margin-left: 1.5rem; margin-bottom: 1rem; }
        
        /* Animation style for beeps cards */
        .beep-card {
            transform-style: preserve-3d;
            animation: flip-in 0.6s ease-out forwards;
            opacity: 0; /* Start as invisible */
        }

        /* Mega Menu & More Menu Styles */
        .mega-menu, .more-menu {
            display: none;
            /* overflow: hidden; This is not needed and can clip content */
        }
        .is-more-menu {
            position: relative;
        }
        .mega-menu.menu-visible, .more-menu.menu-visible {
            display: block;
            animation: fade-in 0.3s ease-out forwards;
        }


        /* Slide-out Panel Styles */
        #side-panel {
            transition: transform 0.3s ease-in-out;
        }
        #side-panel.open {
            transform: translateX(0);
        }
        
        #copy-notification {
            transition: opacity 0.5s ease-in-out;
        }
        
        #page-wrapper {
            transition: transform 0.3s ease-in-out;
        }
        #page-wrapper.panel-open {
            transform: translateX(320px); /* 320px = w-80 */
        }

        /* Beeps Page Styles */
        .beeps-container {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch; /* for smooth scrolling on iOS */
            scrollbar-width: none; /* for Firefox */
        }
        .beeps-container::-webkit-scrollbar {
            display: none; /* for Chrome, Safari, and Opera */
        }
        .beeps-card-full {
            flex: 0 0 100%;
            scroll-snap-align: center;
        }

        /* Google Translate Widget Styles */
        #google_translate_element {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            overflow: hidden;
        }
        .goog-te-gadget-simple {
            background-color: transparent !important;
            border: none !important;
            width: 100% !important;
            height: 100% !important;
            display: block !important;
        }
        .goog-te-gadget-simple .goog-te-menu-value * {
            display: none !important;
        }
        .goog-te-gadget-icon {
            display: none !important;
        }
        
        /* --- PROPER FLICKER-FREE HEADER SCROLL --- */
        #top-bar, #main-nav {
            transition: max-height 0.4s ease-out, opacity 0.3s ease-out, padding 0.4s ease-out;
            /* overflow-y: hidden; <- REMOVED from default state to allow dropdowns */
        }

        header.scrolled, header.article-scrolled {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -2px rgba(0,0,0,0.1);
        }
        .dark header.scrolled, .dark header.article-scrolled {
            background-color: rgba(17, 24, 39, 0.8);
        }

        header.article-scrolled #scroll-header {
            background-color: #FFDE59; /* brand-yellow */
        }
        
        header.scrolled #main-nav, header.article-scrolled #main-nav,
        header.scrolled #top-bar, header.article-scrolled #top-bar {
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
            opacity: 0;
            border-bottom-width: 0;
            overflow-y: hidden; /* ADDED here to apply only when collapsing */
        }

        #scroll-header {
           opacity: 0;
           max-height: 0;
           overflow: hidden;
           transition: opacity 0.4s ease-out, max-height 0.4s ease-out;
        }

        header.scrolled #scroll-header, header.article-scrolled #scroll-header {
           opacity: 1;
           max-height: 54px; /* Adjust if header height changes */
        }
        /* --- END OF FLICKER-FREE HEADER --- */


        /* Share Menu Styles */
        .share-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 8px;
            animation: scaleIn 0.2s ease-out forwards;
            transform-origin: top right;
            z-index: 50;
        }
        .share-container.active .share-menu {
            display: block;
        }
        
        .footer-bg {
            background-color: #111827; /* dark:bg-gray-900 */
        }
        .dark .footer-bg {
             background-color: #000;
        }


        /* News Flash Marquee */
        .marquee-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }
        .marquee-content {
            display: flex;
        }
        .marquee-text {
            white-space: nowrap;
            flex-shrink: 0;
            padding-right: 4rem; /* Creates a visual gap between loops */
        }

        /* Custom scrollbar for sidebars */
        #sidebar-feed-content::-webkit-scrollbar,
        #live-feed-content::-webkit-scrollbar,
        #left-sidebar-feed-content::-webkit-scrollbar {
            width: 5px;
        }
        #sidebar-feed-content::-webkit-scrollbar-track,
        #live-feed-content::-webkit-scrollbar-track,
        #left-sidebar-feed-content::-webkit-scrollbar-track {
            background: transparent;
        }
        #sidebar-feed-content::-webkit-scrollbar-thumb,
        #live-feed-content::-webkit-scrollbar-thumb,
        #left-sidebar-feed-content::-webkit-scrollbar-thumb {
            background-color: #FFDE59; /* brand-yellow */
            border-radius: 20px;
        }

        /* Live Feed Panel Styles */
        #live-feed-panel.open {
            transform: translateX(0);
        }
        
        /* Floating Live TV Player */
        #live-tv-player-container {
            position: fixed;
            bottom: 80px; /* Above the live feed button */
            right: 20px;
            width: 320px;
            height: 180px;
            z-index: 100;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            transition: transform 0.3s ease-in-out;
            transform: translateX(calc(100% + 40px)); /* Initially hidden */
        }
        #live-tv-player-container.visible {
            transform: translateX(0);
        }
        #live-tv-player {
            width: 100%;
            height: 100%;
        }
        #live-tv-controls {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0,0,0,0.5);
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.2s;
        }
         #live-tv-player-container:hover #live-tv-controls {
            opacity: 1;
        }
        #live-tv-controls.playing {
            opacity: 0;
        }
        #live-tv-close {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(0,0,0,0.7);
            color: white;
            border-radius: 9999px;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-950 font-sans text-gray-800 dark:text-gray-200 transition-colors duration-500 overflow-x-hidden">

    <!-- App Container -->
    <div id="app-root" class="flex flex-col min-h-screen">
        <div id="page-wrapper" class="flex-grow flex flex-col">
            <!-- Header Section -->
            <header class="bg-white dark:bg-gray-900 sticky top-0 z-40 transition-all duration-300">
                <div id="top-bar" class="bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-xs">
                     <div class="container mx-auto px-4 flex justify-between items-center h-8">
                        <div class="flex items-center space-x-4 font-bold">
                            <a href="#" class="hover:text-brand-yellow">UTC NEWS</a>
                            <a href="#" class="hover:text-brand-yellow">લાભ</a>
                            <a href="#" class="hover:text-brand-yellow">ફિલ્મો</a>
                            <a href="#" class="hover:text-brand-yellow">ક્રિકેટ</a>
                            <a href="#" class="hover:text-brand-yellow">ટેક</a>
                            <a href="#" class="hover:text-brand-yellow">શોપિંગ</a>
                        </div>
                        <div id="weather-widget" class="flex items-center space-x-2">
                           <span>હવામાન લોડ થઈ રહ્યું છે...</span>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center py-4 border-b-2 border-brand-yellow">
                        <a href="#" onclick="navigateToCategory('Home')">
                            <!-- Make sure you have this logo file in a 'logo' folder -->
                            <img src="logo/logo1.png" alt="UTC NEWS Logo" class="h-24 w-auto" onerror="this.alt='UTC NEWS'; this.src='https://placehold.co/200x80/eee/ccc?text=Logo';">
                        </a>
                        <div class="hidden md:flex items-center space-x-2">
                            <div class="relative">
                                <button class="flex items-center gap-2 border rounded-full py-2 px-4 dark:bg-gray-800 dark:text-white dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                    <i data-lucide="languages" class="w-5 h-5 text-gray-500"></i>
                                    <span class="text-sm font-semibold">ભાષા</span>
                                </button>
                                <div id="google_translate_element"></div>
                            </div>
                            <div class="relative">
                                <input type="text" id="desktop-search" placeholder="શોધો..." class="border rounded-full py-2 px-4 w-56 dark:bg-gray-800 dark:text-white dark:border-gray-700" oninput="handleSearchInput(event, 'desktop-suggestions')" onkeydown="handleSearchKeydown(event)">
                                <i data-lucide="search" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                <div id="desktop-suggestions" class="absolute top-full mt-2 w-full bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-lg shadow-lg z-50 hidden max-h-60 overflow-y-auto"></div>
                            </div>
                            <button id="darkModeToggler" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i data-lucide="moon" class="moon-icon"></i>
                                <i data-lucide="sun" class="sun-icon hidden"></i>
                            </button>
                        </div>
                        <div class="md:hidden flex items-center">
                             <button id="darkModeTogglerMobile" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i data-lucide="moon" class="moon-icon"></i>
                                <i data-lucide="sun" class="sun-icon hidden"></i>
                            </button>
                            <button id="mobileMenuBtn" class="ml-2">
                                <i data-lucide="menu" class="w-7 h-7"></i>
                            </button>
                        </div>
                    </div>
                    <nav id="main-nav" class="hidden md:flex justify-start items-center py-3 text-sm font-semibold uppercase tracking-wider relative">
                        <!-- Nav items will be injected here by JS -->
                    </nav>
                </div>
                <!-- This div is now outside the container for full-width background -->
                <div id="scroll-header" class="flex justify-center items-center py-3 text-sm font-semibold uppercase tracking-wider relative w-full h-[54px]">
                    <!-- Scrolling headline will be injected here -->
                </div>
                <!-- Mobile Menu -->
                <div id="mobileMenu" class="hidden md:hidden bg-white dark:bg-gray-900">
                    <nav id="mobile-nav-menu" class="flex flex-col items-center py-4 space-y-2">
                         <!-- Mobile nav items will be injected here -->
                    </nav>
                    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="relative">
                            <input type="text" id="mobile-search" placeholder="શોધો..." class="border rounded-full py-2 px-4 w-full dark:bg-gray-800 dark:text-white dark:border-gray-700" oninput="handleSearchInput(event, 'mobile-suggestions')" onkeydown="handleSearchKeydown(event)">
                            <i data-lucide="search" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                            <div id="mobile-suggestions" class="absolute top-full mt-2 w-full bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-lg shadow-lg z-50 hidden max-h-60 overflow-y-auto"></div>
                        </div>
                    </div>
                </div>
            </header>
            
             <!-- News Flash Section -->
            <div id="news-flash-container" class="hidden" style="position: relative; z-index: 20;">
                <!-- News flash will be injected here -->
            </div>

            <!-- Main Content -->
            <main id="main-content" class="container mx-auto px-4 py-8 flex-grow">
                <!-- Loading indicator -->
                 <div id="loading-indicator" class="flex justify-center items-center h-64">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-brand-yellow"></div>
                </div>
            </main>

            <!-- Footer -->
            <footer id="main-footer" class="bg-gray-800 dark:bg-black text-white pt-12 pb-8 mt-auto">
                 <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-8">
                        <!-- Brand & Social -->
                        <div class="lg:col-span-1">
                            <h2 class="text-3xl font-extrabold text-brand-yellow mb-4">UTC NEWS</h2>
                            <p class="text-gray-400 text-sm mb-6 max-w-xs">તાજા સમાચારો માટે તમારો દૈનિક સ્ત્રોત, બ્રેકિંગ હેડલાઇન્સથી લઈને ઊંડાણપૂર્વક વિશ્લેષણ સુધી.</p>
                            <div class="flex space-x-4">
                                 <a href="https://www.facebook.com/utcnewsgujarati/" target="_blank" class="bg-gray-700 hover:bg-brand-yellow p-3 rounded-full transition-colors"><i data-lucide="facebook"></i></a>
                           <!--      <a href="https://twitter.com" target="_blank" class="bg-gray-700 hover:bg-brand-yellow p-3 rounded-full transition-colors"><i data-lucide="twitter"></i></a>-->
                                 <a href="https://www.instagram.com/utcnewsgujarati/" target="_blank" class="bg-gray-700 hover:bg-brand-yellow p-3 rounded-full transition-colors"><i data-lucide="instagram"></i></a>
                                 <a href="https://www.youtube.com/@utcnewsgujarati" target="_blank" class="bg-gray-700 hover:bg-brand-yellow p-3 rounded-full transition-colors"><i data-lucide="youtube"></i></a>
                             </div>
                        </div>
                        
                        <!-- Top Categories -->
                        <div>
                            <h3 class="font-bold uppercase tracking-wider text-white text-md mb-4 border-b-2 border-brand-yellow pb-2 inline-block">ટોચની શ્રેણીઓ</h3>
                            <ul id="footer-categories" class="space-y-3 text-sm"></ul>
                        </div>
                        
                        <!-- Quick Links -->
                         <div>
                            <h3 class="font-bold uppercase tracking-wider text-white text-md mb-4 border-b-2 border-brand-yellow pb-2 inline-block">ઝડપી લિંક્સ</h3>
                            <ul class="space-y-3 text-sm">
                             <!--   <li><a href="#" class="text-gray-400 hover:text-white transition-colors">અમારા વિશે</a></li>-->
                                <li><a href="privacy.html" class="text-gray-400 hover:text-white transition-colors">ગોપનીયતા નીતિ</a></li>
                                <li><a href="terms.html" class="text-gray-400 hover:text-white transition-colors">સેવાની શરતો</a></li>
                                <!-- <li><a href="#" class="text-gray-400 hover:text-white transition-colors">અમારો સંપર્ક કરો</a></li>-->
                                 <li><a href="/admin/" class="text-gray-400 hover:text-white transition-colors">એડમિન લોગિન</a></li>
                            </ul>
                        </div>

                         <!-- Contact -->
                        <div>
                            <h3 class="font-bold uppercase tracking-wider text-white text-md mb-4 border-b-2 border-brand-yellow pb-2 inline-block">અમારો સંપર્ક કરો</h3>
                            <ul class="space-y-3 text-sm text-gray-400">
                                <li class="flex items-center gap-3"><i data-lucide="map-pin" class="w-4 h-4 text-brand-yellow"></i><span>425, વિહાવ ટ્રેડ સેન્ટર, રાઈટ વેલ્યુ પ્રોપર્ટી, 30 મીટર, વાસણા ભાયલી કેનાલ રોડ, વેવ્ઝ ક્લબ પાસે, રિંગ રોડ, ભાયલી, વડોદરા, ગુજરાત 391410</span></li>
                                <li class="flex items-center gap-3"><i data-lucide="phone" class="w-4 h-4 text-brand-yellow"></i><span>+91 9825030154</span></li>
                                <li class="flex items-center gap-3"><i data-lucide="mail" class="w-4 h-4 text-brand-yellow"></i><span>vadodara@universaltruthcompany.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-t border-gray-700 pt-6 mt-8 text-center text-sm text-gray-500">
                        <p>&copy; <span id="year"></span> UTC NEWS કન્વર્જન્સ લિમિટેડ. સર્વાધિકાર સુરક્ષિત. | આ વેબસાઇટ DNPA આચાર સંહિતાનું પાલન કરે છે</p>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Side Panel -->
        <div id="side-panel" class="fixed top-0 left-0 w-80 h-full bg-gray-100 dark:bg-gray-900 z-[60] transform -translate-x-full overflow-y-auto">
            <div class="p-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-extrabold text-brand-yellow">UTC NEWS</h2>
                    <button id="close-side-panel"><i data-lucide="x" class="w-6 h-6"></i></button>
                </div>

                <div class="relative mb-6">
                    <input type="text" placeholder="સમાચાર, ફોટા અને વીડિયો શોધો" class="w-full border-2 border-gray-300 dark:border-gray-700 bg-transparent rounded-md py-2 px-4 pr-10">
                    <i data-lucide="search" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                </div>

                <div class="mb-6">
                    <h3 class="font-bold text-sm uppercase text-gray-500 dark:text-gray-400 mb-3">સમાચાર અપડેટ્સ</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <a href="#" onclick="navigateFromPanel('LiveTV')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="tv" class="w-4 h-4"></i> લાઇવ ટીવી</a>
                        <a href="#" onclick="navigateFromPanel('India')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="globe" class="w-4 h-4"></i> ભારત</a>
                        <a href="#" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="zap" class="w-4 h-4"></i> સ્પોટલાઇટ</a>
                        <a href="#" onclick="navigateFromPanel('Beeps')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="rss" class="w-4 h-4"></i> બીપ્સ</a>
                        <a href="#" onclick="navigateFromPanel('Latest')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="clock" class="w-4 h-4"></i> નવીનતમ</a>
                        <a href="#" onclick="navigateFromPanel('Videos')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="video" class="w-4 h-4"></i> વીડિયો</a>
                        <a href="#" onclick="navigateFromPanel('Podcast')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="mic" class="w-4 h-4"></i> પોડકાસ્ટ</a>
                        <a href="#" onclick="navigateFromPanel('Business')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="trending-up" class="w-4 h-4"></i> લાભ</a>
                        <a href="#" onclick="navigateFromPanel('Entertainment')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="film" class="w-4 h-4"></i> ફિલ્મો</a>
                        <a href="#" onclick="navigateFromPanel('Sports:Cricket')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="swords" class="w-4 h-4"></i> ક્રિકેટ</a>
                        <a href="#" onclick="navigateFromPanel('Cities')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="building-2" class="w-4 h-4"></i> શહેરો</a>
                    </div>
                </div>

                 <div class="mb-6">
                    <h3 class="font-bold text-sm uppercase text-gray-500 dark:text-gray-400 mb-3">વધુ લિંક્સ</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <a href="#" onclick="navigateFromPanel('Science')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="atom" class="w-4 h-4"></i> વિજ્ઞાન</a>
                        <a href="#" onclick="navigateFromPanel('Education')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="graduation-cap" class="w-4 h-4"></i> શિક્ષણ</a>
                        <a href="#" onclick="navigateFromPanel('Lifestyle')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="utensils" class="w-4 h-4"></i> ભોજન</a>
                        <a href="#" onclick="navigateFromPanel('Health')" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="heart-pulse" class="w-4 h-4"></i> સ્વાસ્થ્ય</a>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold text-sm uppercase text-gray-500 dark:text-gray-400 mb-3">અમને અનુસરો</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <a href="#" class="flex items-center gap-2 hover:text-blue-600"><i data-lucide="facebook" class="w-4 h-4"></i> Facebook</a>
                        <a href="#" class="flex items-center gap-2 hover:text-sky-500"><i data-lucide="twitter" class="w-4 h-4"></i> Twitter</a>
                        <a href="#" class="flex items-center gap-2 hover:text-pink-500"><i data-lucide="instagram" class="w-4 h-4"></i> Instagram</a>
                        <a href="#" class="flex items-center gap-2 hover:text-blue-700"><i data-lucide="linkedin" class="w-4 h-4"></i> Linkedin</a>
                        <a href="#" class="flex items-center gap-2 hover:text-brand-yellow"><i data-lucide="youtube" class="w-4 h-4"></i> YouTube</a>
                        <a href="#" class="flex items-center gap-2 hover:text-orange-500"><i data-lucide="command" class="w-4 h-4"></i> Reddit</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copy Link Notification -->
        <div id="copy-notification" class="fixed bottom-5 right-5 bg-gray-900 text-white py-2 px-4 rounded-lg shadow-lg hidden opacity-0">
            લિંક કૉપિ થઈ ગઈ!
        </div>
    </div>

    <!-- Live Feed Floating Button -->
    <button id="live-feed-button" class="fixed bottom-5 right-5 bg-brand-yellow text-white w-16 h-16 rounded-full shadow-lg flex items-center justify-center z-50 transform hover:scale-110 transition-transform">
        <div class="relative">
            <i data-lucide="rss" class="w-8 h-8"></i>
            <span class="absolute top-0 right-0 block h-3 w-3 rounded-full bg-white ring-2 ring-brand-yellow animate-ping"></span>
            <span class="absolute top-0 right-0 block h-3 w-3 rounded-full bg-white ring-2 ring-brand-yellow"></span>
        </div>
    </button>

    <!-- Live TV Player -->
    <div id="live-tv-player-container">
        <div id="live-tv-player"></div>
        <div id="live-tv-controls">
             <button id="live-tv-unmute-btn" class="bg-white/30 backdrop-blur-sm text-white rounded-full p-4">
                <i data-lucide="volume-x" class="w-8 h-8"></i>
            </button>
        </div>
        <div id="live-tv-close">
             <i data-lucide="x" class="w-4 h-4"></i>
        </div>
    </div>


    <!-- Live Feed Panel -->
    <div id="live-feed-panel" class="fixed top-0 right-0 w-full sm:w-96 h-full bg-white dark:bg-gray-900 z-[70] transform translate-x-full shadow-2xl transition-transform duration-300 ease-in-out">
        <div class="flex flex-col h-full">
            <div class="flex justify-between items-center p-4 border-b dark:border-gray-700 flex-shrink-0">
                <h2 class="text-xl font-bold flex items-center gap-2"><i data-lucide="rss" class="text-brand-yellow"></i> લાઇવ સોશિયલ ફીડ</h2>
                <button id="close-live-feed-panel"><i data-lucide="x" class="w-6 h-6"></i></button>
            </div>
            <div id="live-feed-content" class="flex-grow p-4 overflow-y-auto space-y-4">
                <!-- Social posts will be injected here by JavaScript -->
            </div>
             <div class="p-4 border-t dark:border-gray-700 text-center text-xs text-gray-500 flex-shrink-0">
                ફેસબુક, ટ્વિટર, ઇન્સ્ટાગ્રામ અને યુટ્યુબથી ફીડ્સ.
            </div>
        </div>
    </div>
    
    <!-- Google Translate Script -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'gu',
                includedLanguages: 'as,bn,gu,hi,kn,ml,mr,pa,ta,te,ur,or,en,bho,sat,ks,kok,sd,doi,mai,mni', 
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- YouTube IFrame API -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <!-- JavaScript Logic -->
    <script>
        // --- DATA (will be fetched from API) ---
        let allNewsData = [];
        let mockSocialFeedData = [];
        let mockNewsFlashes = [];
        let advertisements = {};
        let liveTvVideoId = '';

        const getImageUrl = (imagePath, width, height) => {
            if (!imagePath) {
                return `https://placehold.co/${width}x${height}/eee/ccc?text=No+Image`;
            }
            if (imagePath.startsWith('http')) {
                return imagePath; // It's already a full URL
            }
            // It's a local path, just return it (assuming the base path is correct)
            return imagePath;
        };

        const formatTimeAgo = (timestamp) => {
            if (!timestamp) return '';
            const date = new Date(timestamp);
            const now = new Date();
            const seconds = Math.round((now - date) / 1000);
            const minutes = Math.round(seconds / 60);
            const hours = Math.round(minutes / 60);
            const days = Math.round(hours / 24);

            if (isNaN(date.getTime())) {
                return timestamp; // Return original if invalid date
            }

            if (seconds < 60) {
                return `હમણાં જ`;
            } else if (minutes < 60) {
                return `${minutes} મિનિટ પહેલા`;
            } else if (hours < 24) {
                return `${hours} કલાક પહેલા`;
            } else if (days === 1) {
                return `ગઈકાલે`;
            } else if (days < 7) {
                return `${days} દિવસ પહેલા`;
            } else {
                return date.toLocaleDateString('gu-IN', { day: 'numeric', month: 'long' });
            }
        };
        
        // --- CONFIGURATION ---
        const navConfig = [
            { name: "લાઇવ ટીવી", eng: "LiveTV", subCategories: ["યુટીસી ન્યૂઝ લાઇવ", "પ્રોફિટ ટીવી", "મૂવીઝ ટીવી", "વડોદરા લાઇવ"] },
            { name: "નવીનતમ", eng: "Latest", subCategories: [] },
            { name: "ભારત", eng: "India", subCategories: ["અખિલ ભારતીય સમાચાર", "વૈશ્વિક", "પ્રવાસી", "દક્ષિણ"] },
            { name: "વિશ્વ", eng: "World", subCategories: [] },
            { name: "રમતગમત", eng: "Sports", subCategories: ["ક્રિકેટ", "ફૂટબોલ"] },
            { name: "અભિપ્રાય", eng: "Opinion", subCategories: [] },
            { name: "શહેરો", eng: "Cities", subCategories: ["અમદાવાદ", "સુરત", "વડોદરા", "રાજકોટ", "ભાવનગર", "જામનગર"] },
            { name: "બીપ્સ", eng: "Beeps", subCategories: [] },
            { name: "શિક્ષણ", eng: "Education", subCategories: [] },
            { name: "વધુ", eng: "More", subCategories: ["વીડિયો", "ઓટો", "મનોરંજન", "લાઇફસ્ટાઇલ", "પોડકાસ્ટ", "હવામાન", "ઓફબીટ", "વિજ્ઞાન", "સ્વાસ્થ્ય", "તસવીરો"] }
        ];

        const liveTvChannels = [
            { name: "યુટીસી ન્યૂઝ લાઇવ", icon: 'award', color: 'text-brand-yellow', link: '#' },
            { name: "UTC 24x7", icon: 'tv-2', color: 'text-green-500', link: '#' },
            { name: "પ્રોફિટ ટીવી", icon: 'trending-up', color: 'text-blue-500', link: '#' },
            { name: "UTC India", icon: 'globe', color: 'text-orange-500', link: '#' },
            { name: "મૂવીઝ ટીવી", icon: 'film', color: 'text-purple-500', link: '#' },
            { name: "વડોદરા લાઇવ", icon: 'map-pin', color: 'text-brand-yellow', link: '#' },
        ];
        
        const liveTvStreams = {
            "યુટીસી ન્યૂઝ લાઇવ": { videoId: "h-4B0Kz-G54", title: "હવે ચાલી રહ્યું છે: સવારનું સમાચાર બુલેટિન" },
            "NDTV 24x7": { videoId: "WB-y7_ymPJ4", title: "હવે ચાલી રહ્યું છે: 24x7 લાઇવ સમાચાર" },
            "પ્રોફિટ ટીવી": { videoId: "cpPSr_7-t9s", title: "હવે ચાલી રહ્યું છે: માર્કેટ વોચ લાઇવ" },
            "NDTV India": { videoId: "c2Q1_mI7p5I", title: "હવે ચાલી રહ્યું છે: ગુડ મોર્નિંગ ઇન્ડિયા" },
            "મૂવીઝ ટીવી": { videoId: "9o4sHXTgCSM", title: "હવે ચાલી રહ્યું છે: ક્લાસિક મૂવી મેરેથોન" },
            "વડોદરા લાઇવ": { videoId: "B5sE4o15aig", title: "હવે ચાલી રહ્યું છે: વડોદરા શહેર અપડેટ" }
        };

        const moreCategoryMapping = {
            "વીડિયો": "Videos",
            "ઓટો": "Auto",
            "મનોરંજન": "Entertainment",
            "લાઇફસ્ટાઇલ": "Lifestyle",
            "પોડકાસ્ટ": "Podcast",
            "હવામાન": "Weather",
            "ઓફબીટ": "Offbeat",
            "વિજ્ઞાન": "Science",
            "સ્વાસ્થ્ય": "Health",
            "તસવીરો": "Pictures"
        };

        // --- STATE MANAGEMENT ---
        let currentArticles = [];
        let articlesToShow = 6;
        let currentCategory = 'Home';
        let currentArticleIdOnDetailView = null;

        // --- DOM ELEMENTS ---
        const mainContent = document.getElementById('main-content');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const yearSpan = document.getElementById('year');
        const mainNav = document.getElementById('main-nav');
        const mobileNavMenu = document.getElementById('mobile-nav-menu');
        const sidePanel = document.getElementById('side-panel');
        const closeSidePanelBtn = document.getElementById('close-side-panel');
        const pageWrapper = document.getElementById('page-wrapper');
        const header = document.querySelector('header');
        const newsFlashContainer = document.getElementById('news-flash-container');
        
        // --- TEMPLATE GENERATORS ---
        
        const createShareButtonHTML = (article, theme = 'light') => {
            const articleUrl = encodeURIComponent(window.location.href.split('?')[0] + `?article=${article.id}`);
            const shareText = encodeURIComponent(article.headline);
            const buttonClasses = theme === 'dark' 
                ? 'bg-white/10 text-white hover:bg-white/20' 
                : 'bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600';

            const copyLinkAction = `copyLinkToClipboard('${window.location.href.split('?')[0] + '?article=' + article.id}')`;

            return `
                <div class="share-container relative">
                    <button onclick="toggleShareMenu(event)" class="flex items-center gap-2 text-sm ${buttonClasses} px-3 py-2 rounded-full transition-colors">
                        <i data-lucide="share-2" class="w-4 h-4"></i>
                        <span>શેર કરો</span>
                    </button>
                    <div class="share-menu bg-white dark:bg-gray-800 rounded-lg shadow-xl border dark:border-gray-700 w-48 overflow-hidden">
                         <a href="https://api.whatsapp.com/send?text=${shareText}%20${articleUrl}" data-action="share/whatsapp/share" target="_blank" class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                           <svg class="w-5 h-5 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.487 5.235 3.487 8.413 0 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.267.655 4.512 1.924 6.341l-1.246 4.562 4.649-1.219zm9.355-9.011c-.195-.339-.67-.557-1.02-.591-.35-.034-.737-.034-1.004.034-.267.068-.438.165-.633.339-.195.173-.787.781-1.004.987-.217.206-.438.238-.633.165-.195-.073-.88-.331-1.676-.995-.633-.524-1.053-1.175-1.19-1.379-.137-.206-.274-.339-.38-.557-.106-.217-.073-.339.034-.438.093-.087.217-.206.338-.303.122-.099.165-.165.237-.274.074-.107.034-.206-.034-.339-.068-.137-.633-1.524-.87-2.079-.237-.556-.474-.474-.633-.474-.159 0-.318-.034-.478-.034s-.438 0-.632.165c-.196.165-.787.747-.984.987-.195.238-.391.475-.391.881s.165.987.339 1.191c.173.206.787.987 1.76 1.943.973.957 1.76 1.299 2.404 1.574.644.276 1.18.238 1.574.165.393-.073 1.164-.475 1.378-.943.216-.468.216-.867.165-1.004-.051-.137-.195-.206-.38-.339z"/></svg> WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=${articleUrl}" target="_blank" class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <i data-lucide="facebook" class="w-5 h-5 text-blue-600"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=${articleUrl}&text=${shareText}" target="_blank" class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <i data-lucide="twitter" class="w-5 h-5 text-sky-500"></i> Twitter
                        </a>
                        <a href="https://www.instagram.com" target="_blank" class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                           <i data-lucide="instagram" class="w-5 h-5 text-pink-500"></i> Instagram
                        </a>
                        <button onclick="${copyLinkAction}" class="w-full flex items-center gap-3 px-4 py-3 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <i data-lucide="link" class="w-5 h-5 text-gray-500"></i> લિંક કૉપિ કરો
                        </button>
                    </div>
                </div>
            `;
        }
        
        const createSocialPostHTML = (post) => {
            const platformDetails = {
                'Twitter': { icon: 'twitter', color: 'text-sky-500' },
                'Facebook': { icon: 'facebook', color: 'text-blue-600' },
                'Instagram': { icon: 'instagram', color: 'text-pink-500' },
                'YouTube': { icon: 'youtube', color: 'text-red-600' }
            };

            const details = platformDetails[post.platform];

            return `
                <a href="${post.url}" target="_blank" class="block bg-gray-50 dark:bg-gray-900/50 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800/50 transition-colors">
                    <div class="flex items-start gap-3">
                        <img src="${getImageUrl(post.avatar, 40, 40)}" alt="${post.user}" class="w-10 h-10 rounded-full flex-shrink-0" onerror="this.onerror=null;this.src='https://placehold.co/40x40/eee/ccc?text=??';">
                        <div class="flex-grow">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="${details.icon}" class="w-4 h-4 ${details.color}"></i>
                                    <span class="font-bold text-sm text-gray-900 dark:text-white">${post.user}</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400 hidden sm:block">@${post.handle}</span>
                                </div>
                                <span class="text-xs text-gray-500 dark:text-gray-400">${post.timestamp}</span>
                            </div>
                            <p class="text-sm mt-1 text-gray-700 dark:text-gray-300">${post.content}</p>
                            ${post.imageUrl ? `<img src="${getImageUrl(post.imageUrl, 400, 225)}" class="mt-2 rounded-lg w-full h-auto object-cover" onerror="this.style.display='none'">` : ''}
                        </div>
                    </div>
                </a>
            `;
        };

        const createNewsCard = (article, size = 'normal') => {
            if (!article) return '';
            const isLarge = size === 'large';
            const headlineSize = isLarge ? 'text-2xl md:text-3xl' : 'text-lg';
            
            let mediaHTML = '';
            const heightClass = isLarge ? 'h-96' : 'h-48';

            // FIX: Correctly handle both video and image types within a container that maintains height.
            if (article.mediaType === 'video' && article.mediaUrl) {
                // Use a container with fixed height for grid consistency, and make iframe fill it.
                mediaHTML = `
                    <div class="w-full ${heightClass} rounded-t-lg overflow-hidden bg-black">
                        <iframe class="w-full h-full" src="${article.mediaUrl}" title="${article.headline}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>`;
            } else {
                // Default to image
                const imageUrl = getImageUrl(article.mediaUrl, isLarge ? 800 : 600, isLarge ? 500 : 400);
                mediaHTML = `<img src="${imageUrl}" alt="${article.headline}" class="w-full ${heightClass} object-cover rounded-t-lg group-hover:scale-110 transition-transform duration-500 ease-in-out" onerror="this.onerror=null;this.src='https://placehold.co/600x400/ccc/999?text=Image+Not+Found';">`;
            }

            const cardClasses = "bg-white dark:bg-gray-800 rounded-lg shadow-lg group transform hover:-translate-y-2 hover:shadow-2xl dark:hover:shadow-brand-yellow/40 transition-all duration-500 ease-in-out";

            if (isLarge) {
                return `
                    <div class="${cardClasses}" data-id="${article.id}">
                        <div class="relative">
                            <div class="cursor-pointer" onclick="showArticleDetail(${article.id})">${mediaHTML}</div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent rounded-lg pointer-events-none"></div>
                            <div class="absolute bottom-0 p-6 w-full">
                                <span class="bg-brand-yellow text-black text-xs font-bold px-2 py-1 rounded mb-2 inline-block">${navConfig.find(c=>c.eng === article.category)?.name || article.category}</span>
                                <h3 class="${headlineSize} font-bold text-white mb-2 group-hover:text-brand-yellow transition-colors duration-300 cursor-pointer" onclick="showArticleDetail(${article.id})">${article.headline}</h3>
                                <div class="flex justify-between items-center mt-2">
                                    <p class="text-gray-300 text-sm">${formatTimeAgo(article.timestamp)}</p>
                                    ${createShareButtonHTML(article, 'dark')}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                return `
                    <div class="${cardClasses}" data-id="${article.id}">
                        <div class="relative">
                            <div class="cursor-pointer" onclick="showArticleDetail(${article.id})">${mediaHTML}</div>
                            <span class="absolute top-2 left-2 bg-brand-yellow text-black text-xs font-bold px-2 py-1 rounded">${navConfig.find(c=>c.eng === article.category)?.name || article.category}</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-brand-yellow transition-colors duration-300 cursor-pointer" onclick="showArticleDetail(${article.id})">${article.headline}</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-500 dark:text-gray-400 text-sm">${formatTimeAgo(article.timestamp)}</p>
                                ${createShareButtonHTML(article)}
                            </div>
                        </div>
                    </div>
                `;
            }
        }

        const createOpinionCardHTML = (article) => {
            const imageUrl = getImageUrl(article.mediaUrl, 800, 500);
            return `
                <div class="opinion-card-item grid grid-cols-1 md:grid-cols-3 gap-6 items-center mb-8 pb-8 border-b dark:border-gray-700 last:border-b-0">
                    <div class="md:col-span-1">
                         <img src="${imageUrl}" alt="${article.headline}" class="w-full h-48 object-cover rounded-lg shadow-md">
                    </div>
                    <div class="md-col-span-2">
                        <h3 class="text-2xl font-bold mb-2">
                            <a href="#" onclick="showArticleDetail(${article.id})" class="hover:text-brand-yellow dark:hover:text-brand-yellow transition-colors">
                                <span class="text-gray-500 dark:text-gray-400">અભિપ્રાય |</span> ${article.headline}
                            </a>
                        </h3>
                         <div class="flex items-center gap-3 text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <img src="https://placehold.co/32x32/eee/ccc?text=A" alt="${article.author}" class="w-8 h-8 rounded-full">
                            <span>${article.author}</span>
                            <span>|</span>
                            <span>${formatTimeAgo(article.timestamp)}</span>
                        </div>
                        <div class="text-gray-600 dark:text-gray-300 mb-4 prose-sm">${article.content.substring(0, 200)}...</div>
                         ${createShareButtonHTML(article)}
                    </div>
                </div>
            `;
        };


        const createBeepsCard = (article, index) => {
            const summaryMatch = article.content.match(/<ul[\s\S]*?<\/ul>/);
            const summaryHtml = summaryMatch ? summaryMatch[0] : '<p>No summary available.</p>';
            const imageUrl = getImageUrl(article.mediaUrl, 600, 400);
            
            const readMoreButtonAction = article.redirectToHome
                ? `MapsToCategory('Home')`
                : `showArticleDetail(${article.id})`;
            
            return `
                <div class="beeps-card-full w-full h-full flex justify-center items-center p-4">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-2xl p-6 w-full max-w-md mx-auto">
                        <img src="${imageUrl}" alt="${article.headline}" class="w-full h-48 object-cover rounded-t-lg" onerror="this.onerror=null;this.src='https://placehold.co/600x400/ccc/999?text=Image+Error';">
                        <div class="p-4">
                            <h3 class="font-bold text-2xl text-gray-900 dark:text-white mb-4">${article.headline}</h3>
                            <div class="text-gray-600 dark:text-gray-300 space-y-2 mb-4 prose dark:prose-invert max-w-none">${summaryHtml}</div>
                             <div class="flex justify-between items-center mt-4">
                                <button onclick="${readMoreButtonAction}" class="text-brand-yellow font-semibold group inline-flex items-center">
                                    <span>વધુ વાંચો</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4 ml-1 transition-transform duration-300 ease-in-out transform group-hover:translate-x-1"></i>
                                </button>
                                ${createShareButtonHTML(article)}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        };
        
        const createNewsFlashHTML = () => {
             if (mockNewsFlashes.length === 0) return '';
            const flashText = mockNewsFlashes.map(text => `<span class="mx-4">${text}</span>`).join('<span class="text-black font-bold text-lg mx-2">|</span>');
            return `
                <a href="#" onclick="navigateToCategory('Home'); return false;" class="cursor-pointer block">
                    <div class="bg-brand-yellow text-black p-2 flex items-center">
                       <div class="container mx-auto flex items-center">
                            <span class="font-bold bg-black text-white px-3 py-1 text-sm mr-4 flex-shrink-0">તાજા સમાચાર</span>
                            <div class="marquee-container flex-grow">
                                <div class="marquee-content animate-marquee">
                                    <p class="marquee-text">${flashText}</p>
                                    <p class="marquee-text" aria-hidden="true">${flashText}</p> 
                                </div>
                            </div>
                       </div>
                    </div>
                </a>
            `;
        };

        const createAdHTML = (adData) => {
            if (!adData || !adData.image_url) return '';
            const imageUrl = getImageUrl(adData.image_url);
            const imageTag = `<img src="${imageUrl}" alt="Advertisement" class="w-full rounded-md"/>`;
            
            if (adData.redirect_url) {
                return `<a href="${adData.redirect_url}" target="_blank">${imageTag}</a>`;
            }
            return imageTag;
        };

        const createSidebar = () => {
            const mockTrending = [...allNewsData].sort(() => 0.5 - Math.random()).slice(0, 5);
            const rightSidebarAd = advertisements.right_sidebar_ad;
            return `
            <div class="lg:col-span-3">
                <div class="sticky top-24 space-y-8">
                     <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-4 border-b-2 border-brand-yellow pb-2 text-gray-900 dark:text-white">ટ્રેન્ડિંગ સમાચાર</h3>
                        <ul>
                            ${mockTrending.map((item, index) => `
                                <li class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700 last:border-b-0 last:pb-0 last:mb-0">
                                    <a href="#" onclick="event.preventDefault(); showArticleDetail(${item.id})" class="group">
                                        <div class="flex items-start">
                                            <span class="text-brand-yellow font-bold text-3xl mr-3 mt-1">${index + 1}</span>
                                            <div>
                                                <span class="text-gray-800 dark:text-gray-200 group-hover:text-brand-yellow transition-colors duration-300 font-semibold">${item.headline}</span>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">${navConfig.find(c=>c.eng === item.category)?.name || item.category}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            `).join('')}
                        </ul>
                    </div>
                    ${rightSidebarAd && rightSidebarAd.image_url ? `<div class="bg-gray-100 dark:bg-gray-800/50 p-4 rounded-lg shadow-md text-center">
                        <h3 class="text-sm font-bold mb-2 text-gray-500 dark:text-gray-400 uppercase">જાહેરાત</h3>
                        ${createAdHTML(rightSidebarAd)}
                    </div>` : ''}
                </div>
            </div>
        `};
        
        const createRelatedNewsSidebar = (currentArticle) => {
            const related = allNewsData.filter(a => a.category === currentArticle.category && a.id !== currentArticle.id).slice(0, 4);
            return `
                 <div class="lg:col-span-3 lg:block hidden">
                    <div class="sticky top-24">
                        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg">
                            <h3 class="text-xl font-bold mb-4 border-b-2 border-brand-yellow pb-2 text-gray-900 dark:text-white">સંબંધિત સમાચાર</h3>
                            <ul class="space-y-4">
                                ${related.map(item => `
                                    <li class="transition-transform duration-300 hover:translate-x-2">
                                        <a href="#" onclick="event.preventDefault(); showArticleDetail(${item.id})" class="group">
                                            <p class="font-semibold text-gray-800 dark:text-gray-200 group-hover:text-brand-yellow transition-colors">${item.headline}</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">${formatTimeAgo(item.timestamp)}</p>
                                        </a>
                                    </li>
                                `).join('')}
                            </ul>
                        </div>
                    </div>
                </div>
            `;
        };

        const createAdSidebar = () => {
            const leftSidebarAd = advertisements.left_sidebar_ad;
            return `
            <div class="lg:col-span-3 lg:block hidden">
                <div class="sticky top-24">
                    ${leftSidebarAd && leftSidebarAd.image_url ? `<div class="bg-gray-100 dark:bg-gray-800/50 p-4 rounded-lg shadow-md text-center">
                        <h3 class="text-sm font-bold mb-2 text-gray-500 dark:text-gray-400 uppercase">જાહેરાત</h3>
                        ${createAdHTML(leftSidebarAd)}
                    </div>` : ''}
                </div>
            </div>
        `};
        
        const createLeftSidebarHTML = () => {
            const leftSidebarAd = advertisements.left_sidebar_ad;
            return `
            <div class="lg:col-span-3 lg:block hidden">
                <div class="sticky top-24 space-y-8">
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-4 border-b-2 border-brand-yellow pb-2 text-gray-900 dark:text-white flex items-center gap-2">
                            <i data-lucide="rss" class="w-5 h-5 text-brand-yellow"></i>લાઇવ સોશિયલ ફીડ
                        </h3>
                        <div id="left-sidebar-feed-content" class="h-96 overflow-y-auto space-y-4 pr-2">
                           ${mockSocialFeedData.map(createSocialPostHTML).join('')}
                        </div>
                    </div>
                    ${leftSidebarAd && leftSidebarAd.image_url ? `<div class="bg-gray-100 dark:bg-gray-800/50 p-4 rounded-lg shadow-md text-center">
                        <h3 class="text-sm font-bold mb-2 text-gray-500 dark:text-gray-400 uppercase">જાહેરાત</h3>
                        ${createAdHTML(leftSidebarAd)}
                    </div>` : ''}
                </div>
            </div>
        `};

        const createSocialFeedOnlySidebarHTML = () => `
            <div class="lg:col-span-3 lg:block hidden">
                <div class="sticky top-24">
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-4 border-b-2 border-brand-yellow pb-2 text-gray-900 dark:text-white flex items-center gap-2">
                            <i data-lucide="rss" class="w-5 h-5 text-brand-yellow"></i>લાઇવ સોશિયલ ફીડ
                        </h3>
                        <div class="h-[700px] overflow-y-auto space-y-4 pr-2">
                           ${mockSocialFeedData.map(createSocialPostHTML).join('')}
                        </div>
                    </div>
                </div>
            </div>
        `;

        const createAdvertisementSectionHTML = () => {
            const mainAd = advertisements.main_ad;
            if (!mainAd || !mainAd.image_url) return '';
            
            return `
                <div class="my-8">
                    <div class="container mx-auto">
                        <div class="bg-gray-100 dark:bg-gray-800/50 p-4 rounded-lg shadow-md text-center">
                            <h3 class="text-sm font-bold mb-2 text-gray-500 dark:text-gray-400 uppercase">જાહેરાત</h3>
                             <div class="block">
                                ${createAdHTML(mainAd)}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        };

        const createCategoryPageLayout = (pageTitle) => {
             const mainCategoryEng = currentCategory.split(':')[0];
             if (mainCategoryEng === 'Beeps') {
                const beepsArticles = currentArticles.filter(a => a.category === 'Beeps');
                return `
                    <div class="relative">
                        <div id="beeps-container" class="beeps-container">
                            ${beepsArticles.map((article, index) => createBeepsCard(article, index)).join('')}
                        </div>
                    </div>
                `;
            }

            const categoriesWithSocialSidebar = ['World', 'Latest', 'India', 'Opinion', 'Cities', 'Sports', 'Education'];

            if (mainCategoryEng === 'Opinion') {
                const opinionArticles = currentArticles.filter(a => a.category === 'Opinion');
                const mainContentHtml = `
                    <div class="lg:col-span-6">
                         <h2 class="text-3xl font-bold mb-6 border-l-4 border-brand-yellow pl-4 text-gray-900 dark:text-white">${pageTitle}</h2>
                         <div>
                            ${opinionArticles.map(article => createOpinionCardHTML(article)).join('')}
                         </div>
                    </div>
                `;
                 return `
                    <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-8">
                        ${createSocialFeedOnlySidebarHTML()}
                        ${mainContentHtml}
                        ${createSidebar()}
                    </div>
                `;
            }

            let articlesHtml;
            if (currentArticles.length > 0) {
                 articlesHtml = currentArticles.slice(0, articlesToShow).map((article, index) => createNewsCard(article)).join('');
            } else {
                articlesHtml = `<div class="col-span-1 md:col-span-2 text-center py-12">
                    <i data-lucide="search-x" class="w-16 h-16 mx-auto text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">કોઈ પરિણામ મળ્યું નથી</h3>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">અમને તમારી શોધ સાથે મેળ ખાતા કોઈ લેખ મળ્યા નથી. એક અલગ કીવર્ડનો ઉપયોગ કરવાનો પ્રયાસ કરો.</p>
                </div>`;
            }

            const loadMoreButton = articlesToShow < currentArticles.length 
                ? `<div class="text-center mt-8 col-span-1 md:col-span-2">
                       <button onclick="loadMoreNews()" class="bg-brand-yellow text-black font-bold py-3 px-8 rounded-full hover:bg-opacity-80 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-brand-yellow/50">
                           વધુ લોડ કરો
                       </button>
                   </div>`
                : '';
            
            const gridClass = 'grid grid-cols-1 md:col-span-2 md:grid-cols-2 gap-8';
            
            const mainContentHtml = `
                <div class="lg:col-span-6">
                    <h2 class="text-3xl font-bold mb-6 border-l-4 border-brand-yellow pl-4 text-gray-900 dark:text-white">${pageTitle}</h2>
                    <div class="${gridClass}">
                        ${articlesHtml}
                    </div>
                    ${loadMoreButton}
                </div>
            `;
            
            const leftSidebar = categoriesWithSocialSidebar.includes(mainCategoryEng) ? createSocialFeedOnlySidebarHTML() : createAdSidebar();
            
            return `
                <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-8">
                    ${leftSidebar}
                    ${mainContentHtml}
                    ${createSidebar()}
                </div>
            `;
        };

        const createHomePageLayout = () => {
            const topStory = allNewsData.length > 0 ? allNewsData[0] : null;
            const sideStories = allNewsData.slice(1, 5);
            const sportsStories = allNewsData.filter(a => a.category === 'Sports').slice(0, 4);
            const entertainmentStories = allNewsData.filter(a => a.category === 'Entertainment').slice(0, 4);
            const regionalStories = allNewsData.filter(a => a.category === 'India').slice(0,4);


            const heroSection = `
                 <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <div class="lg:col-span-2">
                        ${createNewsCard(topStory, 'large')}
                    </div>
                    <div class="lg:col-span-1 space-y-4">
                        ${sideStories.map(story => `
                            <div class="news-article-card group bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1" data-id="${story.id}">
                                <div class="cursor-pointer" onclick="showArticleDetail(${story.id})">
                                    <h4 class="font-bold text-sm text-gray-900 dark:text-white group-hover:text-brand-yellow transition-colors">${story.headline}</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">${formatTimeAgo(story.timestamp)}</p>
                                </div>
                                <div class="mt-2 flex justify-end">
                                    ${createShareButtonHTML(story)}
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;

            const categorySection = (title, stories) => {
                if (stories.length === 0) return '';
                return `
                <div class="mb-8">
                    <h2 class="text-2xl font-bold mb-4 border-l-4 border-brand-yellow pl-4 text-gray-900 dark:text-white">${title}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        ${stories.map(story => createNewsCard(story)).join('')}
                    </div>
                </div>
            `};

            const regionalSection = `
                <div class="mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        ${['ગુજરાતી સમાચાર', 'મધ્ય પ્રદેશ-છત્તીસગઢ', 'રાજસ્થાન', 'મરાઠી'].map((region, i) => `
                            <div>
                                <h3 class="text-xl font-bold mb-4 flex items-center">
                                    ${region} <span class="ml-2 px-2 py-0.5 bg-brand-yellow text-black text-xs rounded">લાઇવ</span>
                                </h3>
                                <div class="space-y-4">
                                    ${createNewsCard(regionalStories[i])}
                                    <ul class="space-y-2 text-sm">
                                        ${regionalStories.length > i+1 ? `<li><a href="#" onclick="showArticleDetail(${regionalStories[i+1].id})" class="hover:text-brand-yellow transition-colors">${regionalStories[i+1].headline.substring(0,30)}...</a></li>` : ''}
                                        ${regionalStories.length > i+2 ? `<li><a href="#" onclick="showArticleDetail(${regionalStories[i+2].id})" class="hover:text-brand-yellow transition-colors">${regionalStories[i+2].headline.substring(0,30)}...</a></li>` : ''}
                                    </ul>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;
            
            const mainContentHtml = `
                <div class="lg:col-span-6">
                    ${heroSection}
                    ${createAdvertisementSectionHTML()}
                    ${categorySection('રમતગમત', sportsStories)}
                    ${regionalSection}
                    ${categorySection('મનોરંજન', entertainmentStories)}
                </div>
            `;

            return `
                 <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-8">
                    ${createLeftSidebarHTML()}
                    ${mainContentHtml}
                    ${createSidebar()}
                </div>
            `;
        };

        const createQuickReadBoxHTML = (article) => {
            const summaryMatch = article.content.match(/<ul[\s\S]*?<\/ul>/);
            let summaryHtml = '';
            if (summaryMatch) {
                summaryHtml = summaryMatch[0];
            } else {
                const paragraphMatch = article.content.match(/<p>(.*?)<\/p>/);
                if (paragraphMatch) {
                    summaryHtml = `<p>${paragraphMatch[1]}</p>`;
                }
            }

            if (!summaryHtml) return ''; 

            return `
                <div class="my-6 animate-fade-in">
                    <div class="rounded-xl p-0.5 bg-gradient-to-br from-purple-500 via-pink-500 to-blue-500">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                            <div class="flex items-center gap-2 mb-4">
                                <i data-lucide="sparkles" class="w-6 h-6 text-purple-500"></i>
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white">ઝડપી વાંચો</h2>
                            </div>
                            <div class="text-gray-600 dark:text-gray-300 space-y-2 prose dark:prose-invert max-w-none">
                                ${summaryHtml}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        };
        
        const createArticalDetail = (article) => {
            let mediaDetailHTML = '';
             // FIX: Use aspect-ratio with absolute positioning for robust video display
             if (article.mediaType === 'video' && article.mediaUrl) {
                mediaDetailHTML = `
                    <div class="relative aspect-video w-full rounded-lg shadow-lg mb-6 overflow-hidden bg-black">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="${article.mediaUrl}" title="${article.headline}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>`;
            } else {
                const imageUrl = getImageUrl(article.mediaUrl, 800, 500);
                mediaDetailHTML = `<img src="${imageUrl}" alt="${article.headline}" class="w-full rounded-lg shadow-lg mb-6" onerror="this.onerror=null;this.src='https://placehold.co/800x500/ccc/999?text=Image+Not+Found';">`;
            }
            
            let mainContentToDisplay = article.content;
            if (article.category === 'Beeps') {
                const summaryMatch = mainContentToDisplay.match(/<ul[\s\S]*?<\/ul>/);
                if (summaryMatch) {
                    mainContentToDisplay = mainContentToDisplay.replace(summaryMatch[0], '').trim();
                }
            }

            const mainArticleHtml = `
                <div class="lg:col-span-6 article-detail-view" data-id="${article.id}">
                    <div class="flex justify-between items-center mb-4">
                         <button onclick="navigateToCategory(currentCategory || 'Home')" class="text-brand-yellow hover:opacity-80 font-semibold">&larr; સમાચાર પર પાછા</button>
                         <div class="flex items-center space-x-2">
                            ${createShareButtonHTML(article)}
                             <button class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i data-lucide="bookmark" class="w-5 h-5"></i>
                            </button>
                         </div>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-4">${article.headline}</h1>
                    <div class="flex items-center text-gray-500 dark:text-gray-400 mb-4 text-sm">
                        <span>દ્વારા ${article.author}</span>
                        <span class="mx-2">|</span>
                        <span>પ્રકાશિત: ${formatTimeAgo(article.timestamp)}</span>
                    </div>
                    ${mediaDetailHTML}
                    
                    ${createQuickReadBoxHTML(article)}

                    <div class="prose dark:prose-invert max-w-none text-lg text-gray-800 dark:text-gray-200">${mainContentToDisplay}</div>
                </div>
            `;

            return `
                <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-8">
                    ${createLeftSidebarHTML()}
                    ${mainArticleHtml}
                    ${createSidebar()}
                </div>
            `;
        };

        const createLiveTvMenu = () => {
            return `
                <div class="mega-menu absolute top-full left-0 w-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-md shadow-2xl border border-gray-200 dark:border-gray-700 rounded-lg z-50">
                    <div class="p-4 grid grid-cols-3 gap-2">
                        ${liveTvChannels.map(channel => `
                            <a href="#" onclick="navigateToCategory('LiveTV:${channel.name}')" class="flex flex-col items-center justify-center p-3 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i data-lucide="${channel.icon}" class="w-8 h-8 ${channel.color} mb-2"></i>
                                <span class="text-xs font-semibold text-center">${channel.name}</span>
                            </a>
                        `).join('')}
                    </div>
                </div>
            `;
        };

        const createMegaMenu = (category) => {
            if (!category.subCategories || category.subCategories.length === 0) {
                return '';
            }
            const latestNews = allNewsData.filter(n => category.subCategories.includes(n.subCategory) || n.category === category.eng).slice(0, 4);

            return `
                <div class="mega-menu absolute top-full left-0 w-screen bg-white/90 dark:bg-gray-900/95 backdrop-blur-lg shadow-2xl border-t border-gray-200 dark:border-gray-700 z-50">
                    <div class="container mx-auto px-4 py-6 grid grid-cols-4 gap-8">
                        <div class="col-span-1 border-r border-gray-200 dark:border-gray-700 pr-6">
                            <h3 class="font-bold text-brand-yellow mb-4">${category.name}</h3>
                            <ul class="space-y-1">
                                ${category.subCategories.map(sub => `
                                    <li class="rounded-md transition-colors hover:bg-gray-100 dark:hover:bg-gray-700"><a href="#" onclick="navigateToCategory('${category.eng}:${sub}')" class="block p-2 transition-colors">${sub}</a></li>
                                `).join('')}
                            </ul>
                        </div>
                        <div class="col-span-3">
                             <h3 class="font-bold text-gray-800 dark:text-white mb-4">${category.name} માં નવીનતમ</h3>
                             <div class="grid grid-cols-2 gap-6">
                                ${latestNews.map(news => `
                                    <a href="#" onclick="showArticleDetail(${news.id})" class="group flex items-center gap-3">
                                        <img src="${getImageUrl(news.mediaUrl, 150, 100)}" class="w-20 h-14 object-cover rounded"/>
                                        <div>
                                            <p class="text-sm font-semibold group-hover:text-brand-yellow transition-colors">${news.headline}</p>
                                        </div>
                                    </a>
                                `).join('')}
                             </div>
                        </div>
                    </div>
                </div>
            `;
        };
        
        const createMoreMenu = (category) => {
            return `
                 <div class="more-menu absolute top-full right-0 w-48 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md shadow-2xl border border-gray-200 dark:border-gray-700 rounded-b-md">
                    <ul class="py-1">
                        ${category.subCategories.map(sub => `
                            <li><a href="#" onclick="event.preventDefault(); navigateToCategory('${moreCategoryMapping[sub] || sub}');" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">${sub}</a></li>
                        `).join('')}
                    </ul>
                </div>
            `;
        };
        
        const createLiveTvLeftSidebar = (activeChannel) => {
            const menuItems = ['લાઇવ ટીવી', 'ટોચની વાર્તાઓ', 'નવીનતમ', 'વિશ્વ', 'ભારત'];
             return `
                <div class="w-48">
                    <div class="sticky top-24">
                        <h2 class="font-bold text-lg mb-4">વીડિયો</h2>
                        <ul class="space-y-1">
                            ${menuItems.map(item => `
                                <li>
                                    <a href="#" class="${item === 'લાઇવ ટીવી' ? 'bg-blue-600 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700'} flex items-center gap-3 px-3 py-2 rounded-md font-semibold transition-colors">
                                        <i data-lucide="tv" class="w-5 h-5"></i>
                                        <span>${item}</span>
                                    </a>
                                </li>
                            `).join('')}
                        </ul>
                    </div>
                </div>
             `;
        };
        
        const createLiveTvChannelSwitcher = (activeChannel) => {
            return `
                <div class="flex items-center space-x-2 mb-4 p-2 bg-gray-100 dark:bg-gray-800 rounded-lg">
                    ${liveTvChannels.map(channel => `
                        <button onclick="navigateToCategory('LiveTV:${channel.name}')" class="${activeChannel === channel.name ? 'bg-white dark:bg-gray-700 shadow' : 'opacity-70 hover:opacity-100'} flex-1 p-2 rounded-md text-center transition-all">
                            <i data-lucide="${channel.icon}" class="w-6 h-6 ${channel.color} mx-auto mb-1"></i>
                            <span class="text-xs font-semibold">${channel.name}</span>
                        </button>
                    `).join('')}
                </div>
            `;
        };
        
        const createLiveTvRightSidebar = () => {
             const relatedVideos = allNewsData.slice(0, 6);
             return `
                <div class="lg:col-span-3 lg:block hidden">
                    <div class="sticky top-24">
                        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg">
                            <h3 class="text-xl font-bold mb-4 border-b-2 border-brand-yellow pb-2">આગળ</h3>
                            <div class="space-y-4 mt-4">
                                ${relatedVideos.map(video => `
                                    <a href="#" onclick="showArticleDetail(${video.id})" class="flex gap-4 group">
                                        <img src="${getImageUrl(video.mediaUrl, 150, 100)}" class="w-32 h-20 object-cover rounded-lg flex-shrink-0" />
                                        <div>
                                            <p class="font-bold text-sm leading-tight group-hover:text-brand-yellow">${video.headline}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">${video.category}</p>
                                        </div>
                                    </a>
                                `).join('')}
                            </div>
                        </div>
                    </div>
                </div>
             `;
        };

        const createLiveTvPageLayout = (channelName) => {
            const stream = liveTvStreams[channelName] || liveTvStreams["યુટીસી ન્યૂઝ લાઇવ"];
            
            const mainVideoContent = `
                <div class="lg:col-span-6">
                    ${createLiveTvChannelSwitcher(channelName)}
                    
                    <div class="mb-4">
                        <h2 class="text-xl font-bold">${stream.title}</h2>
                    </div>
                    
                    <div class="aspect-video bg-black rounded-lg mb-4">
                            <iframe class="w-full h-full" src="https://www.youtube.com/embed/${stream.videoId}?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                    <!-- Placeholder for more scrolling content -->
                    <div class="space-y-4">
                        ${allNewsData.slice(0, 5).map(article => createNewsCard(article)).join('')}
                    </div>
                </div>
            `;

            return `
                <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-8">
                    ${createLeftSidebarHTML()}
                    ${mainVideoContent}
                    ${createLiveTvRightSidebar()}
                </div>
            `;
        };

        const toggleMoreMenu = (event) => {
            event.stopPropagation();
            const navItem = event.currentTarget.closest('.nav-item');
            const menu = navItem.querySelector('.more-menu');
            
            if (menu) {
                document.querySelectorAll('.mega-menu.menu-visible').forEach(m => {
                    m.classList.remove('menu-visible');
                });
                
                menu.classList.toggle('menu-visible');
            }
        };

        const createNavigation = () => {
            let navHtml = `
                <button onclick="openPanel()" class="group bg-gray-100 dark:bg-gray-800 rounded-full flex items-center p-2 transition-all duration-300 hover:w-32 w-10 overflow-hidden mr-2">
                   <i data-lucide="menu" class="w-5 h-5 flex-shrink-0"></i>
                   <span class="ml-2 text-sm font-semibold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-200">અન્વેષણ કરો</span>
                </button>
            `;
            let mobileNavHtml = '';

            navConfig.forEach(cat => {
                const hasSubCategories = cat.subCategories && cat.subCategories.length > 0;
                const isMoreMenu = cat.eng === 'More';
                const mainCategoryOfCurrent = currentCategory.split(':')[0];
                const isActive = mainCategoryOfCurrent === cat.eng && !isMoreMenu;

                const activeClasses = isActive 
                    ? 'text-brand-yellow font-extrabold border-b-2 border-brand-yellow' 
                    : 'text-gray-700 dark:text-gray-300';
                
                const mobileActiveClasses = isActive 
                    ? 'text-brand-yellow bg-brand-yellow/20 rounded-md font-bold' 
                    : 'text-gray-700 dark:text-gray-300';
                
                if (isMoreMenu) {
                    navHtml += `
                        <div class="nav-item is-more-menu px-3">
                            <a href="#" onclick="toggleMoreMenu(event)" class="py-3 inline-flex items-center hover:text-brand-yellow dark:hover:text-brand-yellow transition-colors">
                                ${cat.name}
                            </a>
                            ${createMoreMenu(cat)}
                        </div>
                    `;
                } else {
                    let arrowIcon = '';
                    let menuHTML = '';
                    let linkContent = cat.name;

                    if (cat.eng === 'LiveTV') {
                        linkContent = `<i data-lucide="tv" class="w-4 h-4 mr-2 text-brand-yellow animate-pulse"></i>${cat.name}`;
                    }


                    if (hasSubCategories) {
                        arrowIcon = `<i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>`;
                    }
                    
                    if (cat.eng === 'LiveTV') {
                        menuHTML = createLiveTvMenu();
                    } else if (hasSubCategories) {
                        menuHTML = createMegaMenu(cat);
                    }
                    
                    navHtml += `
                        <div class="nav-item px-3">
                            <a href="#" onclick="navigateToCategory('${cat.eng}')" class="py-3 inline-flex items-center hover:text-brand-yellow dark:hover:text-brand-yellow transition-colors ${activeClasses}">
                                ${linkContent}
                                ${arrowIcon}
                            </a>
                            ${menuHTML}
                        </div>
                    `;
                }
                
                mobileNavHtml += `<a href="#" onclick="navigateToCategory('${cat.eng}')" class="transition-colors py-2 px-4 w-full text-center ${mobileActiveClasses}">${cat.name}</a>`;
            });
            mainNav.innerHTML = navHtml;
            mobileNavMenu.innerHTML = mobileNavHtml;
            
            // --- Dropdown Menu Logic ---
            const navItems = mainNav.querySelectorAll('.nav-item');
            navItems.forEach(navItem => {
                if (navItem.classList.contains('is-more-menu')) return;
                
                const menu = navItem.querySelector('.mega-menu, .more-menu');
                if (!menu) return;

                let timeoutId;

                const showMenu = () => {
                    clearTimeout(timeoutId);
                    document.querySelectorAll('.mega-menu.menu-visible, .more-menu.menu-visible').forEach(m => {
                        if(m !== menu) m.classList.remove('menu-visible');
                    });
                    menu.classList.add('menu-visible');
                };

                const hideMenu = () => {
                    timeoutId = setTimeout(() => {
                        menu.classList.remove('menu-visible');
                    }, 500);
                };

                navItem.addEventListener('mouseenter', showMenu);
                navItem.addEventListener('mouseleave', hideMenu);
                menu.addEventListener('mouseenter', () => clearTimeout(timeoutId));
                menu.addEventListener('mouseleave', hideMenu);
            });

            lucide.createIcons();
        };

        // --- RENDER FUNCTIONS ---
        
        const render = () => {
            const loadingIndicator = document.getElementById('loading-indicator');
            if (loadingIndicator) loadingIndicator.style.display = 'none';

            const mainCategory = currentCategory.split(':')[0];
            const subCategory = currentCategory.split(':')[1];
            const categoryConfig = navConfig.find(c => c.eng === mainCategory) || {name: mainCategory, eng: mainCategory};

            let pageTitle = categoryConfig.name;
            if(mainCategory === 'Search'){
               pageTitle = `"${subCategory}" માટે શોધ પરિણામો`;
            } else if (subCategory) {
                pageTitle = `${categoryConfig.name}: ${subCategory}`;
            }

            if (currentArticleIdOnDetailView) {
                const article = allNewsData.find(a => a.id == currentArticleIdOnDetailView);
                if (article) mainContent.innerHTML = createArticalDetail(article);
            } else if (mainCategory === 'LiveTV') {
                mainContent.innerHTML = createLiveTvPageLayout(subCategory);
                newsFlashContainer.classList.add('hidden');
            } else if (currentCategory === 'Home') {
                mainContent.innerHTML = createHomePageLayout();
                newsFlashContainer.innerHTML = createNewsFlashHTML();
                if(mockNewsFlashes.length > 0) newsFlashContainer.classList.remove('hidden'); else newsFlashContainer.classList.add('hidden');
            } else {
                mainContent.innerHTML = createCategoryPageLayout(pageTitle);
                newsFlashContainer.classList.add('hidden');
            }
            lucide.createIcons();

            if (currentCategory === 'Beeps') {
                setupBeepsSlider();
            }
        };

        // --- EVENT HANDLERS & LOGIC ---
        let lastScrollTop = 0;
        const getWeatherIcon = (weatherCode) => {
            const code = parseInt(weatherCode);
            if (code === 113) return 'sun'; // Clear/Sunny
            if ([116, 119, 122].includes(code)) return 'cloud'; // Partly cloudy, Cloudy, Overcast
            if ([179, 182, 185, 263, 266, 281, 284, 293, 296, 299, 302, 305, 308, 311, 314].includes(code)) return 'cloud-drizzle'; // Rain related
            if ([317, 320, 323, 326, 329, 332, 335, 338, 350, 368, 371, 374, 377].includes(code)) return 'cloud-snow'; // Snow related
            if ([200].includes(code)) return 'cloud-lightning'; // Thundery outbreaks
            if ([143, 248, 260].includes(code)) return 'cloudy'; // Mist, Fog
            return 'cloud-sun'; // Default
        };

        const fetchWeatherForVadodara = async () => {
            const weatherWidget = document.getElementById('weather-widget');
            const url = `https://wttr.in/Vadodara?format=j1`;
            
            try {
                const response = await fetch(url);
                if (!response.ok) throw new Error('Weather data not available');
                const data = await response.json();
                
                const currentCondition = data.current_condition[0];
                const temp = currentCondition.temp_C;
                const iconName = getWeatherIcon(currentCondition.weatherCode);
                const cityName = data.nearest_area[0].areaName[0].value;
                
                weatherWidget.innerHTML = `
                    <span>${cityName}</span>
                    <i data-lucide="${iconName}" class="w-4 h-4 text-brand-yellow"></i>
                    <span>${temp}°C</span>
                `;

            } catch (error) {
                console.error("Failed to fetch weather:", error);
                 weatherWidget.innerHTML = `
                    <span>વડોદરા</span>
                    <i data-lucide="cloud-sun" class="w-4 h-4 text-brand-yellow"></i>
                    <span>~32°C</span>
                `; // Fallback to a default
            } finally {
                lucide.createIcons();
            }
        };

        const toggleShareMenu = (event) => {
            event.stopPropagation();
            const container = event.currentTarget.closest('.share-container');
            
            document.querySelectorAll('.share-container.active').forEach(openMenu => {
                if (openMenu !== container) {
                    openMenu.classList.remove('active');
                }
            });

            container.classList.toggle('active');
            lucide.createIcons();
        };

        const copyLinkToClipboard = (text) => {
            const notification = document.getElementById('copy-notification');
            navigator.clipboard.writeText(text).then(() => {
                notification.classList.remove('hidden');
                notification.classList.add('opacity-100');
                setTimeout(() => {
                    notification.classList.remove('opacity-100');
                    setTimeout(() => notification.classList.add('hidden'), 500);
                }, 2000);
            }).catch(err => {
                console.error('Could not copy text: ', err);
            });
             document.querySelectorAll('.share-container.active').forEach(openMenu => {
                openMenu.classList.remove('active');
            });
        }
        
        const handleScroll = () => {
            const st = window.pageYOffset || document.documentElement.scrollTop;
            const onArticlePage = !!currentArticleIdOnDetailView;
            const shrinkThreshold = 150;

            if (st > lastScrollTop && st > shrinkThreshold) {
                // Scrolling down past the threshold: Shrink the header
                if (onArticlePage) {
                    header.classList.add('article-scrolled');
                    header.classList.remove('scrolled');
                } else {
                    header.classList.add('scrolled');
                    header.classList.remove('article-scrolled');
                }
            } else if (st < lastScrollTop && st < shrinkThreshold) {
                // Scrolling up: Expand the header
                header.classList.remove('scrolled');
                header.classList.remove('article-scrolled');
            }
            lastScrollTop = st <= 0 ? 0 : st; // Update scroll position for next event
        };

        const openPanel = () => {
            sidePanel.classList.add('open');
            pageWrapper.classList.add('panel-open');
        };

        const closePanel = () => {
            sidePanel.classList.remove('open');
            pageWrapper.classList.remove('panel-open');
        };
        
        const navigateFromPanel = (category) => {
            navigateToCategory(category);
            closePanel();
        };

        const getBeepsSummaryText = (article) => {
            if (article.category !== 'Beeps' || !article.content) {
                return article.headline; // Fallback to headline
            }

            const summaryMatch = article.content.match(/<ul[\s\S]*?<\/ul>/);
            if (summaryMatch) {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = summaryMatch[0];
                // Join list items with a separator
                const summaryPoints = Array.from(tempDiv.querySelectorAll('li')).map(li => li.textContent.trim());
                if (summaryPoints.length > 0) {
                    return summaryPoints.join(' | ');
                }
            }
            
            // If no <ul> found, fall back to the headline
            return article.headline;
        };

        const showArticleDetail = (articleId) => {
            const article = allNewsData.find(a => a.id == articleId);
            const scrollHeader = document.getElementById('scroll-header');
            
            if (article) {
                currentArticleIdOnDetailView = article.id;
                currentCategory = article.category;
                
                render();
                
                // Only populate the scroll header if it is NOT a 'Beeps' article.
                if (article.category !== 'Beeps') {
                    const headerText = article.headline;

                    scrollHeader.innerHTML = `
                        <div class="container mx-auto px-4 flex items-center justify-between text-black h-full">
                            <div class="flex-grow min-w-0 mr-4 pointer-events-none">
                                <span class="font-bold truncate text-base normal-case">${headerText}</span>
                            </div>
                            <div class="flex items-center space-x-2 flex-shrink-0">
                                 <button class="p-2 rounded-full hover:bg-black/20">
                                    <i data-lucide="bookmark" class="w-5 h-5"></i>
                                </button>
                                ${createShareButtonHTML(article, 'dark')}
                            </div>
                        </div>
                    `;
                } else {
                    // For Beeps articles, ensure the scroll header is empty.
                    scrollHeader.innerHTML = '';
                }

                lucide.createIcons();
                window.scrollTo(0, 0);
                handleScroll(); // Initial check
            }
        };

        // FIX: Map for translating Gujarati subcategories from the frontend nav to English names stored in data.json
        const subCategoryTranslationMap = {
            // India
            "અખિલ ભારતીય સમાચાર": "All India News",
            "વૈશ્વિક": "Global",
            "પ્રવાસી": "Expat",
            "દક્ષિણ": "South",
            // Sports
            "ક્રિકેટ": "Cricket",
            "ફૂટબોલ": "Football",
            // Cities
            "અમદાવાદ": "Ahmedabad",
            "સુરત": "Surat",
            "વડોદરા": "Vadodara",
            "રાજકોટ": "Rajkot",
            "ભાવનગર": "Bhavnagar",
            "જામનગર": "Jamnagar"
        };

        const navigateToCategory = (categoryString) => {
            if (categoryString.startsWith('More')) {
                return;
            }

            const [mainCategory, subCategoryFromNav] = categoryString.split(':');
            
            if(mainCategory === 'LiveTV' && !subCategoryFromNav) {
                categoryString = 'LiveTV:યુટીસી ન્યૂઝ લાઇવ';
            }
            
            currentCategory = categoryString;
            articlesToShow = 6;
            currentArticleIdOnDetailView = null; 
            
            document.getElementById('scroll-header').innerHTML = ''; 

            const categoryConfig = navConfig.find(c => c.eng === mainCategory);

            if (mainCategory === 'Search') {
                // Articles are pre-filtered by handleSearch, do nothing.
            } else if (mainCategory === 'Home' || mainCategory === 'Latest') {
                currentArticles = [...allNewsData];
            } else if (mainCategory !== 'LiveTV') {
                currentArticles = allNewsData.filter(a => {
                    if (subCategoryFromNav) {
                        // FIX: Use the translation map to find the correct English subcategory name for filtering
                        const englishSubCategory = subCategoryTranslationMap[subCategoryFromNav] || subCategoryFromNav;
                        return a.category === mainCategory && a.subCategory === englishSubCategory;
                    }
                    return a.category === mainCategory;
                });
            }
            
            createNavigation();
            render();
            mobileMenu.classList.add('hidden');
            mobileMenuBtn.innerHTML = '<i data-lucide="menu" class="w-7 h-7"></i>';
            lucide.createIcons();
            handleScroll();
        };

        const loadMoreNews = () => {
            articlesToShow += 6;
            render();
        };

        const hideSuggestions = () => {
            document.getElementById('desktop-suggestions').classList.add('hidden');
            document.getElementById('mobile-suggestions').classList.add('hidden');
        };
        
        const handleSearch = (query) => {
            if (!query) return;

            hideSuggestions();

            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                mobileMenuBtn.innerHTML = '<i data-lucide="menu" class="w-7 h-7"></i>';
                lucide.createIcons();
            }

            currentArticles = allNewsData.filter(article => 
                article.headline.toLowerCase().includes(query.toLowerCase()) || 
                (article.content && article.content.toLowerCase().includes(query.toLowerCase()))
            );
            
            navigateToCategory(`Search:${query}`);
        };

        const handleSearchKeydown = (event) => {
            if (event.key === 'Enter') {
                handleSearch(event.target.value);
            }
        };

        const showSuggestions = (query, containerId) => {
            const container = document.getElementById(containerId);
            if (!query) {
                container.innerHTML = '';
                container.classList.add('hidden');
                return;
            }

            const suggestions = allNewsData.filter(article => 
                article.headline.toLowerCase().startsWith(query.toLowerCase())
            ).slice(0, 5); // Limit to 5 suggestions

            if (suggestions.length === 0) {
                 container.innerHTML = '';
                 container.classList.add('hidden');
                 return;
            }

            container.innerHTML = suggestions.map(article => 
                `<a href="#" onclick="event.preventDefault(); showArticleDetail(${article.id}); hideSuggestions();" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">${article.headline}</a>`
            ).join('');
            container.classList.remove('hidden');
        };

        const handleSearchInput = (event, containerId) => {
            showSuggestions(event.target.value, containerId);
        };
        
        // --- Live TV Player Logic ---
        let ytPlayer;
        const liveTvContainer = document.getElementById('live-tv-player-container');
        const liveTvControls = document.getElementById('live-tv-controls');
        const unmuteBtn = document.getElementById('live-tv-unmute-btn');
        const closeBtn = document.getElementById('live-tv-close');

        window.onYouTubeIframeAPIReady = function() {
            // This function will be called when the API is ready.
            // We will initialize the player after fetching our video ID.
        };

        const setupLivePlayer = (videoId) => {
            if (!videoId) {
                liveTvContainer.classList.remove('visible');
                return;
            };

            liveTvContainer.classList.add('visible');

            ytPlayer = new YT.Player('live-tv-player', {
                height: '180',
                width: '320',
                videoId: videoId,
                playerVars: {
                    'playsinline': 1,
                    'autoplay': 1,
                    'controls': 0,
                    'mute': 1,
                    'loop': 1,
                    'playlist': videoId // Required for looping a single video
                },
                events: {
                    'onReady': onPlayerReady
                }
            });
        };

        function onPlayerReady(event) {
            event.target.playVideo();
        }
        
        unmuteBtn.addEventListener('click', () => {
            if (ytPlayer && typeof ytPlayer.unMute === 'function') {
                ytPlayer.unMute();
                liveTvControls.classList.add('playing');
                unmuteBtn.innerHTML = '<i data-lucide="volume-2" class="w-8 h-8"></i>';
                lucide.createIcons();
            }
        });

        closeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (ytPlayer && typeof ytPlayer.stopVideo === 'function') {
                 ytPlayer.stopVideo();
            }
            liveTvContainer.classList.remove('visible');
        });


        // --- INITIALIZATION ---
        document.addEventListener('DOMContentLoaded', () => {
            yearSpan.textContent = new Date().getFullYear();
            
            fetchWeatherForVadodara();

            fetch('api.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    allNewsData = data.articles || [];
                    mockSocialFeedData = data.socialFeed || [];
                    mockNewsFlashes = data.newsFlashes || [];
                    advertisements = data.advertisements || {};
                    liveTvVideoId = data.live_tv_video_id || '';
                    
                    initializeApp();
                })
                .catch(error => {
                    console.error('Error fetching or parsing site data:', error);
                    const loadingIndicator = document.getElementById('loading-indicator');
                    if(loadingIndicator) loadingIndicator.style.display = 'none';
                    mainContent.innerHTML = '<p class="text-center text-red-500 py-10">Error loading content. The data file might be missing, empty, or contain errors. Please check data.json and web server permissions.</p>';
                });

            const initializeApp = () => {
                if (typeof YT === 'undefined' || typeof YT.Player === 'undefined') {
                    // If YT API is not ready, wait a bit and try again.
                    setTimeout(() => setupLivePlayer(liveTvVideoId), 500);
                } else {
                    setupLivePlayer(liveTvVideoId);
                }
                
                const html = document.documentElement;
                const applyDarkMode = (isDark) => {
                    const moonIcons = document.querySelectorAll('.moon-icon');
                    const sunIcons = document.querySelectorAll('.sun-icon');
                    if (isDark) {
                        html.classList.add('dark');
                        moonIcons.forEach(i => i.classList.add('hidden'));
                        sunIcons.forEach(i => i.classList.remove('hidden'));
                    } else {
                        html.classList.remove('dark');
                        moonIcons.forEach(i => i.classList.remove('hidden'));
                        sunIcons.forEach(i => i.classList.add('hidden'));
                    }
                };
                
                document.getElementById('darkModeToggler').addEventListener('click', () => {
                    const isDark = html.classList.toggle('dark');
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                    applyDarkMode(isDark);
                });
                document.getElementById('darkModeTogglerMobile').addEventListener('click', () => {
                    const isDark = html.classList.toggle('dark');
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                    applyDarkMode(isDark);
                });

                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const savedTheme = localStorage.getItem('theme');
                applyDarkMode(savedTheme === 'dark' || (!savedTheme && prefersDark));

                mobileMenuBtn.addEventListener('click', () => {
                    const isHidden = mobileMenu.classList.toggle('hidden');
                    mobileMenuBtn.innerHTML = isHidden ? '<i data-lucide="menu" class="w-7 h-7"></i>' : '<i data-lucide="x" class="w-7 h-7"></i>';
                    lucide.createIcons();
                });
                
                closeSidePanelBtn.addEventListener('click', closePanel);

                const liveFeedButton = document.getElementById('live-feed-button');
                const liveFeedPanel = document.getElementById('live-feed-panel');
                const closeLiveFeedPanelBtn = document.getElementById('close-live-feed-panel');
                const liveFeedContent = document.getElementById('live-feed-content');

                const populateLiveFeedPanel = () => {
                    liveFeedContent.innerHTML = mockSocialFeedData.map(createSocialPostHTML).join('');
                    lucide.createIcons();
                };

                const openLiveFeed = () => liveFeedPanel.classList.add('open');
                const closeLiveFeed = () => liveFeedPanel.classList.remove('open');

                liveFeedButton.addEventListener('click', openLiveFeed);
                closeLiveFeedPanelBtn.addEventListener('click', closeLiveFeed);
                
                const footerCategories = document.getElementById('footer-categories');
                if(footerCategories) {
                     footerCategories.innerHTML = navConfig.filter(c => !['LiveTV', 'Latest', 'More'].includes(c.eng)).slice(0,5).map(c => `<li><a href="#" onclick="navigateToCategory('${c.eng}')" class="text-gray-400 hover:text-white">${c.name}</a></li>`).join('');
                }

                populateLiveFeedPanel();

                window.addEventListener('scroll', handleScroll);
                
                window.addEventListener('click', (e) => {
                    document.querySelectorAll('.share-container.active').forEach(menu => {
                        if (!menu.contains(e.target)) menu.classList.remove('active');
                    });
                    document.querySelectorAll('.more-menu.menu-visible, .mega-menu.menu-visible').forEach(menu => {
                        const parent = menu.closest('.nav-item');
                        if (!parent || !parent.contains(e.target)) menu.classList.remove('menu-visible');
                    });
                    
                    const searchDesktopParent = document.getElementById('desktop-search').parentElement;
                    const searchMobileParent = document.getElementById('mobile-search').parentElement;
                    if (!searchDesktopParent.contains(e.target)) document.getElementById('desktop-suggestions').classList.add('hidden');
                    if (!searchMobileParent.contains(e.target)) document.getElementById('mobile-suggestions').classList.add('hidden');
                });

                const urlParams = new URLSearchParams(window.location.search);
                const articleIdParam = urlParams.get('article');

                createNavigation(); // Create nav immediately so it appears while content loads

                if (articleIdParam && allNewsData.length > 0) {
                    showArticleDetail(articleIdParam);
                } else {
                     navigateToCategory('Home');
                }
            }
        });
    </script>
</body>
</html>
