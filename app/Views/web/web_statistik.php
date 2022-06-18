<?= $this->extend("web/_template/index") ?>

<?= $this->section("page-content") ?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-5 offset-lg-7 my-3">
                        <form action="" method="post">
                            <div class="input-group">
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="bidang">
                                        <option selected disabled value="">Pilih Bidang</option>
                                        <option value="agama">Agama</option>
                                        <option value="pekerjaan">Pekerjaan</option>
                                        <option value="pendidikan">Pendidikan</option>
                                        <option value="perkawinan">Perkawinan</option>
                                    </select>
                                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </form>
        
                    </div>
                    
                    <div class="col-md-12">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"><?= $this->include('web/_template/_sidebar') ?></div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>