<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowal świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów
        świnkowe maluszki</h1>
    </header>
    <main>
        <section class="menu">
            <a href="peruwianka.php">Rasa peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </section>
        <section class="prawy">
            <h1>Poznaj wszystkie rasy świnek morskich</h1>
            <ol>
                <?php
                    $connect = mysqli_connect('localhost', 'root', '', 'hodowla');
                    if (!mysqli_select_db($connect, 'hodowla')) {
                        echo mysqli_error($connect);
                        mysqli_close($connect);
                        exit();
                    }
                    $result = mysqli_query($connect, "SELECT rasa FROM rasy;");
                    while($row=mysqli_fetch_array($result)){
                        echo "<li>", $row['rasa'], "</li>";
                    }
                ?>
            </ol>
        </section>
        <section class="glowny">
            <img src="american.jpg" alt="Świnka morska rasy american">
            <?php
                $result = mysqli_query($connect, "SELECT DISTINCT swinki.data_ur, swinki.miot, rasy.rasa FROM swinki JOIN rasy ON swinki.rasy_id = rasy.id WHERE swinki.rasy_id=6; ");    
                while($row = mysqli_fetch_array($result)){
                    echo "<h2>Rasa: ", $row['rasa'], " </h2><p>Data urodzenia: ", $row['data_ur'], "</p><p>Oznaczenie miotu: ", $row['miot'], "</p>";
                }
            ?>
            <hr>
            <h2>Świnki w tym miocie</h2>
            <?php
                $result = mysqli_query($connect, "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 6;");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<h3>", $row['imie'], "-", $row['cena'], "</h3><p>", $row['opis'], "</p>";
                }
            ?>
        </section>
       
    </main>
    <footer>Stronę wykonał: Ostap</footer>
</body>
</html>