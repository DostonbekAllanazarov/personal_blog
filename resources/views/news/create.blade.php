<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yangilik Qo'shish</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 100px;
        }

        h1 {
            color: #2c3e50;
        }

        /* Input and Textarea Styles */
        .form-control {
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 16px;
        }

        /* File Input Styling */
        input[type="file"] {
            padding: 10px 15px;
            background-color: #eaf5ff;
            border: 2px solid #4CAF50;
            border-radius: 10px;
        }

        input[type="file"]:focus {
            border-color: #45a049;
            outline: none;
        }

        /* Select Dropdown Styling */
        select {
            padding: 12px 20px;
            font-size: 16px;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            background-color: #ffffff;
            transition: border-color 0.3s;
            width: 100%;
        }

        select:focus {
            border-color: #45a049;
            outline: none;
        }

        /* Button Styling */
        .btn {
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 30px;
            transition: background-color 0.3s;
        }

        .btn-success {
            background-color: #1abc9c;
            color: white;
        }

        .btn-success:hover {
            background-color: #16a085;
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        /* Card Styling */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background-color: #ffffff;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4 text-primary">Yangilik Qo'shish</h1>
    <div class="card shadow-sm" style="background-color: #f9f9f9; border: 1px solid #ddd;">
        <div class="card-body">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="row g-4">
                @csrf
                <!-- Image Upload Field -->
                <div class="col-md-12">
                    <label for="image_url" class="form-label text-dark fw-bold">Rasm Yuklash</label>
                    <input type="file" class="form-control border-primary" name="image_url" id="image_url" style="background-color: #eaf5ff;">
                </div>

                <!-- Title Field -->
                <div class="col-md-6">
                    <label for="title" class="form-label text-dark fw-bold">Sarlavha</label>
                    <input type="text" class="form-control border-success" id="title" name="title" placeholder="Yangilik sarlavhasini kiriting" style="background-color: #eaffea;" required>
                </div>

                <!-- Content Field -->
                <div class="col-md-6">
                    <label for="content" class="form-label text-dark fw-bold">Mazmun</label>
                    <textarea class="form-control border-info" id="content" name="content" rows="3" placeholder="Yangilik mazmunini kiriting" style="background-color: #e8f7ff;" required></textarea>
                </div>

                <!-- Document Upload Field -->
                <div class="col-md-12">
                    <label for="document" class="form-label text-dark fw-bold">Fayl Yuklash</label>
                    <input type="file" class="form-control border-primary" name="document" id="document" style="background-color: #eaf5ff;">
                </div>

                <!-- Visibility Selector -->
                <div class="col-md-12">
                    <label for="visibilitySelector" class="form-label text-dark fw-bold">Ko'rsatish Holati</label>
                    <select id="visibilitySelector" name="selector">
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-success px-5">Saqlash</button>
                    <a href="{{ route('news.index') }}" class="btn btn-secondary px-5">Ortga</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
