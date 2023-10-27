<?php
    include 'clima_model.php';

    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';

    $params = array(
        'q' => $cidade,
        'appid' => '7d99f8457b5935bd999e33bbd99500c4', //SUA chave da API
        'units' => 'metric',
        'lang' => 'pt_br'
    );

    $url = 'https://api.openweathermap.org/data/2.5/weather?';

    $url = $url . http_build_query($params);

    if (get_http_responde_code($url) == 200) {
        $json = file_get_contents($url);
        $data = json_decode($json, true);

        $clima = new Clima();

        $clima->__set('temp', $data['main']['temp']);
        $clima->__set('temp_min', $data['main']['temp_min']);
        $clima->__set('temp_max', $data['main']['temp_max']);
        $clima->__set('feels_like', $data['main']['feels_like']);
        $clima->__set('description', $data['weather'][0]['description']);
        $clima->__set('icon', $data['weather'][0]['icon']);
        $clima->__set('humidity', $data['main']['humidity']);
        $clima->__set('pressure', $data['main']['pressure']);
        $clima->__set('wind_speed', $data['wind']['speed']);
        $clima->__set('wind_deg', $data['wind']['deg']);
    } else {
        return null;
    }



    function get_http_responde_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
?>