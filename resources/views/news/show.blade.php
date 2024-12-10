<div class="container my-5">
    <!-- Centered Row to Align Content in the Center -->
    <div class="row justify-content-center">
        <!-- News Card -->
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-3 news-card">
                <!-- Image Section -->
                @if ($news->image_url)
                    <img src="{{ asset('storage/' . $news->image_url) }}" class="card-img-top rounded-top" alt="{{ $news->title }}" style="height: 300px; object-fit: cover;">
                @else
                    <div class="card-img-top rounded-top d-flex justify-content-center align-items-center" style="height: 300px; background-color: #ccc;">
                        <span class="text-white" style="font-size: 1.5rem;">No Image Available</span>
                    </div>
                @endif

                <!-- Card Body -->
                <div class="card-body">
                    <!-- Title Section -->
                    <h1 class="card-title text-primary mb-4 news-title">{{ $news->title }}</h1>

                    <!-- Content Section -->
                    <p class="card-text text-muted news-content">
                        {{ $news->content }}
                    </p>

                    <hr>

                    <!-- Back Button -->
                    <a href="{{ route('news.index') }}" class="btn btn-primary back-btn mt-3 py-2 px-4 rounded-5">
                        <i class="bi bi-arrow-left-circle"></i> Ortga
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    /* Global Styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    /* Card Styling */
    .news-card {
        background-color: #ffffff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
    }

    /* Title Styling */
    .news-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #34495e;
        transition: color 0.3s ease;
    }

    .news-title:hover {
        color: #1abc9c;
    }

    /* Content Styling */
    .news-content {
        font-size: 1.2rem;
        line-height: 1.7;
        color: #555555;
    }

    /* Button Styling */
    .back-btn {
        font-size: 1.1rem;
        background-color: #3498db;
        color: white;
        text-transform: uppercase;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .back-btn:hover {
        background-color: #1abc9c;
        transform: scale(1.05);
    }

    .back-btn i {
        margin-right: 8px;
    }

    /* Image Section Styling */
    .card-img-top {
        border-bottom: 2px solid #ddd;
    }

    /* Card Body Styling */
    .card-body {
        padding: 2.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .news-title {
            font-size: 2.3rem;
        }

        .news-content {
            font-size: 1.1rem;
        }
    }

</style>
