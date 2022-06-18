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
                        <?= form_open_multipart('berita/save', array('class' => 'mode2 form-post-berita')); ?>
                        <div class="card-body">
                            <div class="form-group item">
                                <label for="judul">Judul Postingan</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group item">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="userfile" onchange="previewImg(this)">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 center">
                                    <img alt="User Image" src="<?= site_url('assets/dist/img/Placeholder.jpg') ?>" style="max-height: 100px;" class="mb-3 img-fluid img-thumbnail img-preview" />
                                </div>
                            </div>
                            <div class="form-group item">
                                <label for="redaksi_foto">Redaksi Foto</label>
                                <input type="text" class="form-control" id="redaksi_foto" name="redaksi_foto" value="<?= (isset($get->redaksi_foto)) ? $get->redaksi_foto : ''; ?>" placeholder="Redaksi Foto" />
                            </div>
                            <div class="form-group item">
                                <label for="body">Isi Berita</label>
                                <textarea name="isi" id="isi" ><?= (isset($get->body)) ? $get->body : ''; ?></textarea>
                            </div>
                            <div class="form-group item">
                                <label for="tag">Tag Berita</label>
                                <?= form_dropdown('tag[]', '', (isset($get->tag)) ? $get->tag : '', 'class="form-control tag-with-input select2-purple" multiple="" data-placeholder="Tag" style="width: 100%;" tabindex="-1" aria-hidden="true"') ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
                            <input type='hidden' name='action' value='<?= (isset($action)) ? $action : 'insert'; ?>' />
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>