<?php
    require './clima_scripts/weather_api.php';
    //var_du../uniclima_scripts/weather_api.phpmp($clima);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clima</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-dark border-bottom border-body">
        <div class="container-fluid">
            <a class="navbar-brand">Clima</a>
            <form class="d-flex" role="search" method="post">
                <input class="form-control me-2" name="cidade" value="<?=$cidade?>" type="search" placeholder="Cidade" aria-label="Search">
                <button class="btn btn-outline-info" type="submit">Buscar</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <? if (isset($clima) && $clima !== null) {?>
                    <div class="text-center">
                        <img src="https://openweathermap.org/img/wn/<?=$clima->__get('icon')?>@2x.png">
                        <h2><?=$clima->__get('temp')?>º</h2>
                        <hr>
                        <div class="mt-4">
                            <p><b>Sensação térmica: </b><?= round($clima->__get('feels_like'), 0, PHP_ROUND_HALF_UP)?>°</p>
                            <p><b>Mínima do momento:</b><?= round($clima->__get('temp_min'), 0, PHP_ROUND_HALF_UP)?>°</p>
                            <p><b>Máxima do momento: </b><?= round($clima->__get('temp_max'), 0, PHP_ROUND_HALF_UP)?>°</p>
                            <p><b>Umidade relativa do ar: </b><?= $clima->__get('humidity') ?>%</p>
                            <p><b>Pressão atm: </b><?= $clima->__get('pressure') ?>hPa</p>
                            <p><b>Velocidade do vento: </b><?= $clima->__get('wind_speed') ?>Km/h</p>
                            <p><b>Direção do vento: </b><?= $clima->__get('wind_deg') ?>°</p>
                        </div>
                    </div>
                    <? } else { ?>
                        <div class="text-center">
                            <h4>Cidade não encontrada</h4>   
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>