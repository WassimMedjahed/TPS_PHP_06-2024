<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="weight-scale.svg" type="image/svg+xml">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Calculer IMC</title>
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">
                <i class="fa-solid fa-weight-scale me-3"></i> Calculer IMC
            </a>
        </div>
    </nav>
    <div class="container p-5">
        <!-- col-4 : je prends 4 colonnes sur 12 -->
        <div class="col-4">
            <form method="post">
                <input
                  type="text"
                  name="poids"
                  class="form-control"
                  placeholder="Poids en kg "
                />
                <input
                  type="text"
                  name="taille"
                  class="form-control my-3"
                  placeholder="Taille en mètre "
                />
                <button type="submit" class="btn btn-primary">Calculer</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $poids = floatval($_POST["poids"]);
                $taille = floatval($_POST["taille"]);
                if ($taille > 0) {
                    $imc = $poids / ($taille * $taille);
                    $conseil = "";
                    if ($imc < 18.5) {
                        $poids2 = 18.5 * $taille * $taille;
                        $poidsObjectif = $poids2 - $poids;
                        $conseil = "Vous devez prendre " . round($poidsObjectif, 1) . " kg.";
                    } else {
                        $poids2 = 25 * $taille * $taille;
                        $poidsObjectif = $poids - $poids2;
                        $conseil = "Vous devez perdre " . round($poidsObjectif, 1) . " kg.";
                    }
                    
                    $tranche = "";
                    $couleur="";
                    if ($imc < 18.5) {
                        $tranche = "maigreur";
                        $couleur="warning";
                    } elseif ($imc < 25) {
                        $tranche = "normal";
                        $couleur="success";

                    } elseif ($imc < 30) {
                        $tranche = "surpoids";
                        $couleur="warning";
                    } elseif ($imc < 35) {
                        $tranche = "obésité";
                        $couleur="danger";

                    } elseif ($imc < 40) {
                        $tranche = "obésité sévère";
                        $couleur="danger";

                    } else {
                        $tranche = "obésité massive";
                        $couleur="danger";

                    }

                    echo "<div class='alert alert-{$couleur} mt-3' role='alert'>
                            Votre IMC est " . round($imc, 1) . "<br />
                            Tranche : " . $tranche . "<br />
                            Conseil : " . $conseil . "
                          </div>";
                } else {
                    echo "<div class='alert alert-danger mt-3' role='alert'>
                            Taille doit être supérieure à 0.
                          </div>";
                }
            }
            ?>
        </div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; IMC 2023</p>
        </div>
    </footer>
</body>
</html>
