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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"
                                        title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="toolbar">
                                    <?php if (in_groups(['users'])) { ?>
                                    <button type="button" class="btn btn-warning single-edit" method="edit" disabled><i class="fa fa-edit"></i> Update</button>
                                    <button type="button" class="btn btn-danger" id="remove" disabled><i class="fa fa-trash"></i> Hapus</button>
                                    <?php } if (in_groups(['editors'])) { ?>
                                    <button type="button" class="btn btn-info single-edit" method="edit" disabled><i class="fa fa-edit"></i> Editor</button>
                                    <?php } if (in_groups(['publisher'])) { ?>
                                    <button type="button" class="btn btn-success single-edit" method="edit" disabled><i class="fa fa-edit"></i> Upprove</button>
                                    <?php } ?>
                                </div>
                                <table id="table" data-toggle="table" data-ajax="ajaxRequest" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id" data-visible="false">ID</th>
                                            <th data-field="nomor">No</th>
                                            <th data-field="judul">Judul</th>
                                            <th data-field="gambar">Gambar</th>
                                            <th data-field="redaksi_foto">Redaksi Foto</th>
                                            <th data-field="body">Isi</th>
                                            <th data-field="tanggal">Tanggal</th>
                                            <th data-field="penulis">Penulis</th>
                                            <th data-field="editor">Editor</th>
                                            <th data-field="redaktur">Redaktur</th>
                                            <th data-field="tag">Tag</th>
                                            <th data-field="status">Status</th>
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