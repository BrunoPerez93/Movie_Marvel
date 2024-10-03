<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

// Inicializar una nueva sesion de Curl; ch
$ch = curl_init(API_URL);

// Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Desactivar la verificación del certificado SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Ejecutar la peticion y guardamos el resultado
$result = curl_exec($ch);


// Si quieres solamente hacer un GET es mas facil con
// $result = file_get_contents(API_URL);

$data = json_decode($result, true);
curl_close($ch);

?>

<head>
    <meta charset="UTF-8" />
    <title> Next Marvel Movie </title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<main>
    <section>
        <img
            src="<?= $data["poster_url"]; ?>"
            width="300"
            alt="poster de <?= $data["title"]; ?>"
            style="border-radius: 16px;" />
        <h2>Next Marverl Movie</h2>
    </section>

    <hgroup>
        <h2><?= $data['title']; ?> it will be release in <?= $data['release_date']; ?></h2>
        <h4>In <?= $data['days_until']; ?> days</h4>
        <p>The next one is: <?= $data['following_production']['title']; ?></p>
    </hgroup>
</main>

<style>
    :root {
        --background-color: #000;
        --text-color: #fff;
    }

    body {
        background-color: var(--background-color);
        color: var(--text-color);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    hgroup{
        text-align: center;
    }
</style>