<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mt-5 mb-3">Cambiar Contraseña</h2>
                
                <?php echo validation_errors(); ?>

                <?php echo form_open('usuario/changepassword'); ?>
                
                <div class="mb-3">
                    <label for="old_password" class="form-label">Contraseña Antigua:</label>
                    <input type="password" class="form-control" name="old_password" required>
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label">Nueva Contraseña:</label>
                    <input type="password" class="form-control" name="new_password" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmar Nueva Contraseña:</label>
                    <input type="password" class="form-control" name="confirm_password" required>
                </div>

                <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                </form>
            </div>
        </div>
    </div>