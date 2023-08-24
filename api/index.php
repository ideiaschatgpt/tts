<?php
session_start();

// Verifica se o usuário enviou o formulário
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Define o PIN correto
    $pinCorreto = "2008";

    // Verifica se o PIN inserido está correto
    if ($_POST["pin"] === $pinCorreto) {
        // PIN correto, armazena o status de autenticação na sessão
        $_SESSION["autenticado"] = true;
        header("Location: index.php"); // Redireciona para a página protegida
        exit();
    } else {
        // PIN incorreto, exibe uma mensagem de erro
        $mensagemErro = "PIN inválido. Por favor, tente novamente.";
    }
}

// Verifica se o usuário está autenticado
if (isset($_SESSION["autenticado"]) && $_SESSION["autenticado"]) {
    // O usuário está autenticado, exibe o conteúdo protegido
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer data-domain="weilbyte.github.io/tiktok-tts" src="https://plausible.io/js/plausible.js"></script>
    <script src="static/script.js"></script>
    <title>TikTok TTS</title>
    <style>
        #funny:hover {
            opacity: 0;
            transition: opacity 1s ease-out 100ms
        }
        #funny {
            transition: opacity 1s ease-in 100ms
        }
        .bold {
            font-weight:bold;
        }
    </style>
</head>
<body class="flex flex-col" style="background-color: #fbfbfb">
    <div class="bg-stone-100 p-12 grow">
        <img src="static/tiktok_logo.png" width="64px" height="64px" class="mx-auto"/>
        <h1 class="text-6xl font-bold text-center">
            TikTok TTS
        </h1>
        <p class="text-center pt-6">Generate the <span id="funny">funny</span> TikTok lady voice <sup>(& more)</sup> in your browser</p>
    </div>
    <div class="bg-slate-200 md:mt-11 p-11 md:mx-auto h-2/4 md:w-3/5 md:rounded">
        <form onsubmit="event.preventDefault(); submitForm()">
            <label for="text" hidden>Text to generate into speech</label>
            <p class="rounded bg-slate-100 h-8 w-16 text-center leading-8 mb-2 float-right" id="charcount">999/999</p>
            <textarea id="text" name="text" placeholder="The fungus among us." oninput="onTextareaInput()" class="h-full w-full rounded p-2 bg-slate-100" disabled></textarea><br/>
            <label for="voice" hidden>Voice to use</label>
            <select name="voice" id="voice" class="rounded p-1 bg-slate-100 mt-2 w-full sm:w-1/2" disabled>
                <option selected disabled hidden value="none">Select a voice</option>

                <option disabled class="bold">English US</option>
                <option value="en_us_001">Female</option>
                <option value="en_us_006">Male 1</option>
                <option value="en_us_007">Male 2</option>
                <option value="en_us_009">Male 3</option>
                <option value="en_us_010">Male 4</option>
                <option disabled></option>

                <option disabled class="bold">English UK</option>
                <option value="en_uk_001">Male 1</option>
                <option value="en_uk_003">Male 2</option>
                <option disabled></option>

                <option disabled class="bold">English AU</option>
                <option value="en_au_001">Female</option>
                <option value="en_au_002">Male</option>
                <option disabled></option>

                <option disabled class="bold">French</option>
                <option value="fr_001">Male 1</option>
                <option value="fr_002">Male 2</option>
                <option disabled></option>

                <option disabled class="bold">German</option>
                <option value="de_001">Female</option>
                <option value="de_002">Male</option>
                <option disabled></option>

                <option disabled class="bold">Spanish</option>
                <option value="es_002">Male</option>
                <option disabled></option>

                <option disabled class="bold">Spanish MX</option>
                <option value="es_mx_002">Male 1</option>
                <option value="es_male_m3">Male 2</option>
                <option value="es_female_f6">Female 1</option>
                <option value="es_female_fp1">Female 2</option>
                <option value="es_mx_female_supermom">Female 3</option>
                <option value="es_mx_male_transformer">Optimus Prime (Transformers)</option>
                <option disabled></option>

                <option disabled class="bold">Portuguese BR</option>
                <!-- <option value="br_001">Female 1</option> -->
                <option value="br_003">Female 2</option>
                <option value="br_004">Female 3</option>
                <option value="br_005">Male</option>
                <option disabled></option>

                <option disabled class="bold">Indonesian</option>
                <option value="id_001">Female</option>
                <option disabled></option>

                <option disabled class="bold">Japanese</option>
                <option value="jp_001">Female 1</option>
                <option value="jp_003">Female 2</option>
                <option value="jp_005">Female 3</option>
                <option value="jp_006">Male</option>
                <option disabled></option>

                <option disabled class="bold">Korean</option>
                <option value="kr_002">Male 1</option>
                <option value="kr_004">Male 2</option>
                <option value="kr_003">Female</option>
                <option disabled></option>

                <option disabled class="bold">Characters</option>
                <option value="en_us_ghostface">Ghostface (Scream)</option>
                <option value="en_us_chewbacca">Chewbacca (Star Wars)</option>
                <option value="en_us_c3po">C3PO (Star Wars)</option>
                <option value="en_us_stitch">Stitch (Lilo & Stitch)</option>
                <option value="en_us_stormtrooper">Stormtrooper (Star Wars)</option>
                <option value="en_us_rocket">Rocket (Guardians of the Galaxy)</option>
                <option disabled></option>

                <option disabled class="bold">Singing</option>
                <option value="en_female_f08_salut_damour">Alto</option>
                <option value="en_male_m03_lobby">Tenor</option>
                <option value="en_male_m03_sunshine_soon">Sunshine Soon</option>
                <option value="en_female_f08_warmy_breeze">Warmy Breeze</option>
                <option value="en_female_ht_f08_glorious">Glorious</option>
                <option value="en_male_sing_funny_it_goes_up">It Goes Up</option>
                <option value="en_male_m2_xhxs_m03_silly">Chipmunk</option>
                <option value="en_female_ht_f08_wonderful_world">Dramatic</option>
            </select>
            <button class="rounded bg-slate-100 p-1 w-full sm:w-24 sm:float-right mt-2" id="submit" disabled>Generate</button>
        </form>
    </div>

    <div class="bg-red-200 md:mt-6 p-6 pt-3 md:mx-auto h-2/4 md:w-2/4 md:rounded" id="error" style="display: none">
        <h1 class="text-center font-bold text-xl">Error</h1>
        <p class="text-center" id="errortext">There was an error.</p>
    </div>

    <div class="bg-green-200 md:mt-6 p-6 pt-3 md:mx-auto h-2/4 md:w-2/4 md:rounded" id="success" style="display: none">
        <h1 class="text-center font-bold text-xl">Success</h1>
        <p class="text-center" id="generatedtext"></p>
        <audio controls class="mx-auto mt-2" id="audio" src="">
            Umm, update your browser.
        </audio>
    </div>
</body>
</html>


<?php
} else {
    // O usuário não está autenticado, exibe o formulário de PIN
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acesso com PIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Ideias TTS</h3>
                    <?php if (isset($mensagemErro)) : ?>
                        <div class="alert alert-danger" role="alert"><?php echo $mensagemErro; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="pin" class="form-label">INSIRA O PIN:</label>
                            <input type="password" class="form-control" id="pin" name="pin" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Acessar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}
?>
