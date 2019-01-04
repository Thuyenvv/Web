<?php
    require_once '../../layout/header.php'; 
    if(!isset($_SESSION['user'])){
        header("Location: /login.php");
    }
    HeaderTemplate('dashboard');
    require_once '../../layout/nav.php';   
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php
                    require('../../layout/adminNav.php')
                ?>
            </div>
            <div class="col-md-9">

            </div>
        </div>
    </div>
</section>
<?php
    require_once('../../layout/footer.php')
?>
