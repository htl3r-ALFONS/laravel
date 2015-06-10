<?php
class FishName {
    public static function blockfish () {
        $words = ['Alphabet','Altenheim','Amulett','Anlage','Arm','Aufkleber','Auspuff','Auto','Ball','Bar','Baum','Bestell','Liste','Bett','Tuch','Biokraft','Stoff','Blatt','Buch','Thermo','Casting','Show','Mango','Clip','Computer','Dach','Dichtung','Disco','Dollar','Dorf','Schule','Eimer','Eisenbahn','Engel','Erdöl','Ergebnis','Fahrrad','Feuer','Löscher','Film','Foto','Freiheit','Gehirn','Gehweg','Affe','Grundstück','Gymnasium','Hafen','Haus','Heimat','Land','Holz','Horn','Igel','Impfstoff','Information','Infusion','Insel','Jacht','Jacke','Jäger','Job','Center','Jugend','Club','Kaktus','Kamm','Kammer','Keller','Kugel','Leber','Leiste','Leiter','Liebe','Locher','Maus','Monat','Monitor','Musik','Stück','Muskel','Nabelschnur','Nachbar','Nagel','Nase','Natur','Nonne','Not','Obst','Ochse','Offizier','Orgel','Osterei','Paket','Papier','Passwort','Politiker','Poster','Quader','Quark','Quecksilber','Quelle','Quastenflosser','Rabe','Radio','Rakete','Reifen','Rettung','Ritter','Sand','Scanner','Schloss','Stein','Strauch','Tasche','Rechner','Tastatur','Taste','Tiger','Tisch','Turnschuh','Uhr','Ulme','Umschlag','Umwelt','Unwetter','Vanille','Vater','Verdauung','Verkehr','Versicherung','Vogel','Waage','Waggon','Waschzeug','Wasser','Wort','Xylophon','Yogalehrer','Zahn','Zeichen','Zeitung','Zentrum'];
        $random = array_rand($words,2);
        $fishname = $words[$random[0]] . $words[$random[1]];
        return $fishname;
    }
}

