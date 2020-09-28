<?php require_once './layouts/header.php' ?>
<?php require_once './core/init.php' ?>
<?php 

if(isset($_POST['submit']))
    register($_POST);
?>

<section class="register-container small-container">
    <div class="form-wrapper">
        <div class="header">
            <h1 class="Poppins">Register</h1>
        </div>
        <form action="" method="POST">
            <div class="form-group">
                <label class="Nunito-sans" for="">Nama <span>*</span></label>
                <input type="text" class="Poppins <?= (error('nama') ? 'is-invalid' : '') ?>" name="nama" id="nama" value="<?= (old('nama') ? old('nama') : '') ?>"> 
                <?php if(error('nama')) { ?>
                    <div class="invalid-feedback Nunito-sans">
                        <?= error('nama') ?>
                    </div>  
                <?php } ?>
            </div>
            <div class="form-group">
                <label class="Nunito-sans" for="">Email <span>*</span></label>
                <input type="text" class="Poppins <?= (error('email') ? 'is-invalid' : '') ?>" name="email" id="email" value="<?= (old('email') ? old('email') : '') ?>">   
                <?php if(error('email')) { ?>
                    <div class="invalid-feedback Nunito-sans">
                        <?= error('email') ?>
                    </div>  
                <?php } ?>
            </div>
            <div class="form-group">
                <label class="Nunito-sans" for="">Password <span>*</span></label>
                <input type="text" class="Poppins <?= (error('password') ? 'is-invalid' : '') ?>" name="password" id="password" value="<?= (old('password') ? old('password') : '') ?>">   
                <?php if(error('password')) { ?>
                    <div class="invalid-feedback Nunito-sans">
                        <?= error('password') ?>
                    </div>  
                <?php } ?>
            </div>
            <div class="form-group">
                <label class="Nunito-sans" for="">Konfirmasi Password</label>
                <input type="text" class="Poppins" name="konfirmasi_password" id="konfirmasi_password">   
            </div>
            <div class="form-group">
                <button class="Poppins" type="submit" name="submit">Buat Akun</button>
            </div>
            <div class="has-an-account">
                <span class="Nunito-sans">Sudah mempunyai akun? <a href="">masuk</a></span>
            </div>
        </form>
    </div>
</section>

<?php require_once './layouts/footer.php' ?>
