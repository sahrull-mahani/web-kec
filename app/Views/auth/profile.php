<?= $this->extend('template_adminlte/index') ?>
<?= $this->section('page-content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= $session->foto; ?>" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?= $session->nama_user; ?></h3>
                            <p class="text-muted text-center"><?= $session->userlevel; ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Terkahir Login</b> <a class="float-right"><?= $session->old_last_login; ?></a>
                                </li>
                            </ul>
                            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                        </div>
                    </div>
                    <!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
            </div> -->
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Account/Ganti Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <?= form_open("thl/save", array("class" => "form-horizontal", "id" => "save-profile")) ?>
                                    <div class="form-group row mode2">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10 item">
                                            <input type="text" class="form-control" id="nama" name="nama[]" value="<?= (isset($get->nama)) ? $get->nama : ''; ?>" placeholder="Nama" required />
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="jab_id" class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10 item">
                                            <?php $defaults = array('' => 'Pilih Jabatan');
                                            echo form_dropdown('jab_id[]', $defaults + jabatan(), (isset($get->jab_id)) ? $get->jab_id : '', 'class="form-control" id="jab_id" required'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="jk" class="col-sm-2 col-form-label">Jk</label>
                                        <div class="col-sm-10 item">
                                            <?php $defaults = array('' => '==Pilih Jk==');
                                            $options = array(
                                                'Laki-Laki' => 'Laki-Laki',
                                                'Perempuan' => 'Perempuan',
                                            );
                                            echo form_dropdown('jk[]', $defaults + $options, (isset($get->jk)) ? $get->jk : '', 'class="form-control" id="jk" ');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10 item">
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir[]" value="<?= (isset($get->tempat_lahir)) ? $get->tempat_lahir : ''; ?>" placeholder="Tempat Lahir" />
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tgl Lahir</label>
                                        <div class="col-sm-10 item">
                                            <input type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir[]" value="<?= (isset($get->tgl_lahir)) ? get_format_date($get->tgl_lahir) : ''; ?>" placeholder="Tgl Lahir" />
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="gelar_depan" class="col-sm-2 col-form-label">Gelar Depan</label>
                                        <div class="col-sm-10 item">
                                            <input type="text" class="form-control" id="gelar_depan" name="gelar_depan[]" value="<?= (isset($get->gelar_depan)) ? $get->gelar_depan : ''; ?>" placeholder="Gelar Depan" />
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="gelar_belakang" class="col-sm-2 col-form-label">Gelar Belakang</label>
                                        <div class="col-sm-10 item">
                                            <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang[]" value="<?= (isset($get->gelar_belakang)) ? $get->gelar_belakang : ''; ?>" placeholder="Gelar Belakang" />
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10 item">
                                            <textarea class="form-control" id="alamat" name="alamat[]" placeholder="Alamat"><?= (isset($get->alamat)) ? $get->alamat : ''; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                                        <div class="col-sm-10 item">
                                            <?php $defaults = array('' => '==Pilih Pendidikan==');
                                            $options = array(
                                                'S3' => 'S3',
                                                'S2' => 'S2',
                                                'S1/D4' => 'S1/D4',
                                                'D3' => 'D3',
                                                'D2' => 'D2',
                                                'D1' => 'D1',
                                                'SMA/SMK/MA' => 'SMA/SMK/MA',
                                            );
                                            echo form_dropdown('pendidikan[]', $defaults + $options, (isset($get->pendidikan)) ? $get->pendidikan : '', 'class="form-control" id="pendidikan" ');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="lulusan" class="col-sm-2 col-form-label">Lulusan</label>
                                        <div class="col-sm-10 item">
                                            <input type="text" class="form-control" id="lulusan" name="lulusan[]" value="<?= (isset($get->lulusan)) ? $get->lulusan : ''; ?>" placeholder="Lulusan" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="offset-sm-2 col-sm-10">
                                            <input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
                                            <input type='hidden' name='action' value='update' />
                                            <?= form_submit('submit', lang('Auth.edit_user_submit_btn'), ['class' => 'btn btn-success']); ?>
                                        </div>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                                <div class="tab-pane" id="timeline">
                                    <?= form_open('auth/change_password', array('class' => 'form-horizontal', 'id' => 'save-account')); ?>
                                    <div class="form-group row mode2">
                                        <?= form_label(lang('Auth.edit_user_name_label'), 'nama_user', ['class' => 'col-sm-4 col-form-label']); ?>
                                        <div class="col-sm-8 item">
                                            <input type="text" name="nama_user" value="<?= isset($get->nama) ? $get->nama : $user->nama_user; ?>" id="nama_user" class="form-control" required="required" <?= isset($get->nama) ? 'readonly': ''; ?> />
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <?= form_label(lang('Auth.edit_username_label'), 'username', ['class' => 'col-sm-4 col-form-label']); ?>
                                        <div class="col-sm-8 item">
                                            <input type="text" name="username" value="<?= isset($user->username) ? $user->username : ''; ?>" id="username" class="form-control" required="required" <?= $identityColumn === 'username' ? 'readonly' : ''; ?> />
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <?= form_label(lang('Auth.edit_user_email_label'), 'email', ['class' => 'col-sm-4 col-form-label']); ?>
                                        <div class="col-sm-8 item">
                                            <input type="text" name="email" value="<?= isset($user->email) ? $user->email : ''; ?>" id="email" class="form-control" required="required" <?= $identityColumn === 'email' ? 'readonly' : ''; ?> />
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <?= form_label(lang('Auth.edit_user_phone_label'), 'phone', ['class' => 'col-sm-4 col-form-label']); ?>
                                        <div class="col-sm-8 item">
                                            <input type="text" name="phone" value="<?= isset($user->phone) ? $user->phone : ''; ?>" id="phone" class="form-control" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="old_password" class="col-sm-4 col-form-label"><?= lang('Auth.change_password_old_password_label'); ?></label>
                                        <div class="col-sm-8 item">
                                            <?= form_input($old_password); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="new_password" class="col-sm-4 col-form-label"><?= sprintf(lang('Auth.change_password_new_password_label'), $minPasswordLength); ?></label>
                                        <div class="col-sm-8 item">
                                            <?= form_input($new_password); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mode2">
                                        <label for="new_password_confirm" class="col-sm-4 col-form-label"><?= lang('Auth.change_password_new_password_confirm_label'); ?></label>
                                        <div class="col-sm-8 item">
                                            <?= form_input($new_password_confirm); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="offset-sm-4 col-sm-8">
                                            <?= form_hidden('id', $session->user_id); ?>
                                            <?= form_submit('submit', lang('Auth.change_password_submit_btn'), ['class' => 'btn btn-primary']); ?>
                                        </div>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>