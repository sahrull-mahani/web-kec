<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>

<div class="container mt-lg-5">
  <div class="row">
    <div class="col-lg-8 mb-5">

      <h2 class="text-center">Potensi<?= $bidang != null ? " $bidang" : '' ?></h2>
      <div class="divider-custom mb-5 text-center"></div>

      <div class="row">
        <div class="col-lg-5 offset-lg-7 my-3">

          <form action="" method="post">
            <div class="input-group">
              <div class="input-group mb-3">
                <select class="custom-select" name="bidang">
                  <option selected disabled value="">Pilih Bidang</option>
                  <option value="periwistiwa">Peristiwa</option>
                  <option value="kelautan">Kelautan</option>
                  <option value="perdagangan">Perdagangan</option>
                  <option value="pertanian">Pertanian</option>
                  <option value="industri">Industri</option>
                  <option value="pendidikan">Pendidikan</option>
                </select>
                <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i> Cari</button>
              </div>
            </div>
          </form>

        </div>

        <div class="col-md-12">
          <div class="row">
            <div class="col-md">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Potensi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($potensi)) : ?>
                    <tr>
                      <td colspan="4" class="align-midle text-center fw-bold fs-3">Kosong</td>
                    </tr>
                  <?php else : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($potensi as $potensi) : ?>
                      <tr>
                        <th scope="row" class="align-middle"><?= $no++ ?></th>
                        <td class="align-middle"><?= ucwords($potensi->judul) ?></td>
                        <td class="align-middle"><?= substr(ucfirst(strip_tags($potensi->isi_potensi)), 0, 60) . "..." ?></td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">detail</button>
                        </td>
                      </tr>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?= ucwords($potensi->judul) ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <?= $potensi->isi_potensi ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach ?>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 mb-5">
    <?= $this->include("web/_template/_sidebar") ?>
  </div>
</div>
</div>

<?= $this->endSection() ?>