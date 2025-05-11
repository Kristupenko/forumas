<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $topic->title }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #000;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .meta {
            font-size: 12px;
            margin-bottom: 10px;
        }
        .post {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .author {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>{{ $topic->title }}</h1>
    <p class="meta">Sukurta: {{ $topic->created_at->format('Y-m-d H:i') }}</p>

    @foreach ($topic->posts as $post)
        <div class="post">
            <p class="author">{{ $post->user->name }} parašė:</p>
            <p>{!! nl2br(e($post->body)) !!}</p>
            <p class="meta">Įrašas: {{ $post->created_at->format('Y-m-d H:i') }}</p>
        </div>
    @endforeach
</body>
</html>
