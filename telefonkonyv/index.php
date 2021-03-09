<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Varga Tamás</title>
        <link href="formazas.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
        <script src="feldolgoz.js" type="text/javascript"></script>
    </head>
    <body>
        <main>
            <header><h1>Telefonkönyv</h1></header>
            <nav>
                <ul>

                    <li id="beolvas"><a href="#">Beolvas</a></li>
                </ul>

            </nav>

            <section>
                <from class="urlap">
                    <p for="nev">név:</p>
                    <input type="text" id="nev" name="nev" value="Valaki Vagyok">
                    <p for="tel">tel:</p>
                    <input type="text" id="tel" name="tel" value="03-30-1234-567">
                    <p for="kep">kép:</p>
                    <input type="text" id="kep" name="kep">
                    <br>
                    <button id="kuld">Küld</button>
                </from>
            </section>
            <section>
                <from class="urlap elrejt">
                    <p for="id12">ID:</p>
                    <input type="text" id="id2" name="id2">
                    <p for="nev2">név:</p>
                    <input type="text" id="nev2" name="nev2">
                    <p for="tel2">tel:</p>
                    <input type="text" id="tel2" name="te2l">
                    <p for="kep2">kép:</p>
                    <input type="text" id="kep2" name="kep2">
                    <br>
                    <input type="button" id="modosit" value="Modosít">
                    <br>
                    <input type="button" id="megse" value="Mégse">
                </from>
            </section>

            <article>


            </article>
        </main>
    </body>
</html>
