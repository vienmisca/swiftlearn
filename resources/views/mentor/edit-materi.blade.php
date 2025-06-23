<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Materi</title>
</head>
<body>
    <h1>Edit Materi</h1>

    <form action="{{ route('mentor.update.materi', $materi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Judul:</label>
        <input type="text" name="judul" value="{{ $materi->judul }}">

        <label>Deskripsi:</label>
        <textarea name="deskripsi">{{ $materi->deskripsi }}</textarea>

        <button type="submit">Update</button>
    </form>
</body>
</html>
