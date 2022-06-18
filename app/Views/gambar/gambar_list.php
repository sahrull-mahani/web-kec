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
                            <h3 class="card-title mr-5">Data <?= $breadcome ?></h3>
                            <a href="#" class="btn btn-primary">Tambah Gambar</a>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- <div class="card-body">
                            <div id="toolbar">
                                <?php if (in_groups(2)) : ?>
                                    <button type="button" class="btn btn-primary" id="publish" disabled><i class="fa fa-retweet"></i> Edit Status</button>
                                <?php else : ?>
                                    <input type="number" class="btn  btn-default" value="1" id="number-of-row">
                                    <button type="button" class="btn btn-primary create" id="create" method="create" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</button>
                                <?php endif; ?>
                                <button type="button" class="btn btn-warning" id="edit" method="edit" disabled><i class="fa fa-edit"></i> Edit</button>
                                <button type="button" class="btn btn-danger" id="remove" disabled><i class="fa fa-trash"></i> Hapus</button>
                            </div>
                            <table id="table" data-toggle="table" data-ajax="ajaxRequest" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id" data-visible="false">ID</th>
                                        <th data-field="nomor">No</th>
                                        <th data-field="sumber">Sumber</th>
                                        <th data-field="judul">Judul</th>
                                        <th data-field="deskripsi">Deskripsi</th>
                                        <th data-field="users_id">Pengirim</th>
                                        <th data-field="status">Status</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> -->
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Pengirim</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <img width="250" height="200" alt="Berita Image" src="https://source.unsplash.com/1350x364?newspaper" class="mb-3 img-responsive" />
                                        </td>
                                        <td>Judul Gambar Terbaru</td>
                                        <td>Deskrips Gambar</td>
                                        <td>Skpd stunting</td>
                                        <td>tidak tayang</td>
                                        <td>
                                            <a href="#" class="badge badge-info">detail</a>
                                            <a href="#" class="badge badge-warning">edit</a>
                                            <a href="#" class="badge badge-danger">hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <img width="250" height="200" alt="Berita Image" src="https://source.unsplash.com/1350x364?newspaper" class="mb-3 img-responsive" />
                                        </td>
                                        <td>Judul Gambar Terbaru</td>
                                        <td>Deskrips Gambar</td>
                                        <td>Skpd stunting</td>
                                        <td>tidak tayang</td>
                                        <td>
                                            <a href="#" class="badge badge-info">detail</a>
                                            <a href="#" class="badge badge-warning">edit</a>
                                            <a href="#" class="badge badge-danger">hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            <img width="250" height="200" alt="Berita Image" src="https://source.unsplash.com/1350x364?newspaper" class="mb-3 img-responsive" />
                                        </td>
                                        <td>Judul Gambar Terbaru</td>
                                        <td>Deskrips Gambar</td>
                                        <td>Skpd stunting</td>
                                        <td>tidak tayang</td>
                                        <td>
                                            <a href="#" class="badge badge-info">detail</a>
                                            <a href="#" class="badge badge-warning">edit</a>
                                            <a href="#" class="badge badge-danger">hapus</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">Footer</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<!-- <div class="content-wraper">
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
        <div class="container-flui">


        </div>
    </section>

</div> -->




<?= $this->endSection() ?>