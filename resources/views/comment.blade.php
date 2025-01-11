<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<body>
	<div class="mb-5">
            <div class="card shadow-lg border-0">
                <!-- Image Section -->
                @if ($ns->image_url)
                    <img src="{{ asset('storage/' . $ns->image_url) }}"  alt="{{ $ns->title }}" height="500" width="600" style="margin-left: auto; margin-right: auto;">
                @else
                    <div class="d-flex justify-content-center align-items-center bg-dark text-white" style="height: 400px;">
                        <span style="font-size: 1.5rem;">No Image Available</span>
                    </div>
                @endif

                <!-- Content Section -->
                <div class="card-body" >
                    <h2 class="text-primary fw-bold" style="font-size: 2rem;">{{ $ns->title }}</h2>
                    <p class="text-muted mt-3" style="font-size: 1.1rem;">
                        {{ Str::limit($ns->content, 300, '...') }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('news.show', $ns->id) }}" class="btn btn-primary-custom">
                            <i class="bi bi-eye"></i> Batafsil O'qish
                        </a>
                    </div>

                    <!-- PDF Document Link -->
                    @if ($ns->document)
                        <div class="mt-4">
                            <a href="{{ asset('storage/' . $ns->document) }}" class="btn btn-success" target="_blank">
                                <i class="bi bi-file-earmark-pdf"></i> PDF Faylni Ochish
                            </a>
                        </div>
                    @endif
                </div>


        @foreach($cs as $c)
        	<div style="margin-left: 20px;"> @ {{$c->user->name}} -- {{$c->commend}}</div>
        	<hr>
        @endforeach

        <form method="POST" action="{{ route('storeComment') }}" style="margin-left: 20px;">
        	@csrf
        	<input type="text" name="id" style="display: none;" value="{{$id}}">
        	<input type="text" name="comment" placeholder="write a comment">
        	<input type="submit" name="submit">
        </form>
</body>
</html>