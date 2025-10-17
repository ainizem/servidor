<div class="container">
    <div class="bg-body-tertiary p-5 rounded">
        <h1>Registro</h1>
    <form class="col-6 me-auto w-100 pt-4" action="./control/registro_controller.php" method="POST">
        <div class="row g-3">
            <div class="col mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">mail</label>
            <input type="mail" class="form-control" name="mail">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="pass">
        </div>
        <div class="mb-3">
            <label for="pass2" class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" name="pass2">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
    </div>
</div>