# Mutation-Testing-PHP

## Testy mutacyjne w PHP
- Framework Humbug
- Humbug wprowadza drobne modyfikacje kodu źródłowego
- Następnie Humbug odpala testy w phpunit by sprawdzić czy zakończyły się niepowodzeniem
- Jeśli, któraś z mutacji nie wywołała błędnego testu, 
to prawdopodobnie źle został otestowany ten fragment kodu

## W przykładzie został wykorzystany wzorzec projektowy dekorator 
- gdy dany obiekt jest podatny na rozszerzenia

![alt tag](https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Decorator_classes_pl.svg/400px-Decorator_classes_pl.svg.png)

## Instalacja i konfiguracja

- git clone https://github.com/padraic/humbug.git
- cd humbug
- composer install

Przechodzimy do folderu z naszym projektem 
(warto sprawdzić czy mamy ten sam phpunit version w projekcie i w humbug)

Odpalamy testy w krokach: 
- phpunit --tap (by zobaczyć czy wszystkie testy przechodzą)
- ../humbug/bin/humbug configure 
(tylko przy pierwszym uruchomieniu - by wygenerować plik humbuglog.txt)
- ../humbug/bin/humbug run

Raport w pliku:
- humbuglog.txt

Konfiguracja leci do tmp:
- tmp/humbug/

Uwaga:
- jeśli w projekcie będzie __autoload to niestety się on nie odpali pod humbug działa np. spl_autoload_register('AutoLoader');
- musi być tak skonfigurowany phpunit.xml, że przy odpaleniu komendy php phpunit.phar –tap odpalają się poprawnie testy:
```xml
<testsuite name='Mutation-Testing-PHP'>
    <directory suffix='.php'>tests/</directory>
</testsuite>
```
