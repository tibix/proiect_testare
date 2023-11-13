### Bookmarks 

## Functionalitate:
- aplicatie web pentru salvarea si gestionarea bookmark-urilor;
- permite accesarea lor din orice browser si orice device atata timp cat este o conexiune la internet;
- necesita cont si autentificare pentru persistenta datelor
- poate fi accesata in mai multe limbi (engleza - default, romana, maghiara??)
- gestionarea profilului in cadrul caruia se pot ajusta setarile de limba
- posiblitatea gestionarii de categorii
- impartirea bookmark-urilor pe categorii
- ???feature pentru exportarea bookmark-urilor in functie de browser ???

## Specificatii:
- la accesarea site-ului utilizatorul va accesa pagina index.html care ii ofera un meniu de help si posibilitatea de a se loga in cont sau de a isi face cont, daca nu are
- header dinamic in functie de statusul utilizatorului (logged in or not) prezent pe fiecare pagina
- footer afisat pe fiecare pagina, care include copyright, data la care a fost lansata aplicatia, GDPR, FAQ, Contact?
- butoane not logged in: Logo/Brand, Help, Sign In, Register
- logo/brand - goes to index.html
- help - afisarea unei ferestre modale unde se gasesc informatii cu privire la folosirea aplicatiei

# Logged out:
- Sign in - deschide pagina sign-in.php
- Register - deschide pagina register.php
- pagina sign-in.php cuprinde un formular in care se vor introduce datele necesare autentificarii + un buton forgot password
- forgot password deschide pagina resetare-parola.php ce cuprinde un mini formular cu un camp in care se va introduce adresa de e-mail pe care se va primi un link ce deschide o pagina cu un formular cu doua campuri: parola noua, confirmare parola noua;
- pagina register.php cuprinde un formular in care se introduc date necesare crearii unui cont (username, nume, prenume, email, language, parola, confirmare parola)

# Logged in:
- Logo/Brand, Home, Help --left
- Account Dropdown menu (Gestionare bookmarks, Edit profile, reset password, log out) -- right
- home button deschide pagina home.php in cadrul careia avem categoriile si istoric/favorite
- gestionare bookmarks care duce la pagina bookmarks.php care va contine lista bookmark-urilor si paginare, iar fiecare bookmark va avea optiuni pentru editare, stergere, favorite button?
- edit profile care duce la pagina profile.php unde avem toate datele utilizatorului ce pot fi editate si apoi schimbarile salvate
- reset password care deschide pagina resetare-parola.php care cuprinde un formular cu 3 campuri : parola curenta, parola noua, confirmare parola noua
- log-out care redirecteaza catre pagina log-out.php, inchizand sesiunea curenta

