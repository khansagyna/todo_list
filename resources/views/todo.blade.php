<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="{{ asset('css/todo.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg fixed-top ">
        <div class="container ">
           
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
              <li class="nav-item">
                <a class="nav-link text-black" aria-current="page" href="#home">Halaman Utama</a>
              </li>
              <li class="nav-item ms-4">
                <a class="nav-link text-black" href="#fitur">Fitur</a>
              </li>
              <li class="nav-item ms-4">
                <a class="nav-link active text-black" href="#testimonial">Testimonial</a>
              </li>
              <li class="nav-item ms-4">
                <a class="nav-link active text-black" href="daftarlayanan.html">Daftar Layanan</a>
              </li>
              <li class="nav-item ms-4">
                <a class="nav-link active text-black" href="#contact">Kontak Kami</a>
              </li>
              <li class="nav-item ms-4">
                <a href="login.html" class="login nav-link active text-white btn rounded-pill ps-5 pe-5">Masuk</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <div class="container mt-5 pt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">📝 To-Do List</h1>

                <form method="POST" action="/todo" class="d-flex mb-4">
                    @csrf
                    <input type="text" name="task" class="form-control me-2" placeholder="Tulis tugas..." required>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>

                <ul class="list-group">
                    @forelse ($todos as $todo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $todo->task }}
                            <!-- Tombol hapus bisa ditambahkan di sini nanti -->
                        </li>
                    @empty
                        <li class="list-group-item text-muted text-center">Belum ada tugas.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

</body>
</html>
