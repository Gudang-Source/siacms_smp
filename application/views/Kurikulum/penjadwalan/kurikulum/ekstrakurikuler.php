<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <center style="color:navy;">Jadwal Ekstrakurikuler<br></center>
      <!--  <center><small>Tahun Ajaran 2016-2017 Kurikulum 2013</small></center> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="dashboard.php">Dashboard</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row" >
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#pengaturan" data-toggle="tab">Pengaturan</a></li>
            <li><a href="#dataekskul" data-toggle="tab"><?php if (@$edit_jadwalekskul) { echo "Edit"; } else { echo "Tambah"; } ?> Jadwal Ekskul</a></li>
            <li><a href="#dataekstrakurikuler" data-toggle="tab">Data Ekskul </a></li>
         </ul>


         <div class="tab-content">
          <div class="active tab-pane" id="pengaturan">
            <div class="box-body">
              <div class="box-add-eskul">
                <button class="btn btn-success" id="tambah_eskul_trigger">Tambah Ekstrakurikuler</button>
              </div>
              <div class="box-header" style="background-color: #5c8a8a;">
                <h3 class="box-title" style="color:white">Daftar Ekstrakurikuler </h3>
              </div>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="fit">No.</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  foreach ($tabel_jenisklstambahan as $row_jenisklstambahan) {
                    $i++;
                    ?>
                    <tr>
                      <td class="fit"><?php echo $i; ?></td>
                      <td><?php echo $row_jenisklstambahan->jenis_kls_tambahan; ?></td>
                      <td> 
                        <button class="btn btn-block btn-primary button-action btnedit edit_eskul_trigger" id_eskul="<?php echo $row_jenisklstambahan->id_jenis_kls_tambahan; ?>" name_eskul="<?php echo $row_jenisklstambahan->jenis_kls_tambahan; ?>"> Edit </button>
                        <a onclick="return confirm('Apakah Anda yakin?')" class="btn btn-block btn-danger button-action btnedit" href="<?php echo site_url('kurikulum/hapus_jenis_kls_tambahan/'); ?><?php echo $row_jenisklstambahan->id_jenis_kls_tambahan; ?>"> Hapus </button>
                      </td>               
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="tab-pane" id="dataekskul">

            <div>
              <!-- <div class="box-header" style="background-color:     #5c8a8a">
                <h3 class="box-title" style="color:white">Tambah Manual</h3>
              </div> -->
              <form style="display:block;" class="form-horizontal formmapel" method="post" action="<?php echo site_url('kurikulum/simpanjadwalekskul'); ?>">
                <input type="hidden" name="id_jadwal_ekskul" value="<?php echo @$edit_jadwalekskul->id_jadwal_ekskul; ?>">
                
                <div class="form-group formgrup jarakform">
                  <label class="col-sm-2 control-label">Hari</label>
                  <div class="col-sm-4">
                    <select required="required" class="form-control" name="hari" value="<?php echo $row_jadwalekskul->hari; ?>" style="width: 120px;">
                      <option value="">Pilih Hari</option>
                      <option value="Senin" <?php if (isset($row_jadwalekskul->hari) && $row_jadwalekskul->hari=="Senin") echo "selected";?>> Senin </option>
                      <option value="Selasa" <?php if (isset($row_jadwalekskul->hari) && $row_jadwalekskul->hari=="Selasa") echo "selected";?>> Selasa </option>
                      <option value="Rabu" <?php if (isset($row_jadwalekskul->hari) && $row_jadwalekskul->hari=="Rabu") echo "selected";?>> Rabu </option>
                      <option value="Kamis" <?php if (isset($row_jadwalekskul->hari) && $row_jadwalekskul->hari=="Kamis") echo "selected";?>> Kamis </option>
                      <option value="Jumat" <?php if (isset($row_jadwalekskul->hari) && $row_jadwalekskul->hari=="Jumat") echo "selected";?>> Jumat</option>
                      <option value="Sabtu" <?php if (isset($row_jadwalekskul->hari) && $row_jadwalekskul->hari=="Sabtu") echo "selected";?>> Sabtu </option>
                      <option value="Minggu" <?php if (isset($row_jadwalekskul->hari) && $row_jadwalekskul->hari=="Minggu") echo "selected";?>> Minggu </option>    
                    </select>
                  </div>
                </div>

                <div class="bigbox-mapel"> 
                  <div class="box-mapel">
                    <div class="form-group formgrup jarakform">
                      <label for="jam_mulai" class="col-sm-2 control-label">Jam Mulai</label>
                      <div class="col-sm-4">
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="Waktu" value="<?php echo @$edit_jadwalekskul->jam_mulai; ?>">
                      </div>
                    </div>
                    <div class="form-group formgrup jarakform">
                      <label for="jam_selesai" class="col-sm-2 control-label">Jam Selesai</label>
                      <div class="col-sm-4">
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" placeholder="Waktu" value="<?php echo @$edit_jadwalekskul->jam_selesai; ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group formgrup jarakform">
                  <label class="col-sm-2 control-label">Jenis Ekstrakurikuler</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="id_jenis_kls_tambahan" id="kelas1" onchange="fetch_select_ekskul(this.value, 'ekskul1');" style="width: 120px;">
                      <option value="">Pilih Ekskul</option>
                      <?php
                      foreach ($tabel_jenisklstambahan as $row_jenisklstambahan) { ?>
                        <option value="<?php echo $row_jenisklstambahan->id_jenis_kls_tambahan; ?>" <?php if (@$edit_jadwalekskul->id_jenis_kls_tambahan == $row_jenisklstambahan->id_jenis_kls_tambahan) { echo " selected"; } ?>><?php echo $row_jenisklstambahan->jenis_kls_tambahan; ?></option><?php
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="bigbox-mapel"> 
                  <div class="box-mapel">
                    <div class="form-group formgrup jarakform">
                      <label for="tempat" class="col-sm-2 control-label">Tempat</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="tempat" value="<?php echo @$edit_jadwalekskul->tempat; ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group formgrup jarakform">
                  <label class="col-sm-2 control-label">Pembimbing</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="id_pembimbing" style="width: 120px;">
                      <option value="">Pilih Pembimbing</option>
                      <?php
                      foreach ($tabel_pembimbing as $row_pembimbing) { ?>
                        <option value="<?php echo $row_pembimbing->id_pembimbing; ?>"  <?php if (@$edit_jadwalekskul->id_pembimbing == $row_pembimbing->id_pembimbing) { echo " selected"; } ?>><?php echo $row_pembimbing->nama_pembimbing; ?></option> <?php
                      }?>
                    </select>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
          <!-- /.tab-pane -->

          <!-- /.tab-pane -->
          <div> <?php echo $this->session->flashdata('warning') ?></div>
          <div class="tab-pane" id="dataekstrakurikuler">
            <div class="box-body">
              <div class="box-header" style="background-color:     #5c8a8a">
                <h3 class="box-title" style="color:white">Data Jadwal Ekstrakurikuler </h3>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="fit">No.</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Jenis Ekstrakurikuler</th>
                    <th>Tempat</th>
                    <th>Pembimbing</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  foreach ($tabel_jadwalekskul as $row_jadwalekskul) {
                    $i++;
                    ?>
                    <tr>
                      <td class="fit"><?php echo $i; ?></td>
                      <td><?php echo $row_jadwalekskul->hari; ?></td>
                      <td><?php echo substr($row_jadwalekskul->jam_mulai, 0, 5); ?></td>
                      <td><?php echo substr($row_jadwalekskul->jam_selesai, 0, 5); ?></td>
                      <td><?php echo $row_jadwalekskul->jenis_kls_tambahan; ?></td>
                      <td><?php echo $row_jadwalekskul->tempat; ?></td>
                      <td><?php echo $row_jadwalekskul->nama_pembimbing; ?></td>
                      <td> 
                        <a class="btn btn-block btn-primary button-action btnedit" href="<?php echo site_url('kurikulum/ekstrakurikuler/'.$row_jadwalekskul->id_jadwal_ekskul); ?>" > Edit </a>
                        <a onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-primary button-action btnhapus" href="<?php echo site_url('kurikulum/hapusjadwalekskul/'.$row_jadwalekskul->id_jadwal_ekskul); ?>" > Hapus </a>
                      </td>               
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <!-- DATA MAPEL KELAS 8 -->


          <!-- DATA MAPEL KELAS 9 -->

        </div>
        <!-- /.tab-pane -->

        <!-- /.tab-pane -->

        <!-- /.tab-pane -->

      </div>
    </div>
    <!-- /.tab-content -->
  </div>
  <!-- /.nav-tabs-custom -->
</div>
</div>
</section>
<!-- /.content -->
</div>

<div id="modal_tambah_eskul" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?php echo site_url('kurikulum/tambah_jenis_kls_tambahan'); ?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Ekstrakulikuler</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="jenis_kls_tambahan" class="form-control" placeholder="Nama ekstrakulikuler">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_edit_eskul" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?php echo site_url('kurikulum/edit_jenis_kls_tambahan'); ?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Ekstrakulikuler</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id_kls_tambahan" id="id_kls_tambahan" class="form-control">
            <input type="text" name="jenis_kls_tambahan" id="jenis_kls_tambahan" class="form-control" placeholder="Nama ekstrakulikuler">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#tambah_eskul_trigger").click(function() {
      $("#modal_tambah_eskul").modal('show')
    })

    $(".edit_eskul_trigger").click(function() {
      var id = $(this).attr('id_eskul')
      var name = $(this).attr('name_eskul')

      $("#id_kls_tambahan").val(id)
      $("#jenis_kls_tambahan").val(name)
      $("#modal_edit_eskul").modal('show')
    })
  })
</script>