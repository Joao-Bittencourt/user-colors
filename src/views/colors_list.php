<!DOCTYPE html>
<html lang="br">

<head>
    <title>Lista cores</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include __dir__ . '/navbar.php'; ?>

    <div class="container">
        <div class="mt-3">
            <?php $this->displayFlasMessage(); ?>
        </div>
        <div class="card mt-3">
            <div class="card-header">

                <div class="row">
                    <div class="col-md-11">
                        Cores
                    </div>
                    <div class="col-md-1">
                        <a href="/colors/create" class="btn btn-sm btn-success text-decorator-none">
                            <i class="bi bi-pencil-square"> Cadastrar</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $trs = '';
                        $colors = $colors ?? [];
                        foreach ($colors as $color) {

                            $trs .= '<tr>';
                            $trs .= '<th scope="row">' . $color->id . '</th>';
                            $trs .= '<td>' . $color->name . '</td>';
                            $trs .= '<td>
                            <form action="/colors/delete/' . $color->id . '" method="POST" >
                                <input type="hidden" value= "' . $color->id . '">
                                <button class="btn btn-outline-danger" type="submit">excluir</button>
                            </form>
                            </td>';
                            $trs .= '</tr>';
                        }

                        echo empty($trs) ?
                            '<tr><td colspan="4" class="text-center"> Sem registros!<td></tr>' :
                            $trs;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>