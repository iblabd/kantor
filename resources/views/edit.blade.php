<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Buat Pengumuman Baru</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <form action="{{ url('pengumuman/edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="card">
        <div class="card-header">
          Buat Baru
        </div>
        <div class="card-body">
          <h5 class="card-title">Silahkan Tulis Pengumuman Baru</h5>
          <label for="inputText" class="form-label">Isi Pengumuman</label>
          <input type="text" id="inputText" class="form-control">
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </form>
</body>

</html>
