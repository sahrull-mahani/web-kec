<?= $this->extend("template_adminlte/index") ?>
<?= $this->section("page-content") ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $breadcome ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $breadcome ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $breadcome ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <?= form_open_multipart('potensi/save', array('class' => 'mode2 form-post-save')); ?>
                        <div class="card-body">
                            <div class="form-group item">
                                <label for="nama">Bidang Potensi</label>
                                <?php $defaults = array('' => '==Pilih Bidang==');
                                $options = array(
                                    'peristiwa' => 'peristiwa',
                                    'kelautan' => 'kelautan',
                                    'perdagangan' => 'perdagangan',
                                    'pertanian' => 'pertanian',
                                    'industri' => 'industri',
                                    'pendidikan' => 'pendidikan',
                                );
                                echo form_dropdown('bidang[]', $defaults + $options, (isset($get->bidang)) ? $get->bidang : '', 'class="form-control select2" id="bidang" required');
                                ?>
                            </div>
                            <div class="form-group item">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Potensi" required />
                            </div>
                            <input id="input-id" type="file" name="userfile[]" accept=".jpg, .png, image/jpeg, image/png" multiple>
                            <br>
                            <textarea name="isi" id="isi" cols="30" rows="10" class="text-area" placeholder="Jelaskan Potensi Yang Anda Masukan..."></textarea>
                        </div>
                        <div class="card-footer">
                            <input type='hidden' name='action' value="insert" />
                            <button type="submit" class="btn btn-primary btn-sub">Submit</button>
                            <button class="btn btn-primary btn-load d-none" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>