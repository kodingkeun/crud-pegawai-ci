<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | CRUD PEGAWAI CI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="https://github.com/ibnusyawall" class="nav-link" target="_blank">Github</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="https://wa.me/6282299265151" class="nav-link" target="_blank">WhatsApp</a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a class="brand-link text-center" href="/dashboard">
        <span class="brand-text font-weight-light">CRUD PEGAWAI CI</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-12">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 id="total_data">0</h3>

                  <p>Total Pegawai</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <section class="col-lg-12">
              <button class="btn btn-success" onclick="add_data()"><i class="glyphicon glyphicon-plus"></i> Add Data</button>
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>Tgl Lahir</th>
                    <th>Keterangan</th>
                    <th style="width: 125px;">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>Tgl Lahir</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </section>

          </div>
        </div>
      </section>

      <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title">Pegawai Form</h3>
            </div>
            <div class="modal-body form">
              <form action="#" id="form" class="form-horizontal">
                <input type="hidden" value="" name="id" />
                <div class="form-body">
                  <div class="form-group">
                    <label class="control-label col-md-3">Nama</label>
                    <div class="col-md-9">
                      <input name="nama" class="form-control" type="text" required>
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">NIP</label>
                    <div class="col-md-9">
                      <input name="nip" class="form-control" type="number" required>
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-9">
                      <input name="email" class="form-control" type="email" required>
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Tanggal Lahir</label>
                    <div class="col-md-9">
                      <input name="tgl_lahir" placeholder="yyyy-mm-dd" class="form-control datepicker" type="date" required>
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Keterangan</label>
                    <div class="col-md-9">
                      <textarea name="keterangan" placeholder="Keterangan" class="form-control"></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>

  <script src="<?= base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="<?= base_url(); ?>assets/adminlte/dist/js/adminlte.js"></script>
  <script src="<?= base_url(); ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/eruda"></script>
  <script>
    var save_method, table;

    $(document).ready(function() {
      eruda.init()

      get_total_table()
      table = $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('dashboard/list_data')?>",
          "type": "POST"
        },
        "columnDefs": [{
          "targets": [-1],
          "orderable": false,
        }],
      })
    })


    function reload_table() {
      table.ajax.reload(null, false)

      get_total_table()
    }

    function get_total_table() {
      $.ajax({
        url: "<?php echo site_url('dashboard/get_total_data'); ?>",
        type: 'GET',
        dataType: 'JSON',
        success: function(data) {
          $('#total_data').text(data.total_records_data)
        }
      })
    }

    function add_data() {
      save_method = 'add';
      $('#form')[0].reset()
      $('.form-group').removeClass('has-error')
      $('.help-block').empty()
      $('#modal_form').modal('show')
      $('.modal-title').text('Add Pegawai')
    }

    function edit_data(id) {
      save_method = 'update';
      $('#form')[0].reset()
      $('.form-group').removeClass('has-error')
      $('.help-block').empty()

      $.ajax({
        url: "<?php echo site_url('dashboard/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="id"]').val(data.id)
          $('[name="nama"]').val(data.nama)
          $('[name="nip"]').val(data.nip)
          $('[name="email"]').val(data.email)
          $('[name="tgl_lahir"]').val(data.tgl_lahir)
          $('[name="keterangan"]').val(data.keterangan)
          $('#modal_form').modal('show')
          $('.modal-title').text('Edit Pegawai')
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax')
        }
      })
    }

    function save() {
      $('#btnSave').text('saving...')
      $('#btnSave').attr('disabled', true)

      var url;

      if (save_method == 'add') {
        url = "<?php echo site_url('dashboard/add')?>";
      } else {
        url = "<?php echo site_url('dashboard/update')?>";
      }

      var store = $('#form').serialize()

      if (save_method == 'add') {
        store = store.split('&').slice(1).join('&')
      }

      $.ajax({
        url: url,
        type: "POST",
        data: store,
        dataType: "JSON",
        success: function(data) {
          if (data.status) {
            $('#modal_form').modal('hide')
            reload_table()
          }

          $('#btnSave').text('save')
          $('#btnSave').attr('disabled', false)


        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error adding / update data')
          $('#btnSave').text('save')
          $('#btnSave').attr('disabled', false)
          console.log(store)
        }
      })
    }

    function delete_data(id) {
      if (confirm('Are you sure delete this data?')) {
        $.ajax({
          url: "<?php echo site_url('dashboard/delete')?>/" + id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            $('#modal_form').modal('hide')
            reload_table()
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error deleting data')
          }
        })
      }
    }
  </script>
</body>

</html>
