<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
require_once '../php/config.php';

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    try {
        $pdo = get_pdo();
        $pdo->prepare('DELETE FROM projects WHERE id = ?')->execute([$id]);
        $message = '<div class="bg-green-100 text-green-800 p-3 rounded mb-4">Project deleted.</div>';
    } catch (Exception $e) {
        $message = '<div class="bg-red-100 text-red-800 p-3 rounded mb-4">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $id = intval($_POST['edit_id']);
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $long_description = $_POST['long_description'] ?? '';
    $project_url = $_POST['project_url'] ?? '';
    $tags = $_POST['tags'] ?? '';
    $image_url = $_POST['image_url'] ?? '';
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
    }
    if (!$message) {
        try {
            $pdo = get_pdo();
            $stmt = $pdo->prepare('UPDATE projects SET title=?, description=?, long_description=?, image_url=?, project_url=?, tags=? WHERE id=?');
            $stmt->execute([$title, $description, $long_description, $image_url, $project_url, $tags, $id]);
            $message = '<div class="bg-green-100 text-green-800 p-3 rounded mb-4">Project updated.</div>';
        } catch (Exception $e) {
            $message = '<div class="bg-red-100 text-red-800 p-3 rounded mb-4">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}

// Fetch all projects
try {
    $pdo = get_pdo();
    $projects = $pdo->query('SELECT * FROM projects ORDER BY created_at DESC')->fetchAll();
} catch (Exception $e) {
    $projects = [];
    $message = '<div class="bg-red-100 text-red-800 p-3 rounded mb-4">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
}

// If editing, fetch project
$edit_project = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    foreach ($projects as $p) {
        if ($p['id'] == $id) {
            $edit_project = $p;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects</title>
    
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
<body class="min-h-screen transition-colors duration-200">
    <!-- Back to home button -->
    <a href="../index.php" class="fixed top-6 left-6 btn-primary inline-flex items-center space-x-2 z-50 animate-bounce-in">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span>Back to Home</span>
    </a>

    <div class="max-w-7xl mx-auto p-6 relative">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold mb-2 text-gray-800 dark:text-white">Manage Projects</h1>
                <p class="text-gray-600 dark:text-gray-400">Add, edit, and manage your portfolio projects</p>
            </div>
            <div class="flex gap-4">
                <a href="add_project.php" class="btn-primary inline-flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Add New Project</span>
                </a>
                <a href="?logout=1" class="bg-white dark:bg-dark-card text-gray-700 dark:text-gray-300 px-6 py-3 rounded-lg shadow-lg hover:shadow-xl font-medium transition-all duration-200 border border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </a>
            </div>
        </div>

        <!-- Messages -->
        <?= $message ?? '' ?>

        <!-- Edit Form -->
        <?php if ($edit_project): ?>
            <div class="mb-8 bg-white dark:bg-dark-card p-8 rounded-2xl shadow-xl transition-colors duration-200 border border-gray-200 dark:border-gray-600">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Project
                </h2>
                <form method="post" enctype="multipart/form-data" class="space-y-6">
                    <input type="hidden" name="edit_id" value="<?= $edit_project['id'] ?>">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" name="title" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" value="<?= htmlspecialchars($edit_project['title']) ?>" required>
                        </div>
                        <div>
                            <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Project URL</label>
                            <input type="text" name="project_url" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" value="<?= htmlspecialchars($edit_project['project_url']) ?>">
                        </div>
                    </div>
                    <div>
                        <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Short Description</label>
                        <textarea name="description" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" rows="2"><?= htmlspecialchars($edit_project['description']) ?></textarea>
                    </div>
                    <div>
                        <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Long Description</label>
                        <textarea name="long_description" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" rows="4"><?= htmlspecialchars($edit_project['long_description'] ?? '') ?></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Current Image</label>
                            <?php if ($edit_project['image_url']): ?>
                                <img src="../<?= htmlspecialchars($edit_project['image_url']) ?>" alt="" class="h-32 w-32 object-cover rounded-lg mb-2 border border-gray-200 dark:border-gray-600">
                            <?php else: ?>
                                <div class="h-32 w-32 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center border border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-500 dark:text-gray-400 text-sm">No image</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Upload New Image</label>
                            <input type="file" name="image_file" accept="image/*" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>
                    </div>
                    <div>
                        <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Or Image URL</label>
                        <input type="text" name="image_url" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" value="<?= htmlspecialchars($edit_project['image_url']) ?>">
                    </div>
                    <div>
                        <label class="block font-medium mb-3 text-gray-700 dark:text-gray-300">Tags</label>
                        <input type="text" name="tags" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" value="<?= htmlspecialchars($edit_project['tags']) ?>">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Separate tags with commas</p>
                    </div>
                    <div class="flex gap-4">
                        <button type="submit" class="btn-primary px-6 py-3">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Save Changes
                        </button>
                        <a href="index.php" class="text-gray-600 dark:text-gray-400 hover:underline font-medium px-6 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">Cancel</a>
                    </div>
                </form>
            </div>
        <?php endif; ?>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($projects as $project): ?>
                <div class="project-card p-6 transition-all duration-200 hover-lift">
                    <?php if ($project['image_url']): ?>
                        <img src="../<?= htmlspecialchars($project['image_url']) ?>" alt="" class="project-image h-48 w-full object-cover rounded-lg mb-4">
                    <?php endif; ?>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800 dark:text-white"><?= htmlspecialchars($project['title']) ?></h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4 line-clamp-2"><?= htmlspecialchars($project['description']) ?></p>
                    <?php if ($project['tags']): ?>
                        <div class="mb-4 flex flex-wrap gap-2">
                            <?php foreach (explode(',', $project['tags']) as $tag): ?>
                                <span class="tag text-xs"><?= htmlspecialchars(trim($tag)) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="flex justify-between items-center">
                        <?php if ($project['project_url']): ?>
                            <a href="<?= htmlspecialchars($project['project_url']) ?>" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-medium">View Project →</a>
                        <?php endif; ?>
                        <div class="flex gap-3">
                            <a href="?edit=<?= $project['id'] ?>" class="bg-blue-600 dark:bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-800 transition-colors text-sm font-medium">Edit</a>
                            <a href="?delete=<?= $project['id'] ?>" class="bg-red-600 dark:bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-700 dark:hover:bg-red-800 transition-colors text-sm font-medium" onclick="return confirm('Delete this project?');">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../js/dark-mode.js"></script>
</body>
</html> 