# marion_poll

1. Kopeeri kaustad ja failid oma töökeskkonda. 

# config
2. Muuda config_sample faili sisu, kuhu tuleb lisada serveri nimi, andmebaasi nimi, andmebaasi kasutajanimi ja kasutaja andmebaasi sisenemise parool. Seejärel oleks mõistlik muuta config_sample.php nimi config.php'ks. 

3. init_poll.sql failis muuda andmebaasi nimi (sama nimi, mille lisasid config.php faili). 

4. Andmebaasi ja tabelite loomiseks kirjusta  aadressirea lõppu install.php ja vajuta enter. Kui saabub tekst tekst Andmebaas # ja tabelid questions, options ja votes on loodud, siis läks kõik õigesti (andmebaas koos tabelitega on loodud). Lingilt jõuad päevaküsimused lehele.

5. Lingilt Uus päevaküsimus saad sisestada uue küsimuse, lisada valikvastused ning määrata kuupäeva,  millal päevaküsimus on hääletajatele avatud. Kui päevaküsimus on edukalt loodud, siis suunab see sind otse kõigi päevaküsimuste loetelu lehele.

6. Kõik päevaküsimused lehel näed kõik päevaküsimusi, mis on andmebaasi lisatud. Samal lehel saab küsimusi (sh koos vastustega) andmebaasist ka kustutada. Tänase kuupäevaga päevaküsimustele saab oma hääle anda. Varasema kuupäevaga küsimuse tulemusi saab aga graafiliselt vaadata. Tulevikku planeeritud küsimused pole hääletamiseks aktiivsed.

7. Tulemused lingilt saad loetelu küsitlustest, mis on juba lõppenud. Küsimusele vajutades näed küsitluse tulemusi graafiliselt.    

# js 
kaustas on datepicker-et.js failis on kood, mis võimaldab eesti keelset kalendrit

# public 
kaustas on mystyles.css file, kus on mõningad stiilid.

# templates 
kaustas on lehe päis ja jalus

create.php 
kood, mis võimaldab uute küsimuste ja valikvastuste loomist

read.php
kood, mis loeb kõiki küsimusi, valikvastuseid, küsitluse kuupäeva. Siit toimub suunamine ka hääletamise lehele, kui küsimuse kuupäev vastab tänasele kuupäevale.

poll.php
kood, mis salvestab hääletuse ja näitab hääletuse tulemust. Hääletada saab vaid ühe korra (salvestab ip aadressi).

votes.php
kood, mis kuvab hääletuse tulemust pärast hääle andmist sh hääletuse lõpliku tulemust.

results.php
kood, mis kuvab loetelu lõppenud päevaküsimustest ja küstluse tulemused.

delete.php
kood, mis eemaldab küsimuse koos valikvastuste ja salvestatud tulemustega andmebaasist. 



