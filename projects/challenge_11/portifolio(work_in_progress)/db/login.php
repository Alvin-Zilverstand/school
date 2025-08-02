<?php
session_start();

// Change these credentials as needed
$USERNAME = 'admin';
$PASSWORD = 'password123';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    if ($user === $USERNAME && $pass === $PASSWORD) {
        $_SESSION['logged_in'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manage Projects</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
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
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/animations.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="../assets/favicon.svg">
</head>
<body class="min-h-screen flex items-center justify-center transition-colors duration-200">
    <!-- Back to home button -->
    <a href="../index.php" class="fixed top-6 left-6 btn-primary inline-flex items-center space-x-2 z-50 animate-bounce-in">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span>Back to Home</span>
    </a>

    <!-- Login form container -->
    <div class="bg-white dark:bg-dark-card p-8 rounded-2xl shadow-xl w-full max-w-md mx-4 transition-colors duration-200 border border-gray-200 dark:border-gray-600">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2 text-gray-800 dark:text-white">Sign In</h1>
            <p class="text-gray-600 dark:text-gray-400">Access your project management dashboard</p>
        </div>
        
        <?php if ($error): ?>
            <div class="bg-red-100 dark:bg-red-900/50 text-red-800 dark:text-red-200 p-4 rounded-lg mb-6 border border-red-200 dark:border-red-800 animate-bounce-in">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span><?= htmlspecialchars($error) ?></span>
                </div>
            </div>
        <?php endif; ?>
        
        <form method="post" class="space-y-6">
            <div>
                <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Username</label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <input type="text" name="username" 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" 
                           placeholder="Enter your username" 
                           required autofocus>
                </div>
            </div>
            
            <div>
                <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Password</label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <input type="password" name="password" 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" 
                           placeholder="Enter your password" 
                           required>
                </div>
            </div>
            
            <button type="submit" class="btn-primary w-full py-3 text-lg font-semibold">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
                Sign In
            </button>
        </form>

    </div>

    <!-- Scripts -->
    <script src="../js/dark-mode.js"></script>
</body>
</html> 