<?php
require_once '../php/config.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $long_description = $_POST['long_description'] ?? '';
    $project_url = $_POST['project_url'] ?? '';
    $tags = $_POST['tags'] ?? '';
    $image_url = '';
    // Handle image upload
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('img_', true) . '.' . strtolower($ext);
        $target = '/var/www/alvnx.xyz/public_html/assets/' . $filename;
        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $target)) {
            $image_url = 'assets/' . $filename;
        } else {
            $message = '<div class="bg-red-100 text-red-800 p-3 rounded mb-4">Image upload failed.</div>';
        }
    } else if (!empty($_POST['image_url'])) {
        $image_url = $_POST['image_url'];
    }
    if (!$message) {
        try {
            $pdo = get_pdo();
            $stmt = $pdo->prepare('INSERT INTO projects (title, description, long_description, image_url, project_url, tags) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$title, $description, $long_description, $image_url, $project_url, $tags]);
            $message = '<div class="bg-green-100 text-green-800 p-3 rounded mb-4">Project added successfully!</div>';
        } catch (Exception $e) {
            $message = '<div class="bg-red-100 text-red-800 p-3 rounded mb-4">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    
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

    <div class="bg-white dark:bg-dark-card p-8 rounded-2xl shadow-xl w-full max-w-2xl mx-4 transition-colors duration-200 border border-gray-200 dark:border-gray-600">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold mb-2 text-gray-800 dark:text-white">Add New Project</h1>
                <p class="text-gray-600 dark:text-gray-400">Create a new project for your portfolio</p>
            </div>
            <a href="index.php" class="text-gray-600 dark:text-gray-400 hover:underline font-medium px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Projects
            </a>
        </div>
        
        <?= $message ?>
        
        <form method="post" enctype="multipart/form-data" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Title *</label>
                    <input type="text" name="title" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" required>
                </div>
                <div>
                    <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Project URL</label>
                    <input type="text" name="project_url" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder="https://example.com">
                </div>
            </div>
            
            <div>
                <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Short Description</label>
                <textarea name="description" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" rows="3" placeholder="Brief description of your project"></textarea>
            </div>
            
            <div>
                <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Long Description</label>
                <textarea name="long_description" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" rows="6" placeholder="Detailed description of your project, technologies used, challenges faced, etc."></textarea>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Image Upload</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Upload an image file (JPG, PNG, GIF)</p>
                </div>
                <div>
                    <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Or Image URL</label>
                    <input type="text" name="image_url" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder="assets/myimg.jpg">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Or provide a URL to an image</p>
                </div>
            </div>
            
            <div>
                <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Tags</label>
                <input type="text" name="tags" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder="HTML, CSS, JavaScript, React">
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Separate tags with commas (e.g., HTML, CSS, JavaScript)</p>
            </div>
            
            <div class="flex gap-4 pt-4">
                <button type="submit" class="btn-primary px-8 py-3">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Project
                </button>
                <a href="index.php" class="text-gray-600 dark:text-gray-400 hover:underline font-medium px-8 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="../js/dark-mode.js"></script>
</body>
</html> 