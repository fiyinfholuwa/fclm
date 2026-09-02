<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Ministry Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Give+You+Glory&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-orange: #f17e28;
            --brand-blue: #0c7bb8;
            --brand-gold: #b8a168;
            --brand-flame: #ff8c00;
            --brand-bg: #fef9f3;
            --brand-dark: #2b2b2b;
            --brand-red: #e63946;
            --brand-green: #2a9d8f;
            --brand-purple: #7209b7;
            --brand-indigo: #3a0ca3;
            --sidebar-width: 250px;
            --header-height: 70px;
        }

        *{
   font-family: "Montserrat", sans-serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f7fa;
            color: var(--brand-dark);
        }

        /* Login Page Styles */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--brand-blue) 0%, var(--brand-indigo) 100%);
            padding: 20px;
        }

        .login-box {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            padding: 40px;
            text-align: center;
        }

        .login-logo {
            margin-bottom: 30px;
        }

        .login-logo i {
            font-size: 50px;
            color: var(--brand-blue);
            margin-bottom: 15px;
        }

        .login-logo h1 {
            color: var(--brand-dark);
            font-size: 28px;
            margin-bottom: 5px;
        }

        .login-logo p {
            color: #666;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--brand-dark);
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 14px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: var(--brand-blue);
            outline: none;
        }

        .btn {
            padding: 14px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-login {
            background-color: var(--brand-blue);
            color: white;
        }

        .btn-login:hover {
            background-color: #0a6aa0;
        }

        /* Dashboard Styles */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--brand-dark);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s;
            z-index: 100;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background-color: rgba(0, 0, 0, 0.2);
        }

        .sidebar-header h2 {
            font-size: 22px;
            color: var(--brand-gold);
        }

        .sidebar-header p {
            font-size: 14px;
            color: #aaa;
            margin-top: 5px;
        }

        .nav-links {
            padding: 20px 0;
        }

        .nav-item {
            list-style: none;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: #ddd;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--brand-orange);
        }

        .nav-link i {
            margin-right: 12px;
            font-size: 18px;
            width: 25px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all 0.3s;
        }

        /* Header */
        .header {
            height: var(--header-height);
            background-color: white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .menu-toggle {
            display: none;
            font-size: 22px;
            cursor: pointer;
            color: var(--brand-dark);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--brand-blue);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Content Area */
        .content {
            padding: 30px;
        }

        .page-title {
            margin-bottom: 30px;
            color: var(--brand-dark);
        }

        .page-title h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #666;
        }

        /* Cards */
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .card-title {
            font-size: 20px;
            color: var(--brand-dark);
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--brand-blue);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0a6aa0;
        }

        .btn-secondary {
            background-color: #f0f0f0;
            color: var(--brand-dark);
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background-color: #e0e0e0;
        }

        .btn-danger {
            background-color: var(--brand-red);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        .btn-success {
            background-color: var(--brand-green);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #258b7e;
        }

        .btn-warning {
            background-color: var(--brand-orange);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-warning:hover {
            background-color: #e06d1a;
        }

        .btn-small {
            padding: 6px 12px;
            font-size: 14px;
        }

        /* Tables */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: var(--brand-bg);
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: var(--brand-dark);
            border-bottom: 2px solid #eee;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-tract {
            background-color: rgba(242, 126, 40, 0.1);
            color: var(--brand-orange);
        }

        .badge-audio {
            background-color: rgba(12, 123, 184, 0.1);
            color: var(--brand-blue);
        }

        .badge-devotional {
            background-color: rgba(114, 9, 183, 0.1);
            color: var(--brand-purple);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        /* Forms */
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .image-preview {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 10px;
            border: 2px dashed #ddd;
            padding: 10px;
            display: none;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            gap: 10px;
        }

        .pagination-btn {
            padding: 8px 16px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .pagination-btn:hover {
            background-color: #f5f5f5;
        }

        .pagination-btn.active {
            background-color: var(--brand-blue);
            color: white;
            border-color: var(--brand-blue);
        }

        /* Contact Messages */
        .message-item {
            border-left: 4px solid var(--brand-blue);
            padding-left: 20px;
            margin-bottom: 25px;
        }

        .message-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .message-sender {
            font-weight: 600;
            color: var(--brand-dark);
        }

        .message-date {
            color: #888;
            font-size: 14px;
        }

        .message-content {
            color: #555;
            line-height: 1.6;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .stat-icon.slider {
            background-color: var(--brand-orange);
        }

        .stat-icon.publications {
            background-color: var(--brand-blue);
        }

        .stat-icon.messages {
            background-color: var(--brand-green);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background-color: white;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--brand-bg);
            border-radius: 10px 10px 0 0;
        }

        .modal-title {
            font-size: 22px;
            color: var(--brand-dark);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #777;
            transition: color 0.3s;
        }

        .modal-close:hover {
            color: var(--brand-red);
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        /* File Upload Styles */
        .file-upload-area {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 15px;
        }

        .file-upload-area:hover {
            border-color: var(--brand-blue);
            background-color: rgba(12, 123, 184, 0.05);
        }

        .file-upload-area i {
            font-size: 40px;
            color: var(--brand-blue);
            margin-bottom: 15px;
        }

        .file-upload-area p {
            color: #666;
            margin-bottom: 5px;
        }

        .file-upload-area span {
            color: #999;
            font-size: 14px;
        }

        .uploaded-files {
            margin-top: 15px;
        }

        .uploaded-file {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .uploaded-file i {
            color: var(--brand-green);
            margin-right: 10px;
        }

        .file-name {
            flex: 1;
            font-size: 14px;
        }

        .file-remove {
            color: var(--brand-red);
            cursor: pointer;
        }

        /* Tab Navigation */
        .tab-nav {
            display: flex;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }

        .tab-btn {
            padding: 12px 20px;
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 600;
            color: #777;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }

        .tab-btn.active {
            color: var(--brand-blue);
            border-bottom-color: var(--brand-blue);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .header {
                padding: 0 20px;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        /* Hide pages */
        .page {
            display: none;
        }

        .page.active {
            display: block;
        }
    </style>
</head>
<body>
   


    <!-- Dashboard (initially hidden) -->
    <div id="dashboard" class="dashboard-container" style="">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('home') }}">                <img style="height:80px; width:80px; border-radius:15px;" src="{{ asset('logo.jpg') }}" alt="Logo"/>
</a>
            </div>
            <ul class="nav-links">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" 
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('slider.view') }}" 
           class="nav-link {{ request()->routeIs('slider.view') ? 'active' : '' }}">
            <i class="fas fa-images"></i>
            <span>Home Slider</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('publication.view') }}" 
           class="nav-link {{ request()->routeIs('publication.view') ? 'active' : '' }}">
            <i class="fas fa-book"></i>
            <span>Publications</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('gallery.manage') }}" class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
            <i class="fas fa-image"></i><span>Gallery</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('outreach.manage') }}" class="nav-link {{ request()->routeIs('outreach.*') ? 'active' : '' }}">
            <i class="fas fa-hands-helping"></i><span>Community Outreach</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('messages.view') }}" 
           class="nav-link {{ request()->routeIs('messages.view') ? 'active' : '' }}">
            <i class="fas fa-envelope"></i>
            <span>Contact Messages</span>
        </a>
    </li>

    <li class="nav-item mt-6">
        <a href="{{ route('logout') }}" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="menu-toggle" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="user-info">
                    <div class="user-avatar">AA</div>
                    <div>
                        <div style="font-weight: 600;">Admin Account</div>
                        <div style="font-size: 14px; color: #777;">FCLM MINISTRY</div>
                    </div>
                </div>
            </header>
@yield('content')
    </div>

    <script>
        // Data Storage (In a real app, this would be on a server)
        let sliderData = [
            { id: 1, title: "Welcome to Our Church", subtitle: "Join us this Sunday", image: "https://images.unsplash.com/photo-1511895426328-dc8714191300?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80", order: 1, status: "active", link: "" },
            { id: 2, title: "Bible Study Groups", subtitle: "Weekly meetings", image: "https://images.unsplash.com/photo-1534330207526-8e81f10ec6fc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80", order: 2, status: "active", link: "" },
            { id: 3, title: "Community Outreach", subtitle: "Serving our neighborhood", image: "https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80", order: 3, status: "active", link: "" },
            { id: 4, title: "Youth Ministry", subtitle: "For ages 13-18", image: "https://images.unsplash.com/photo-1511632765486-a01980e01a18?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80", order: 4, status: "inactive", link: "" }
        ];

        let publicationData = [
            { id: 1, title: "The Path to Salvation", category: "tract", author: "Pastor John", date: "2023-10-15", link: "https://example.com/tracts/salvation", description: "A guide to understanding salvation through Jesus Christ." },
            { id: 2, title: "Sunday Sermon: God's Grace", category: "audio", author: "Rev. Smith", date: "2023-10-14", link: "https://example.com/audio/grace-sermon", description: "Audio recording of last Sunday's sermon on God's grace." },
            { id: 3, title: "Daily Devotional: October 15", category: "devotional", author: "Ministry Team", date: "2023-10-15", link: "https://example.com/devotionals/oct15", description: "Daily devotional reading for October 15th." },
            { id: 4, title: "Understanding Baptism", category: "tract", author: "Pastor John", date: "2023-10-10", link: "https://example.com/tracts/baptism", description: "Explaining the meaning and significance of baptism." },
            { id: 5, title: "Worship Night Recording", category: "audio", author: "Worship Team", date: "2023-10-08", link: "https://example.com/audio/worship-night", description: "Full recording of our recent worship night." },
            { id: 6, title: "Daily Devotional: October 10", category: "devotional", author: "Ministry Team", date: "2023-10-10", link: "https://example.com/devotionals/oct10", description: "Daily devotional reading for October 10th." }
        ];

        let messageData = [
            { id: 1, name: "John Doe", email: "john@example.com", date: "2023-10-16", message: "Hello, I would like to know more about your Bible study groups. What time do they meet and is there any age restriction?", read: false },
            { id: 2, name: "Mary Johnson", email: "mary@example.com", date: "2023-10-15", message: "I attended your service last Sunday and really enjoyed it. Could you send me information about how to get involved in volunteer activities?", read: true },
            { id: 3, name: "Robert Smith", email: "robert@example.com", date: "2023-10-14", message: "I have a prayer request for my family. My wife is going through a difficult health situation and we would appreciate your prayers.", read: false },
            { id: 4, name: "Sarah Williams", email: "sarah@example.com", date: "2023-10-13", message: "Do you have any resources for new believers? I recently became a Christian and would like to learn more about the faith.", read: true }
        ];

        let recentActivity = [
            { type: "publication", action: "added", item: "new devotional publication", time: "2 hours ago" },
            { type: "message", action: "received", item: "contact message from John Doe", time: "5 hours ago" },
            { type: "slider", action: "updated", item: "home slider image", time: "yesterday" },
            { type: "publication", action: "added", item: "audio sermon link", time: "2 days ago" }
        ];

        // State variables
        let currentSliderId = null;
        let currentPublicationId = null;
        let currentDeleteId = null;
        let currentDeleteType = null;
        let currentMessageId = null;

        // DOM Elements
        const loginPage = document.getElementById('login-page');
        const dashboard = document.getElementById('dashboard');
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.querySelector('.sidebar');
        const navLinks = document.querySelectorAll('.nav-link');
        const pages = document.querySelectorAll('.page');
        
        // Modal elements
        const publicationModal = document.getElementById('publication-modal');
        const deleteModal = document.getElementById('delete-modal');
        const messageModal = document.getElementById('message-modal');
        
        // Buttons to open modals
        const addSliderBtns = document.querySelectorAll('#add-slider-btn, #add-slider-btn-2');
        const addPublicationBtns = document.querySelectorAll('#add-publication-btn, #add-publication-btn-2');
        
        // Close buttons
        const closePublicationModal = document.getElementById('close-publication-modal');
        const closeDeleteModal = document.getElementById('close-delete-modal');
        const closeMessageModal = document.getElementById('close-message-modal');
        const closeMessageBtn = document.getElementById('close-message-btn');
        
        // Cancel buttons
        const cancelSlider = document.getElementById('cancel-slider');
        const cancelPublication = document.getElementById('cancel-publication');
        const cancelDelete = document.getElementById('cancel-delete');
        
        // Save buttons
        const saveSlider = document.getElementById('save-slider');
        const savePublication = document.getElementById('save-publication');
        const confirmDelete = document.getElementById('confirm-delete');
        
        // Form elements
        const sliderForm = document.getElementById('slider-form');
        const publicationForm = document.getElementById('publication-form');
        
        // Other elements
        const filterCategory = document.getElementById('filter-category');
        const sliderUploadArea = document.getElementById('slider-upload-area');
        const sliderFileInput = document.getElementById('slider-file');
        const sliderPreview = document.getElementById('slider-preview');
        const sliderImageUrl = document.getElementById('slider-image-url');
        
        // Tab navigation
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');


        
        // Menu toggle for mobile
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

       

        
       
       
    </script>
</body>
</html>
