</div>
</section>
<script src="main.js"></script>
<script src="alerts.min.js"></script>
<script>
  <?php if(isset($_SESSION['status'])){ 
       unset($_SESSION['status']); 
       ?>
       swal.fire({
           title: "<?php echo $_SESSION['msg']; ?>",
           text: "",
           icon: "<?php echo $_SESSION['msg-icon']; ?>",
           button: "OK",
       })
      <?php  unset($_SESSION['status']);
       }elseif(isset($_SESSION['msg'])){ 
        ?>
            swal.fire({
                title: "<?php echo $_SESSION['msg']; ?>",
                text: "",
                icon: "<?php echo $_SESSION['msg-icon']; ?>",
                button: "OK",
            })
      <?php unset($_SESSION['msg']); } ?>
    // Swal.fire({
    // title: "The Internet?",
    // text: "That thing is still around?",
    // icon: "question"
// });
</script>
</body>
</html>