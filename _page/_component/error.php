<?php if(isset($_SESSION['success'])){ ?>
<script>
Swal.fire({
    position:'top-end',
    title: 'Sucess!',
    text: '<?= $_SESSION['success'];  ?>',
    icon: 'success',
    showConfirmButton:false,
    timer:1000

})
</script>
<?php unset($_SESSION['success']); ?>
<?php } else if(isset($_SESSION['alert'])){ ?>
<script>
Swal.fire({
    position:'top-end',
    title: 'Error!',
    text: '<?= $_SESSION['alert']; ?>',
    icon: 'error',
    showConfirmButton:false,
    timer:1000
})
</script>
<?php unset($_SESSION['alert']); ?>
<?php } ?>