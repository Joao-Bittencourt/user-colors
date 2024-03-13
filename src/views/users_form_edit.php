<!DOCTYPE html>
<html lang="br">

<head>
    <title>Editar usuário</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include __dir__ . '/navbar.php'; ?>
    <div class="container">

        <div class="mt-3">
            <?php $this->displayFlasMessage(); ?>
        </div>

  
        <form action="/users/update/<?php echo $user->id; ?>" method="POST">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $user->name; ?>">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $user->email; ?>">
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>