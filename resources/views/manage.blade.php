<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .item-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: #fff;
        }

        .item-container img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
        }

        .item-info {
            flex-grow: 1;
        }

        .item-info h5 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .item-info p {
            font-size: 0.9rem;
            color: #555;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div style="display:flex; justify-content:center; align-items:center;">
        <div style="width:40%; margin-left:10px;"><a href="/">Orqaga</a></div>
        <div style="width:60%;"><h1>bloglarni boshqarish</h1></div>
    </div>
    
    @foreach($news as $item)
        <div class="container mt-5">
            <div class="item-container">
                <!-- Image -->
                <img src="{{ asset('storage/' . $item->image_url) }}" alt="Item Image">

                <!-- Title and Description -->
                <div class="item-info">
                    <h5>{{ $item->title }}</h5>
                    <p>{{ Str::limit($item->content, 100) }}</p>
                </div>

                <!-- Delete Button -->
                <a href="/delete/{{$item->id}}">Delete</a>
            </div>
        </div>
    @endforeach

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
