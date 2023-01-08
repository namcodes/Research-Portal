 <!-- jQuery -->
 <script src="../wp-plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="../wp-plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="../wp-plugins/dist/js/adminlte.min.js"></script>
 <script src="../wp-plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
 <script>
     $(document).ready(function() {
         $(function() {
             bsCustomFileInput.init();
         });

         $('.first-button').on('click', function() {
             $('.animated-icon1').toggleClass('open');
         });

         $(document).on("click", ".btn_view", function() {
             let btn_id = $(this).data("id");
             console.log(`Id : ${btn_id}`);
         })
     });
 </script>