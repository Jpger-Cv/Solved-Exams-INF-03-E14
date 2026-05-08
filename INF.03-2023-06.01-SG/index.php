<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>Taniej o 30%</h2>
            <ol>
                <?php
                    $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep');
                    if (mysqli_connect_error()){
                        die("Chuj tam" . mysqli_connect_error());
                    }
                    $wynik = mysqli_query($poloczenie, 'SELECT nazwa FROM towary WHERE promocja = 1;');
                    while ($wiersz = mysqli_fetch_array($wynik)){
                        echo "<li>", $wiersz['nazwa'], "</li>";
                    }

                ?>
            </ol>
        </section>
        <section id="srodkowy">
            <h2>Sprawdź cenę</h2>
            <form action="index.php" method="POST">
                <select name="option" id="">
                    <option name=>Gumka do mazania</option>
                    <option name>Cienkopis</option>
                    <option name>Pisaki 60 szt.</option>
                    <option name>Markery 4 szt.</option>
                </select>
                <input type="submit" value="Sprawdź" name="check">
            </form>
            <section id="skrypt2">
                <?php
                    if (isset($_POST['check'])){
                        $option = $_POST['option'];
                        $wynik = mysqli_query($poloczenie, "SELECT cena FROM towary WHERE nazwa='$option';");
                        $wiersz  = mysqli_fetch_array($wynik);
                        echo "cena regularna: ", $wiersz['cena'], "<br>cena  w promocji 30%: ", 0.7*$wiersz['cena'];
                        mysqli_close($poloczenie);
                    }
                
                
                ?>
            </section>
        </section>
        <section id="prawy">
            <h2>Kontakt</h2>
            <p>
                <a href="mailto:bok@sklep.pl">bok@sklep.pl</a>
                <img src="promocja.png" alt="promocja">
            </p>
        </section>
    </main>
    <footer>
                <h4>Autor strony: 0000000000</h4>
    </footer>
</body>
</html>