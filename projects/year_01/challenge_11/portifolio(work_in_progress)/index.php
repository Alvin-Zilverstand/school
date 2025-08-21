<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My School Projects Portfolio - A showcase of all my academic work">
    <title>My School Projects Portfolio</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            bg: '#0f172a',
                            card: '#334155',
                            text: '#f1f5f9'
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-in': 'bounceIn 0.8s ease-out',
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/animations.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
    
    <!-- Prevent source map errors -->
    <script>
        window.addEventListener('error', function(e) {
            if (e.filename && e.filename.includes('source-map')) {
                e.preventDefault();
            }
        });
    </script>
</head>
<body class="min-h-screen transition-colors duration-200">
    <!-- Enhanced header with gradient and animations -->
    <header class="relative overflow-hidden mb-8 shadow-lg bg-gradient-to-r from-blue-600 to-indigo-700">
        <div class="relative z-10 p-8 text-white">
            <div class="container mx-auto">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h1 class="text-5xl md:text-6xl font-extrabold mb-3 leading-tight animate-slide-up text-white">
                            My School Projects Portfolio
                        </h1>
                        <p class="text-xl text-blue-100 dark:text-blue-200 mb-6 leading-relaxed animate-slide-up" style="animation-delay: 0.2s;">
                            A showcase of all my school projects, loaded from a database.
                        </p>
                        <div class="flex items-center space-x-4 animate-slide-up" style="animation-delay: 0.4s;">
                            <div class="flex items-center space-x-2 text-blue-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm">Dynamic content</span>
                            </div>
                            <div class="flex items-center space-x-2 text-blue-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                                </svg>
                                <span class="text-sm">Responsive design</span>
                            </div>
                        </div>
                    </div>
                    <a href="db/login.php" class="btn-primary hidden md:inline-flex items-center space-x-2 animate-bounce-in" style="animation-delay: 0.6s;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Manage</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Mobile manage button -->
        <div class="md:hidden absolute top-4 right-4 z-20">
            <a href="db/login.php" class="btn-primary text-sm px-4 py-2">
                Manage
            </a>
        </div>
    </header>

    <!-- Main content -->
    <main class="container mx-auto px-4 pb-20">
        <!-- Projects grid with enhanced styling -->
        <div id="projects" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 stagger-animation"></div>
    </main>

    <!-- Enhanced footer -->
    <footer class="bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 mt-20">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center text-gray-600 dark:text-gray-400">
                <p>&copy; 2025 School Projects Portfolio. Built with modern web technologies.</p>
                <!--<div class="mt-4 flex justify-center space-x-6">
                    <a href="php/test_db.php" class="text-sm text-blue-600 dark:text-blue-400 hover:underline transition-colors">Test DB Connection</a>
                    <a href="php/phpinfo.php" class="text-sm text-blue-600 dark:text-blue-400 hover:underline transition-colors">PHP Info</a>
                </div>-->
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/main.js"></script>
    <script src="js/dark-mode.js"></script>
    
    <!-- Ensure dark mode works -->
    <script>
        // Force dark mode initialization
        setTimeout(() => {
            if (typeof initDarkMode === 'function') {
                initDarkMode();
            } else {
                console.error('initDarkMode function not found');
            }
        }, 500);
    </script>
</body>
</html> 