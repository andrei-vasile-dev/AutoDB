

Descrierea proiectului: Acesta este un site web care oferă informații despre modele de mașini, creat cu PHP, HTML și CSS, fără a utiliza vreun framework. Interfața sa este destul de simplă deoarece accentul a fost pus pe proiectarea bazei de date MySQL cu care site-ul este conectat, cât și pe operațiile efectuate asupra acesteia. Practic, prin intermediul acestei aplicații web utilizatorul poate viziona sub o formă mai "prietenoasă" informațiile despre modelul de mașină ales stocate în baza de date.


Diagrama relațională (ERD - Entity Relationship Diagram) poate fi observată în următorul filmuleț:


![Diagrama relațională](Imagini/video1.gif)


Proiectul a fost gândit astfel încât prin intermediul site-ului web utilizatorul să efectueze asupra bazei de date interogări care să exemplifice operațiile de bază ale algebrei relaționale și anume:
1. Cel puțin o operație pentru reuniune, diferență, selecție, proiecție și joncțiune
2. 2 operații de joncțiune care implică cel puțin alte două operații intermediare (reuniune, diferență, selecție, proiecție), anterioare joncțiunii.

Totodată, baza de date a fost trecută prin procesul de normalizare și a fost adusă până în Forma Normală 3 (FN3).


În următorul filmuleț se poate vedea cum arată o parte din aplicația web (vă rog să aveți răbdare deoarece GIF-ul se încarcă mai greu și poate dura 1-2 minute până apare)


![GIF Web](Imagini/video2.gif)


Instalare și rulare:
1. Clonează repo-ul (git clone https://github.com/andrei-vasile-dev/AutoDB.git)
2. Configurează baza de date (creează o bază de date MySQL, importă fișierul masinibd.sql și actualizează fișierul config.php cu datele tale de acces la MySQL)
3. Rulează site-ul -> Pune proiectul într-un server local (ex: XAMPP, WAMP, MAMP) și accesează în browser http://localhost/nume-proiect/