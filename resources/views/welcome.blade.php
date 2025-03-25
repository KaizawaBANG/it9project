<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GrociPOS - Elegant Grocery Management</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary: #2ecc71;
            --primary-dark: #27ae60;
            --text-dark: #2c3e50;
            --background-light: #f4f6f7;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            background-color: var(--background-light);
        }
        .elegant-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .elegant-nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            z-index: 100;
        }
        .elegant-nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }
        .elegant-logo {
            display: flex;
            align-items: center;
            font-weight: 700;
            color: var(--text-dark);
        }
        .elegant-logo-icon {
            color: var(--primary);
            margin-right: 10px;
            font-size: 28px;
        }
        .elegant-nav-links {
            display: flex;
            gap: 25px;
        }
        .elegant-nav-link {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
        }
        .elegant-nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: width 0.3s ease;
        }
        .elegant-nav-link:hover {
            color: var(--primary);
        }
        .elegant-nav-link:hover::after {
            width: 100%;
        }
        .elegant-hero {
            display: flex;
            align-items: center;
            min-height: 100vh;
            padding-top: 80px;
            background: linear-gradient(135deg, rgba(46,204,113,0.05), rgba(255,255,255,0.2));
        }
        .elegant-hero-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        .elegant-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            line-height: 1.2;
        }
        .elegant-hero-subtitle {
            font-size: 1.2rem;
            color: rgba(44,62,80,0.7);
            margin-bottom: 30px;
        }
        .elegant-cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .elegant-btn {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .elegant-btn-primary {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 10px 20px rgba(46,204,113,0.2);
        }
        .elegant-btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(46,204,113,0.3);
        }
        .elegant-btn-secondary {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        .elegant-btn-secondary:hover {
            background-color: var(--primary);
            color: white;
        }
        .elegant-features {
            padding: 100px 0;
            background-color: white;
        }
        .elegant-features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        .elegant-feature-card {
            background-color: var(--background-light);
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .elegant-feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        .elegant-feature-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 20px;
        }
        .elegant-feature-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
        }
        @media (max-width: 768px) {
            .elegant-hero-title {
                font-size: 2.5rem;
            }
            .elegant-features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
   
    <nav class="elegant-nav">
        <div class="elegant-container elegant-nav-content">
            <div class="elegant-logo">
                <span class="material-icons-round elegant-logo-icon">shopping_cart</span>
                GrociPOS
            </div>
            <div class="elegant-nav-links">
                @if (Route::has('login'))
                    @auth('web')
                        <a href="{{ url('/dashboard') }}" class="elegant-nav-link">Dashboard</a>
                        <a href="{{ route('logout') }}" class="elegant-nav-link">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="elegant-nav-link">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="elegant-nav-link">Register</a>
                        @endif
                    @endauth

                    @auth('admin')
                        <a href="{{ url('/admin/dashboard') }}" class="elegant-nav-link">Admin Panel</a>
                    @else
                        <a href="{{ route('admin.login') }}" class="elegant-nav-link">Admin Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <section class="elegant-hero">
        <div class="elegant-container elegant-hero-content">
            <h1 class="elegant-hero-title">Elevate Your Grocery Business Management</h1>
            <p class="elegant-hero-subtitle">Streamline operations, optimize inventory, and drive growth with our intelligent point of sale system designed for modern grocery stores.</p>
            <div class="elegant-cta-buttons">
                <a href="{{ route('register') }}" class="elegant-btn elegant-btn-primary">Get Started</a>
                <a href="#features" class="elegant-btn elegant-btn-secondary">Learn More</a>
            </div>
        </div>
    </section>


    <section id="features" class="elegant-features">
        <div class="elegant-container">
            <div class="elegant-features-grid">
                <div class="elegant-feature-card">
                    <div class="elegant-feature-icon">
                        <span class="material-icons-round">receipt</span>
                    </div>
                    <h3 class="elegant-feature-title">Swift Checkout</h3>
                    <p>Accelerate customer transactions with our intuitive, user-friendly interface.</p>
                </div>
                <div class="elegant-feature-card">
                    <div class="elegant-feature-icon">
                        <span class="material-icons-round">inventory</span>
                    </div>
                    <h3 class="elegant-feature-title">Smart Inventory</h3>
                    <p>Maintain precise stock levels and receive intelligent low-stock alerts.</p>
                </div>
                <div class="elegant-feature-card">
                    <div class="elegant-feature-icon">
                        <span class="material-icons-round">analytics</span>
                    </div>
                    <h3 class="elegant-feature-title">Advanced Analytics</h3>
                    <p>Gain deep insights into sales trends and product performance.</p>
                </div>
            </div>
        </div>
    </section>

    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>