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
            background-color: #f0f2f5;
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
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            max-height: 400px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body {
            background-color: #ffffff;
            padding: 2rem;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .card-body h2 {
            font-size: 2rem;
            color: #2c3e50;
            font-weight: bold;
        }

        .card-body p {
            color: #7f8c8d;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .btn-custom, .btn-success, .btn-primary-custom {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #1abc9c;
            color: white;
        }

        .btn-custom:hover {
            background-color: #16a085;
        }

        .btn-primary-custom {
            background-color: #3498db;
            color: white;
        }

        .btn-primary-custom:hover {
            background-color: #2980b9;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .alert-warning-custom {
            background-color: #fcf8e3;
            color: #8a6d3b;
            font-size: 1.5rem;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .container {
            padding-top: 100px;
        }

        /* Centering the container */
        .news-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            height:auto;
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
<div class="container py-5" style="background-color: #f0f2f5;">
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
        <div class="news-item mb-5">
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
                    <h2 class="text-primary fw-bold">{{ $item->title }}</h2>
                    <p class="text-muted mt-3">
                        {{ Str::limit($item->content, 300, '...') }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary-custom">
                            <i class="bi bi-eye"></i> Batafsil O'qish
                        </a>
                    </div>

                    <!-- PDF Document Link -->
                    @if ($item->document && Storage::exists('public/' . $item->document))
                        <div class="mt-4">
                            <a href="{{ asset('storage/' . $item->document) }}" class="btn btn-success" target="_blank">
                                <i class="bi bi-file-earmark-pdf"></i> PDF Faylni Ochish
                            </a>
                        </div>
                    @endif
                </div>
            <div style="display:flex; justify-content: space-around;"> 
            <a href="/delete/{{$item->id}}">Delete</a>
            <a href="/edit/{{$item->id}}">Edit</a>
        </div>
            </div>
        
        </div>
        

    @empty
        <!-- Empty State -->
        <div class="alert alert-warning-custom text-center">
            <i class="bi bi-info-circle"></i> Hozircha postingiz yo'q
        </div>
    @endforelse
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
