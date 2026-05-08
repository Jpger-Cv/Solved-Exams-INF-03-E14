<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" type="text/css" href="styl9.css">
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <section class="left">
            <h2>Promocja</h2>
            <table>
                <tr>
                    <td>Warszawa</td>
                    <td>Od 600 zł</td>
                </tr>
                <tr>
                    <td>Wenecja</td>
                    <td>od 1200 zł</td>
                </tr>
                <tr>
                    <td>Paryż</td>
                    <td>Od 1200 zł</td>
                </tr>
            </table>
        </section>
        <section class="center">
            <h2>W tym roku jedziemy do...</h2>
            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'podroze');
                if(!mysqli_select_db($connection, 'podroze')){
                    echo mysqli_error($connection);
                    exit();
                    mysqli_close($connection);
                }
                $result = mysqli_query($connection, 'SELECT nazwaPliku, podpis FROM zdjecia GROUP BY podpis ASC;');
                while($row = mysqli_fetch_array($result)){
                    echo "<img src='", $row['nazwaPliku'],"' alt='", $row['podpis'], "' title='", $row['podpis'], "'>";
                }
            ?>
        </section>
        <section class="right">
            <h2>Kontakt</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 444555666</p>
        </section>
        <section class="data">
            <h3>W poprzednich latach byliśmy...</h3>
            <ol>
                <?php
                    $result = mysqli_query($connection, 'SELECT cel, dataWyjazdu FROM wycieczki WHERE dostepna=FALSE;');
                    while($row = mysqli_fetch_array($result)){
                        echo "<li>Dnia ", $row['dataWyjazdu']," pojechaliśmy do ", $row['cel'], "</li>";
                    }
                    mysqli_close($connection);
                ?>
            </ol>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Ostap</p>
    </footer>
</body>
</html>