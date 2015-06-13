@extends('myPage.masterview')

<div class="container">
        <div class="row hidden-xs hidden-sm">
        </div>
        <div class="row">
            <div class="alfons col-md-5 col-sm-5 hidden-xs">
                <img src="{{ asset('ALFONS_box.svg') }}">
            </div>
            <div class="inhalt col-md-7 col-lg-7">
                <h1>Anonymes Feedback</h1>
                <p class="bold">ALFONS steht für „Anonymes Lehrer Online Feedback System“. Und genau das ist die Philosophie dieser Plattform. Schüler können Lehrern anonym Feedback geben. Lehrer können spezifische Fragen an Schüler stellen, um den Unterricht gezielt zu verbessern. Solche Systeme stoßen von Seiten der Lehrer oft auf Widerstand, sie fürchten nicht konstruktive Kritik (was bei einer Schule sehr gerechtfertigt ist). Deshalb haben wir ein halbanonymes System entwickelt, bei dem es über mehrere Instanzen möglich ist, den Feedbackgebenden auszuforschen. Auf unserem Server werden keine Schülernamen gespeichert, sondern nur IDs. Die Schülervertretung besitzt die Zuweisung von ID zu Name. Wenn eine Beschwerde bei uns eingeht, leiten wir diese, sofern das besagte Feedback gegen unsere <a href="/richtlinien">Richtlinien</a> (in einem Satz zusammengefasst: „schreibe dein Feedback respektvoll“) verstößt, an die Schülervertretung weiter. Diese entscheidet dann, wie schwerwiegend der Verstoß war. Geringe Verstöße führen zu einer Löschung des Accounts. Bei schweren Verstößen geben wir die ID des Feedbackgebenden an die Schülervertretung weiter. Dann kann den Namen des Schülers dem entsprechenden Lehrer sagen. Disziplinäre Konsequenzen durch die Schulleitung und die Abteilungsleitung können folgen.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <a href="login"><button type="button" class="btn btn-primary btn-block">Login Here</button></a>
            </div>
        </div>
</div>