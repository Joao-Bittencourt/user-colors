<!DOCTYPE html>
<html lang="br">

<head>
    <title>Editar usuário</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
                    <div class="col-md-6">
                        <label for="color_id" class="form-label">Cores</label>
                        <select class="selectpicker" multiple title="Selecione uma cor" name='color_id[]'>
                            <?php
                            var_dump($userColors);
                            foreach ($colors as $color) {
                                $selected = in_array($color->id, $userColors) ? 'selected' : '';
                                echo "<option value={$color->id} {$selected }>{$color->name}</option>";
                            }
                            ?>
                        </select>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

</html>