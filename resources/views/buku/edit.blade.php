<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit Data Buku</h2>
    <hr>
    <form action="/buku/{{ $buku['id'] }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="judul" value="{{ $buku['judul'] }}" required><br>
        <input type="number" name="harga" value="{{ $buku['harga'] }}" required><br>
        <select name="kategori" id="" required>
            <option>Pilih Kategori</option>
            <option value="Self Improvment" {{ $buku['kategori']=='Self Improvment' ? 'selected': ''}}>Self Improvment</option>
            <option value="Bacaan" {{ $buku['kategori']=='bacaan' ? 'selected': ''}}>Bacaan</option>
            <option value="Teknologi" {{ $buku['kategori']=='teknologi' ? 'selected': ''}}>Teknologi</option>
        </select><br>
        <button type="submit">Simpan</button>
        <button type="reset">Refresh</button>
    </form>
</body>
</html>