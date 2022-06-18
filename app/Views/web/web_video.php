<?= $this->extend('web/index'); ?>
<?php $session = \Config\Services::session(); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <h3 class="text-center mt-3">#Video</h3>
    <div class="row" style="min-height: 100vh;">
        <?php if (empty($items)) : ?>
            <div class="col-12">
                <h1 class="text-center mt-5">Data Kosong</h1>
            </div>
        <?php else : ?>
            <?php foreach ($items as $key => $item) : ?>
                <?php $key++ ?>
                <div class="<?= $key > 3 && $key % 4 == 0 ? 'col-lg-12' : 'col-md' ?>">
                    <section class="mt-5">
                        <div class="container img-cover rounded-3" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= ucwords($item->judul) ?>">
                            <img class="videoThumb rounded-3" width="100%" src="http://i1.ytimg.com/vi/<?= $item->link ?>/maxresdefault.jpg" data-bs-toggle="modal" data-bs-target="#example<?= $item->id ?>">
                        </div>
                    </section>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="example<?= $item->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="row mt-4 mr-5">
                        <div class="col-1 offset-11">
                            <span role="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times text-white bg-danger rounded-circle" style="padding: 5px 8px; cursor: pointer;"></i></span>
                        </div>
                    </div>
                    <div class="modal-dialog modal-xl px-0">
                        <div class="modal-content">
                            <iframe src="https://youtube.com/embed/<?= $item->link ?>" class="rounded-top" frameborder="0" width="100%" height="400"></iframe>
                            <div class="bg-white rounded-bottom px-3">
                                <p class="mt-3 mb-0"><i class="fa fa-user"></i>&nbsp; Uploader : <?= "$item->nama_user | <i class='fa fa-calendar-alt'></i>&nbsp; $item->updated_at"  ?></p>
                                <hr class="hr">
                                <div class=""><?= $item->deskripsi ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>

<?= $this->endSection(); ?>