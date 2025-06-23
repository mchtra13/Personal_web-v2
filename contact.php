<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak Saya</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Personal Web</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
      <li class="nav-item"><a class="nav-link" href="gallery.php">Galeri</a></li>
      <li class="nav-item"><a class="nav-link" href="about.php">Tentang</a></li>
      <li class="nav-item"><a class="nav-link active" href="contact.php">Kontak</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
  <h2>Hubungi Saya</h2>
  <p>Silakan hubungi saya melalui email di: <strong>emailkamu@example.com</strong></p>
  <p>Atau isi formulir ini (tidak akan dikirim, hanya tampilan saja):</p>
  
  <form>
    <input type="text" name="name" class="form-control mb-3" placeholder="Nama Anda" required>
    <input type="email" name="email" class="form-control mb-3" placeholder="Email Anda" required>
    <textarea name="message" class="form-control mb-3" rows="5" placeholder="Pesan Anda" required></textarea>
    <button type="submit" class="btn btn-primary" disabled>Form ini tidak aktif</button>
  </form>
</div>
</body>
</html>
