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
                            <h3 class="card-title">Data <?= $breadcome ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="toolbar">
                                <?php if (is_admin()) : ?>
                                <form action="<?= site_url("DataPindah/export"); ?>" method="post" class="form-inline">
                                    <div class="form-group mb-2">
                                        <input type="text" name="range-dateJP" id="range-dateJP" class="btn btn-primary"
                                            required />
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <select name="filter_desa" id="filter_desa"
                                            class="form-control custom-select select2">
                                            <option value="" default>Pilih Desa</option>
                                            <?php foreach ($desa as $row) : ?>
                                            <option value="<?= $row->id; ?>"><?= $row->nama_desa; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success mb-2">Excel</button>
                                </form>
                                <?php else : ?>
                                <!-- <a href="#" class="btn btn-success"><i class="nav-icon fas fa-upload"></i> Upload -->
                                </a>
                                <?php endif; ?>
                                <?php if (!is_admin()) : ?>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <input type="text" name="range-dateJP" id="range-dateJP"
                                        class="btn btn-primary d-none" />
                                </div>
                                <a href="post-datapindah"><button type="button" class="btn btn-primary"><i
                                            class="fa fa-plus"></i> Tambah</button></a>
                                <button type="button" class="btn btn-warning" id="single-edit" data-href="datapindah"
                                    method="edit" disabled><i class="fa fa-edit"></i> Update</button>
                                <button type="button" class="btn btn-danger" id="remove" disabled><i
                                        class="fa fa-trash"></i> Hapus</button>
                                <?php endif; ?>
                            </div>
                            <table id="table" data-toggle="table" data-ajax="ajaxExport" data-side-pagination="server"
                                data-pagination="true" data-search="true" data-show-columns="true"
                                data-show-refresh="true" data-key-events="true" data-show-toggle="true"
                                data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id" data-visible="false">ID</th>
                                        <th data-field="nomor">No</th>
                                        <th data-field="nama">Nama</th>
                                        <th data-field="status">Status Dalam KK</th>
                                        <th data-field="jk">Jenis Kelamin</th>
                                        <th data-field="tanggal">Tanggal Pindah</th>
                                        <th data-field="alamat">Alamat Pindah</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-footer">Footer</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>