@section('main')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengumuman Kantor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Buat Pengumuman</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/pengumuman">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/create">Buat Pengumuman</a>
              </li>
          </div>
        </div>
      </nav>
      <div class="col-lg-8">
      <div class="container">
        <form method="POST" action="/pengumuman">
            @csrf
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control" id="judul" value="{{$pengumuman->judul}}">
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">isi</label>
                <input type="text" class="form-control" id="isi" value="{{$pengumuman->isi}}">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </body>
</html>
@endsection
