<!doctype html>
<html lang="en">
sakfsaf

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <div class="container py-5">
    <div class="row text-center">
      <h1>Daftar Produk</h1>
    </div>
    <div class="row mb-3">
      <div class="col">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</a>
      </div>
    </div>
    <div class="row mb-3">
      <?php if (session()->getFlashData('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashData('success') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif ?>
    </div>
    <div class="row">
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col" style="width: 50%">Keterangan</th>
            <th scope="col" colspan="2">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($listProduk as $p) : ?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <td><?= $p['nama_produk'] ?></td>
              <td><?= $p['harga'] ?></td>
              <td><?= $p['jumlah'] ?></td>
              <td><?= $p['keterangan'] ?></td>
              <td><a href="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
              <td>
                <form action="/delete/<?= $p['id'] ?>" method="post">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin menghapus data?')"><i class="fa-solid fa-trash"></i></button>
                </form>
              </td>
            </tr>

            <!-- Modal tambah-->
            <div class="modal fade" id="editModal<?= $p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="/update/<?= $p['id'] ?>" method="post">
                    <div class="modal-body">
                      <?= csrf_field() ?>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="namaProduk" name="nama_produk" value="<?= $p['nama_produk'] ?>">
                        <label for="namaProduk">Nama Produk</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="hargaProduk" name="harga" value="<?= $p['harga'] ?>">
                        <label for="hargaProduk">Harga Produk</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="jmlProduk" name="jumlah" value="<?= $p['jumlah'] ?>">
                        <label for="jmlProduk">Jumlah Produk</label>
                      </div>
                      <div class="form-floating mb-3">
                        <textarea class="form-control" id="keteranganTextarea" name="keterangan" style="height: 150px"><?= $p['keterangan'] ?></textarea>
                        <label for="keteranganTextarea">Keterangan</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php
            $i++;
          endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Modal tambah-->
  <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/insert" method="post">
          <div class="modal-body">
            <?= csrf_field() ?>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="namaProduk" name="nama_produk">
              <label for="namaProduk">Nama Produk</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="hargaProduk" name="harga">
              <label for="hargaProduk">Harga Produk</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="jmlProduk" name="jumlah">
              <label for="jmlProduk">Jumlah Produk</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" id="keteranganTextarea" name="keterangan" style="height: 150px"></textarea>
              <label for="keteranganTextarea">Keterangan</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>