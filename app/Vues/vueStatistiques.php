<script>
    var xhr = getXMLHttpRequest();
    var counter = 0;

    function LineGraph(canvasId) {
        /**
         * Dessiner un graphique sur un Canvas HTML5
         * @author: http://www.fobec.com/tuto/1153/dessiner-graph-sur-canvas-html5.html
         */
            //Interne - ne pas modifier ces valeurs
        var canvas_ctx = null;
        var canvas_obj = null;
        var dataset = {serie: []};
        var xLabelStep;
        var yMax = 0;

        //const: marge gauche et droite
        var marginX = 30;
        //const: marge en haut et en bas
        var marginY = 20;
        //nombre de valeur a afficher sur axe X
        var yStep = 5;


        //Constructor
        var canvas_obj = document.getElementById(canvasId);
        canvas_ctx = canvas_obj.getContext('2d');
        //Dessiner un fond blanc
        canvas_ctx.beginPath();
        canvas_ctx.fillStyle = '#fff';
        canvas_ctx.fillRect(0, 0, canvas_obj.width, canvas_obj.height);
        canvas_ctx.stroke();

        /**
         * Dessiner les axes verticaux
         * @returns {undefined}
         */
        this.drawAxis = function () {
            canvas_ctx.lineWidth = 2;
            canvas_ctx.strokeStyle = '#333';
            canvas_ctx.fillStyle = '#333';
            canvas_ctx.beginPath();
            canvas_ctx.textAlign = "right"
            canvas_ctx.textBaseline = "middle";
            //label de l'axe Y
            var yVal;
            for (var i = 0; i <= yStep; i++) {
                yVal = (yMax / yStep) * i;
                canvas_ctx.fillText(Math.round(yVal), marginX - 10, yValuetoGraph(yVal));
            }
            canvas_ctx.stroke();
            //Barre verticales
            canvas_ctx.beginPath();
            canvas_ctx.strokeStyle = '#666';
            canvas_ctx.lineWidth = .5;
            for (var i = 0; i <= yStep; i++) {
                yVal = (yMax / yStep) * i;
                canvas_ctx.moveTo(marginX, yValuetoGraph(yVal) + 2);
                canvas_ctx.lineTo(canvas_obj.width - marginX, yValuetoGraph(yVal) + 2);
            }

            canvas_ctx.stroke();
            calcXStep();
        }

        /**
         * Ajouter une valeur X,Y à la serie
         * @param {string} x
         * @param {int} y
         */
        this.addPoint = function (x, y) {
            dataset.serie.push({X: x, Y: y});
            if (y > yMax) {
                yMax = y;
            }
        }

        /**
         * Dessiner la courbe
         */
        this.drawLine = function () {
            canvas_ctx.beginPath();
            canvas_ctx.strokeStyle = '#DF4926';
            canvas_ctx.lineWidth = 3;
            canvas_ctx.moveTo(xValuetoGraph(0), yValuetoGraph(dataset.serie[0].Y));
            //line
            for (var i = 1; i < dataset.serie.length; i++) {
                canvas_ctx.lineTo(xValuetoGraph(i), yValuetoGraph(dataset.serie[i].Y));
            }
            canvas_ctx.stroke();
            //point
            canvas_ctx.fillStyle = '#333';
            for (var i = 0; i < dataset.serie.length; i++) {
                /* canvas_ctx.beginPath();
                 canvas_ctx.arc(xValuetoGraph(i), yValuetoGraph(dataset.serie[i].Y), 4, 0, Math.PI * 2, true);
                 canvas_ctx.fill();*/
            }

            //label x
            canvas_ctx.beginPath();
            var ilabelstep = xLabelStep;
            for (var i = 0; i < dataset.serie.length; i++) {
                //Bidouillage pour eviter la superposition de label sur l'axe X
                if (xLabelStep > 1) {
                    if (ilabelstep >= xLabelStep) {
                        canvas_ctx.fillText(dataset.serie[i].X, xValuetoGraph(i) + (marginX / 2), yValuetoGraph(0) + (marginY / 2) + 5);
                        ilabelstep = 0;
                    }
                    ilabelstep++;
                } else {
                    canvas_ctx.fillText(dataset.serie[i].X, xValuetoGraph(i) + (marginX / 2), yValuetoGraph(0) + (marginY / 2) + 5);
                }
            }
            canvas_ctx.stroke();
        }

        /**
         * Regle par 3 pour X
         * @param {type} xIdx
         */
        function xValuetoGraph(xIdx) {
            var serielen = dataset.serie.length;
            var xArea = canvas_obj.width - (marginX * 2);
            var xPos = ((xArea / serielen) * xIdx) + marginX;
            return xPos;
        }

        /**
         * Regle par 3 pour Y
         * @param {type} xIdx
         */
        function yValuetoGraph(yVal) {
            var yArea = canvas_obj.height - (marginY * 2);
            var yPos = canvas_obj.height - marginY - ((yVal * yArea) / yMax);
            return yPos;
        }

        /**
         * Définir le nombre de label sur l'axe X
         * @returns {undefined}
         */
        function calcXStep() {
            var text;
            var xArea = canvas_obj.width - (marginX * 2);
            for (var i = 0; i < dataset.serie.length; i++) {
                text += ' ' + dataset.serie[i].X + ' ';
            }
            var metrics = canvas_ctx.measureText(text);
            var width = metrics.width;
            xLabelStep = Math.round(width / xArea);
        }
    }

    function elecStat() {
        // alert ("toto");

        document.getElementById('imgsun').style.visibility = "hidden";
        document.getElementById('imgweather').style.visibility = "hidden";

        var lineGraph = new LineGraph("canvas_stat");
        lineGraph.addPoint("janv", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("fevr", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("mars", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("avr", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("mai", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("juin", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("juil", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("aout", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("sept", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("oct", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("nov", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("dec", Math.floor((Math.random() * 100) + 1));
        lineGraph.drawAxis();
        lineGraph.drawLine();
        GetelecStat("electricite", "1");


    }

    function DessineValeurCapteur(values) {

        var lineGraph = new LineGraph("canvas_stat");


        for (cpt = 0; cpt < values.length; cpt++) {

            lineGraph.addPoint(values[cpt][0], values[cpt][1]);

        }
        lineGraph.addPoint("janv", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("fevr", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("mars", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("avr", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("mai", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("juin", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("juil", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("aout", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("sept", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("oct", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("nov", Math.floor((Math.random() * 100) + 1));
        lineGraph.addPoint("dec", Math.floor((Math.random() * 100) + 1));
        lineGraph.drawAxis();
        lineGraph.drawLine();

    }

    function TempStat(id) {
        // alert ("toto");

        document.getElementById('imgsun').style.visibility = "hidden";
        document.getElementById('imgweather').style.visibility = "hidden";


//GetStatJson("electricite", "1");
        var values = GetempStat("temperature", id);


    }

    function getXMLHttpRequest() {
        var xhr = null;

        if (window.XMLHttpRequest || window.ActiveXObject) {
            if (window.ActiveXObject) {
                try {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            } else {
                xhr = new XMLHttpRequest();
            }
        } else {
            alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
            return null;
        }

        return xhr;
    }


    function GetStatJson(type, cycle) {


        ajaxGet("GetDataStat.php?typeStat=type&TypeCycle=bidule", afficher);
    }

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            alert("OK"); // C'est bon \o/
        }
    };


    function GetempStat(type, cycle) {

        var Url = "app/Modeles/GetDataStat.php?typeStat=";
        Url = Url + type;
        Url = Url + "&TypeCycle=";
        Url = Url + cycle;
        Url = Url + "&IdCapteur=";
        Url = Url + 7;
        Url = Url + "&IdPiece=";
        Url = Url + "1";

        var date = document.getElementById("choix_date").value;
        // echo 'Le '.date('d/m/Y', choix_date).' &agrave; '.date('H:i:s', choix_date);
        Url = Url + "&DateSelected=";
        Url = Url + date;


        xhr.open("GET", Url, true);
        xhr.send(null);
    }


    function GetelecStat(type, cycle) {

        var Url = "Modeles/GetDataSat.php?typeStat=";
        Url = Url.type;
        Url = "&TypeCycle=";
        Url = Url.cycle;

        xhr.open("GET", "GetDataStat.php?typeStat=type&TypeCycle=bidule", true);
        xhr.send(null);
    }

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            alert("OK receive"); // C'est bon \o/

            var parser = new DOMParser();
            var xmlDoc = parser.parseFromString(xhr.responseText, "text/xml");
            var nodes = xmlDoc.getElementsByTagName("item");


            var Valeurs = new Array();
            var timestamps = new Array();


            //oSelect.innerHTML = "";
            for (var i = 0, c = nodes.length; i < c; i++) {

                value = document.createTextNode(nodes[i].getAttribute("valeur")).textContent;
                Valeurs[i] = value;

                timestamp = document.createTextNode(nodes[i].getAttribute("timestamp")).textContent;

                timestamps[i] = timestamp;
            }
            var tabValeur = new Array(Valeurs, timestamps);
            DessineValeurCapteur(tabValeur)
        }
    };


    // Exécute un appel AJAX GET
    // Prend en paramètres l'URL cible et la fonction callback appelée en cas de succès
    function ajaxGet(url, callback) {
        var req = new XMLHttpRequest();
        req.open("GET", url);
        req.addEventListener("load", function () {
            if (req.status >= 200 && req.status < 400) {
                // Appelle la fonction callback en lui passant la réponse de la requête
                callback(req.responseText);
            } else {
                console.error(req.status + " " + req.statusText + " " + url);
            }
        });
        req.addEventListener("error", function () {
            console.error("Erreur réseau avec l'URL " + url);
        });
        req.send(null);
    }

    function afficher(reponse) {
        console.log(reponse);
    }

    //  ajaxGet("http://localhost/javascript-web-srv/data/langages.txt", afficher);
    ajaxGet("", afficher);

</script>

<form action="" method="post">
    <label for="habitation"><p>Choix de l'habitation :</p></label>
    <select name="habitation">
        <?php foreach ($habitations as $key => $value): ?>
            <?php foreach ($value as $key => $value2): ?>
                <option value="<?php echo $value2 ?>"><?php echo $value2 ?>"</option>
            <?php endforeach; ?>
        <?php endforeach; ?>

    </select>
    <input class="submit-button" name="valider-Piece" type="submit" value="Go!">
</form></br>
<form action="" method="post">
    <label for="habitation"><p>Choix de la pièce :</p></label>
    <select name="habitation">
        <?php foreach ($habitations as $key => $value): ?>
            <?php foreach ($value as $key => $value2): ?>
                <option value="<?php echo $value2 ?>"><?php echo $value2 ?>"</option>
            <?php endforeach; ?>
        <?php endforeach; ?>

    </select>
    <input class="submit-button" name="valider-Piece" type="submit" value="Go!">
</form></br>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron"><img
                        src="data:image/jpeg;base64,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"
                        alt="Résultat de recherche d'images pour 'plan maison'"/>
                <img src="public/images/elec.png" alt="Elec face" height="42" width="42" id="imgelec"/>
                <img src="public/images/sun.png" alt="Elec face" height="42" width="42" id="imgsun"/>
                <img src="public/images/temperature.png" alt="Elec face" height="42" width="42" id="imgweather"/>

                <div class="row">

                    <div class="col-lg-2 col-lg-offset-4 col-md-offset-4 col-md-2 col-sm-offset-3 col-sm-3 col-xs-offset-3 col-xs-3">
                        <p>&nbsp;</p>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <p>&nbsp;</p>
                    </div>
                </div>

                <div><input type="date" name="choix_date" id="choix_date" value="2018-01-15"></div>
                <div class="row">

                    <div class="col-lg-2 col-lg-offset-4 col-md-offset-4 col-md-2 col-sm-offset-3 col-sm-3 col-xs-offset-3 col-xs-3">
                        <p>&nbsp;</p>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <p>&nbsp;</p>
                    </div>
                </div>
                <div class="row">


                    <ul id="nav">


                        <ul id="menu-demo2">
                            <li><a href="#">Temperature</a>
                                <ul>
                                    <li><a href="#" id="temp_journalier" onclick="TempStat(this.id)">Cycle
                                            Journaliers</a></li>
                                    <li><a href="#">Cycle hebdomadaire</a></li>
                                    <li><a href="#">Cycle Annuel</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Humidité</a>
                                <ul>
                                    <li><a href="#">Cycle Journaliers</a></li>
                                    <li><a href="#">Cycle hebdomadaire</a></li>
                                    <li><a href="#">Cycle Annuel</a></li>
                                </ul>
                            </li>
                            <li><a href="#">CO2</a>
                                <ul>
                                    <li><a href="#">Cycle Journaliers</a></li>
                                    <li><a href="#">Cycle hebdomadaire</a></li>
                                    <li><a href="#">Cycle Annuel</a></li>
                                </ul>
                            </li>
                            <li><a href="#">luminosité</a>
                                <ul>
                                    <li><a href="#">Cycle Journaliers</a></li>
                                    <li><a href="#">Cycle hebdomadaire</a></li>
                                    <li><a href="#">Cycle Annuel</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Fumée</a>
                                <ul>
                                    <li><a href="#">Cycle Journaliers</a></li>
                                    <li><a href="#">Cycle hebdomadaire</a></li>
                                    <li><a href="#">Cycle Annuel</a></li>
                                </ul>
                            </li>

                        </ul>


                </div>
            </div>
        </div>
    </div>
</div>


<section class="well">
    <h2 class="text-center"> Statistiques </h2>
    <hr>
    <div class="container">
        <div class="row">
            <div>
                <canvas id='canvas_stat' width='400' height='200'></canvas>
                <table id="tableau" summary="Classement Blogspot par Wikio - Mai 2010">
                    <thead>
                    <tr>
                        <th scope="col">Jour</th>
                        <th scope="col">Moyenne</th>
                        <th scope="col">Pic Min</th>
                        <th scope="col">Pic Max</th>

                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Lundi</td>
                        <td>15</td>
                        <td>1</td>

                    </tr>
                    <tr>
                        <td>Mardi</td>
                        <td>15</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Mercredi</td>
                        <td>15</td>
                        <td>1</td>
                    </tr>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</section>
<div class="container"></div>
<hr>
<div class="container"></div>
<div class="container">
    <div class="row"></div>
</div>
<div class="container"></div>
<hr>
<div class="container"></div>
<hr>
<footer class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Copyright © MyWebsite. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="public/js/bootstrap.js"></script>
