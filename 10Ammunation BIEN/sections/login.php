<div class="container">
    <div class="bg-body-tertiary p-5 rounded">
        <h1>Login</h1>
        <form class="col-6 me-auto w-100" action="./control/login_controller.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>
</div>