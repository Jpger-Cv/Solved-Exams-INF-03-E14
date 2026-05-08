<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl" class="motor">
    <header>
        <h1>Motocykle - to moja pasja</h1>
    </header>
    <main>
        <section class="lewy">
            <h2>Gdzie pojechać?</h2>
            <dl>
                <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'motory');
                if(!mysqli_select_db($polaczenie, 'motory')){
                    echo mysqli_error($polaczenie);
                    exit();
                    mysqli_close($polaczenie);
                }
                $wynik = mysqli_query($polaczenie, 'SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM wycieczki JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id; ');
                while($wiersz = mysqli_fetch_array($wynik)){
                    echo "<dt>", $wiersz['nazwa'], " rozpoczyna się w ", $wiersz['poczatek'], "<a href='", $wiersz['zrodlo'], "'> zobacz zdjęcie </a><dd>", $wiersz['opis'], "</dd></dt>";
                }
                ?>
            </dl>
        </section>
        <section class="prawyP">
            <h2>Co kupić?</h2>
            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
        </section>
        <section class="prawyD">
            <h2>Statystyki</h2>
            <p>Wpisanych wycieczek:
                <?php
                    $wynik = mysqli_query($polaczenie, 'SELECT COUNT(id) FROM wycieczki;');
                    while($wiersz = mysqli_fetch_array($wynik)){
                        echo $wiersz['COUNT(id)'];
                    }
                    mysqli_close($polaczenie);
                ?></p>
                <p>Użytkowników forum: 200</p>
                <p>Przesłanych zdjęć: 1300</p>

        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Ostap
    </footer>
</body>
</html>