
# Skaner Polskich Jaskiń
Skaner powstał by wspierać misję statutową **Państwowego Instytutu Geologicznego - Państwowego Instytutu Badawczego** - ułatwiając dostęp do zasobów znajdujących się w bazach danych  http://baza.pgi.gov.pl/

Program automatycznie skanuje Centralną Bazę Danych Geologicznych poszukując informacji o jaskiniach i zapisuje je w formacie PDF. 

Skaner wciąż jest rozwijany - ale już można z niego korzystać.


## Wymagania
Aktualnie Skaner wymaga 

 - PHP 7 + (mbstring)
 - Composer

## Instalacja:

Pobieramy repozytorium za pomocą git'a:

    git clone git@github.com:waldekgraban/polish_caves_scanner.git

Wchodzimy w pobrany folder i instalujemy zależności:
	

    composer install


## Sposób użycia 

Aby uruchomić skaner w głównym katalogu startujemy server na dowolnym porcie np.:

    php -S localhost:8001
I uruchamiamy program np. w przeglądarce inernetowej (adres: localhost:8001)

W trakcie skanowania w katalogu **/src/caves** zaczną się pojawiać pliki pdf ze znalezionymi jaskiniami.

Możesz również ręcznie ustawić zakres skanowanych adresów CBDG.
W pliku **/src/index.php** znajdują się dwie zmienne:

    $minNumber = 390;	//minimalny numer strony (niżej nic nie ma)
    $maxNumber = 9999;  	//maksymalny numer strony.

W takim zakresie skanowanie powinno trwać krócej niż 15 min i zwrócić ponad 3000 plików pdf.

Modyfikacja tych zmiennych zapewnia możliwość skanowania wybranego przez Ciebie obszaru CBDG.


## Logowanie skanowania
W trakcie skanowania warto podglądać co aktualnie dzieje się w aplikacji.
Tymczasowo służą do tego logi.  Możemy je podglądać "na żywo" np tak:

Wszystkie logi:
	
    tail -f -n 300 src/logs/logs.txt

Tylko odnalezione jaskinie:

     tail -f -n 300 src/logs/success.txt

Tylko błędne adresy:

     tail -f -n 300 src/logs/error.txt


## Plany na przyszłość

 - Interfejs graficzny - program desktopowy.
 - Możliwość wyszukiwania jaskini wg. kryteriów
 - Wsparcie dla większej ilości formatów plików
 - Optymalizacja czasu skanowania

