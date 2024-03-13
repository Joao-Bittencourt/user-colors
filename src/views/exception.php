<!DOCTYPE html>
<html lang="br">

<head>
    <title>Lista pessoas</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="mt-3">

            <?php
            if (!empty($error) && !empty($error['message']) && !empty($error['type'])) {

                echo sprintf(
                    "<div class='alert alert-%s'>%s</div>",
                    $error['type'],
                    $error['message']
                );
            }
            ?>
        </div>
    </div>
</body>

</html>