<form action="/petugas/ganti_password/<?= $session->get('id_petugas'); ?>" method="post">
    <?= csrf_field(); ?>

    <div class="mb-1">
        <label for="password" class="form-label">Password Lama<font color="FF7F7F">*</font></label>
        <input type="text" class="form-control <?= ($validation->hasError('passwordLama')) ? 'is-invalid' : ''; ?>" id="passwordLama" name="passwordLama" placeholder="Password Lama Anda" required>
        <div class="invalid-feedback">
            <?= $validation->getError('passwordLama'); ?>
        </div>
    </div>

    <div class="mb-1">
        <label for="password" class="form-label">Password Baru<font color="FF7F7F">*</font></label>
        <input type="password" class="form-control <?= ($validation->hasError('passwordBaru')) ? 'is-invalid' : ''; ?>" id="passwordBaru" name="passwordBaru" placeholder="Password Baru Anda" required>
        <div class="invalid-feedback">
            <?= $validation->getError('passwordBaru'); ?>
        </div>
    </div>

    <div class="mb-1">
        <label for="password" class="form-label">Konfirmasi Password Baru<font color="FF7F7F">*</font></label>
        <input type="password" class="form-control <?= ($validation->hasError('confirm')) ? 'is-invalid' : ''; ?>" id="confirm" name="confirm" placeholder="Konfirmasi Password Baru Anda" required>
        <div class="invalid-feedback">
            <?= $validation->getError('confirm'); ?>
        </div>
    </div>

    <button type="submit" class="me-1 btn btn-primary mt-2">Ganti Password</button>
    <div class="text-end"><small>
            <font color="FF7F7F">*</font> required fields
        </small>
    </div>
</form>