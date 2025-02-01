  <footer class="main-footer">
    <strong>Dibuat Oleh &copy; <script>
        document.write(new Date().getFullYear());
      </script> Kelompok2B</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Program Kasir</b>
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  </div>

  <script src="<?= url() ?>plugins/jquery/jquery.min.js"></script>

  <script src="<?= url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>

  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <script src="<?= url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?= url() ?>plugins/chart.js/Chart.min.js"></script>

  <script src="<?= url() ?>plugins/sparklines/sparkline.js"></script>

  <script src="<?= url() ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= url() ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

  <script src="<?= url() ?>plugins/jquery-knob/jquery.knob.min.js"></script>

  <script src="<?= url() ?>plugins/moment/moment.min.js"></script>
  <script src="<?= url() ?>plugins/daterangepicker/daterangepicker.js"></script>

  <script src="<?= url() ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <script src="<?= url() ?>plugins/summernote/summernote-bs4.min.js"></script>

  <script src="<?= url() ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <script src="<?= url() ?>dist/js/adminlte.js"></script>

  <script src="<?= url() ?>dist/js/pages/dashboard.js"></script>

  <script src="<?= url() ?>dist/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '#tb_produk', function(e) {
        document.getElementById("kdproduk").value = $(this).attr('data-kdproduk');
        document.getElementById("nm_produk").value = $(this).attr('data-nm_produk');
        document.getElementById("kategori").value = $(this).attr('data-kategori');
        document.getElementById("stok").value = $(this).attr('data-stok');
        document.getElementById("satuan").value = $(this).attr('data-satuan');
        document.getElementById("rak").value = $(this).attr('data-rak');
        document.getElementById("supplier").value = $(this).attr('data-supplier');
        $('#modal_produk').modal('hide');
      });
    });
  </script>
  </body>

  </html>