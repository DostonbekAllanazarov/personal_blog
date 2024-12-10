<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yangiliklar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #1abc9c;
        }
        .navbar-brand {
            font-size: 1.8rem;
            color: white;
        }
        .navbar a {
            color: white !important;
            font-size: 1.1rem;
        }
        .navbar a:hover {
            color: #f39c12 !important;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card img {
            max-height: 400px;
            object-fit: cover;
        }
        .card-body {
            background-color: #ffffff;
            padding: 2rem;
        }
        .btn-custom {
            background-color: #1abc9c;
            color: white;
            font-size: 1.2rem;
            padding: 0.6rem 1.5rem;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #16a085;
        }
        .btn-primary-custom {
            background-color: #3498db;
            color: white;
            font-size: 1.1rem;
            padding: 0.7rem 1.5rem;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }
        .btn-primary-custom:hover {
            background-color: #2980b9;
        }
        .alert-warning-custom {
            background-color: #fcf8e3;
            color: #8a6d3b;
            font-size: 1.5rem;
            padding: 2rem;
        }
        .container {
            padding-top: 100px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Yangiliklar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(Auth::user())
                    @if(Auth::user()->hasRole('admin'))
                        <li class="nav-item">
                            <a class="nav-link" href="/manage">Manage Blogs</a>
                        </li>    
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/mine">Bloglarim</a>
                    </li>
                    <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="margin-top:8px;">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                @else
                <li class="nav-item">
                        <a class="nav-link" href="/login">login</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.index') }}">Bosh Sahifa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.create') }}">Yangilik Qo'shish</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container py-5" style="background-color: #f8f9fa;">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #2c3e50; font-size: 3rem;">Yangiliklar</h1>
        <p class="text-muted" style="font-size: 1.2rem;">O'z yangiliklaringizni biz bilan o'rtoqlashing!</p>
    </div>

    <!-- Add News Button -->
    <div class="text-end mb-5">
        <a href="{{ route('news.create') }}" class="btn btn-custom">
            <i class="bi bi-plus-circle"></i> Yangi Yangilik Qo'shish
        </a>
    </div>

    <!-- News List -->
    @forelse ($news as $item)
        <div class="mb-5">
            <div class="card shadow-lg border-0">
                <!-- Image Section -->
                @if ($item->image_url)
                    <img src="{{ asset('storage/' . $item->image_url) }}" class="card-img-top" alt="{{ $item->title }}">
                @else
                    <div class="d-flex justify-content-center align-items-center bg-dark text-white" style="height: 400px;">
                        <span style="font-size: 1.5rem;">No Image Available</span>
                    </div>
                @endif

                <!-- Content Section -->
                <div class="card-body">
                    <h2 class="text-primary fw-bold" style="font-size: 2rem;">{{ $item->title }}</h2>
                    <p class="text-muted mt-3" style="font-size: 1.1rem;">
                        {{ Str::limit($item->content, 300, '...') }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary-custom">
                            <i class="bi bi-eye"></i> Batafsil O'qish
                        </a>
                    </div>

                    <!-- PDF Document Link -->
                    @if ($item->document)
                        <div class="mt-4">
                            <a href="{{ asset('storage/' . $item->document) }}" class="btn btn-success" target="_blank">
                                <i class="bi bi-file-earmark-pdf"></i> PDF Faylni Ochish
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <!-- Empty State -->
        <div class="alert alert-warning-custom text-center">
            <i class="bi bi-info-circle"></i> Hozircha yangiliklar mavjud emas.
        </div>
    @endforelse
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
