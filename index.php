<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - To-Do Task App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f1f1f1;
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            margin: 15px 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
        }

        .btn-outline:hover {
            background-color: white;
            color: #667eea;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.jpg" width="50" height="50" alt="">
            </a>
            <span class="navbar-brand mb-0 h1">To-Do Task App</span>
            <div class="ms-auto">
                <a href="login.php" class="btn btn-outline-light me-2">Login</a>
                <a href="register.php" class="btn btn-primary">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-3 mb-4">Organize Your Tasks Efficiently</h1>
            <p class="lead mb-5">A simple and powerful to-do task management application to help you stay organized and productive.</p>
            <div>
                <a href="register.php" class="btn btn-light btn-lg me-3">Get Started</a>
                <a href="login.php" class="btn btn-outline btn-lg">Login</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon">✓</div>
                        <h4>Create Tasks</h4>
                        <p> Easily add new tasks with title and description to keep track of what you need to do.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon">✎</div>
                        <h4>Edit Tasks</h4>
                        <p>Update and modify your tasks whenever needed to keep your list up to date.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon">🗑</div>
                        <h4>Delete Tasks</h4>
                        <p>Remove completed or unwanted tasks to keep your list clean and organized.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Why Choose To-Do Task App?</h2>
                    <p class="mt-3">Our application provides a simple and intuitive interface to manage your daily tasks. Stay organized, never miss a deadline, and increase your productivity.</p>
                    <ul class="list-unstyled">
                        <li>✓ Simple and user-friendly interface</li>
                        <li>✓ Track your daily tasks</li>
                        <li>✓ Mark tasks as complete</li>
                        <li>✓ Access from anywhere</li>
                    </ul>
                </div>
                <div class="col-md-6 text-center">
                    <div class="feature-card">
                        <h3>Start Managing Your Tasks Today!</h3>
                        <p class="mb-3">Join thousands of users who are already organized with To-Do Task App.</p>
                        <a href="register.php" class="btn btn-primary">Create Free Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p class="mb-0">&copy; 2026 To-Do Task App. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>