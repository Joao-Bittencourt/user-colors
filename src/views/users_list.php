<!DOCTYPE html>
<html lang="br">

<head>
    <title>Lista usuário</title>

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
                        Usuários
                    </div>
                    <div class="col-md-1">
                        <a href="/users/create" class="btn btn-sm btn-success text-decorator-none">
                            Cadastrar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $trs = '';
                        $users = $users ?? [];
                        foreach ($users as $user) {

                            $trs .= '<tr>';
                            $trs .= '<th scope="row">' . $user->id . '</th>';
                            $trs .= '<td>' . $user->name . '</td>';
                            $trs .= '<td>' . $user->email . '</td>';
                            $trs .= '<td>
                            <a class="btn btn-sm btn-outline-warning" href="/users/edit/' . $user->id . '">editar</a>
                            <form action="/users/delete/' . $user->id . '" method="POST" >
                                <input type="hidden" value= "' . $user->id . '">
                                <button class="btn btn-sm btn-outline-danger" type="submit">excluir</button>
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