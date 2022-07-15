<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <select name="filter" id="filter" class="form-select">
                        <option value="agama">Agama</option>
                        <option value="pekerjaan">Pekerjaan</option>
                        <option value="pendidikan">Pendidikan</option>
                        <option value="perkawinan">Perkawinan</option>
                    </select>
                    <div class="col-md-12">
                        <h5 class="my-4" id="judul"></h5>
                        <canvas id="statistik" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"><?= $this->include('web/_template/_sidebar') ?></div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>