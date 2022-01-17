# zmaturuj.me🥳

Maturitná práca - SSOŠ Pro scholaris - 4.AC

Made by **[Denis Uhrík](mailto:uhrikdenis@gmail.com)** &amp; **Samuel Hoskovec**

---

### Navigation

- [1. Repository setup](#repository-setup)
  - [1.1 Composer setup](#composer-setup)
  - [1.2 GitGuardian setup](#gitguardian-setup)
- [2. Úlohy](#ulohy)
  - [2.1 Systém prihlasovania na DP a BP](#systém-prihlasovania-na-dp-a-bp)
  - [2.2 Vlastnosti modulov](#vlastnosti-modulov)
    - [2.2.1 Formulár pre zadávanie tém DP/BP, ktorá obsahuje nasledujúce položky](#formulár-pre-zadávanie-tém-dpbp-ktorá-obsahuje-nasledujúce-položky)
    - [2.2.2 Formulár pre editovanie tém DP/BP](#formulár-pre-editovanie-tém-dpbp)
    - [2.2.3 Formátovaný výpis všetkých tém DP/BP (triedených podľa akademického roka a potom podľa vedúceho DP/BP), ktorá obsahuje nasledujúce položky:](#formátovaný-výpis-všetkých-tém-dpbp-triedených-podľa-akademického-roka-a-potom-podľa-vedúceho-dpbp-ktorá-obsahuje-nasledujúce-položky)
    - [2.2.4 Formulár pre prihlásenie na DP/BP, ktorá obsahuje nasledujúce položky](#formulár-pre-prihlásenie-na-dpbp-ktorá-obsahuje-nasledujúce-položky)
    - [2.2.5 V úvode formulára by mali byť informácie o DP/BP](#v-úvode-formulára-by-mali-byť-informácie-o-dpbp)
    - [2.2.6 Po vyplnení a odoslaní obsahu formulára sa:](#po-vyplnení-a-odoslaní-obsahu-formulára-sa)

---

## Repository setup

```
git clone https://github.com/BrianMSK/zmaturuj.me.git
```

---

#### Composer setup

**Beaware: ❗Composer must be installed on your machine❗**

```
composer install
composer update && composer upgrade
```

---

#### GitGuardian setup

**Beaware: ❗Python 3.x must be installed on your machine❗**

```
pip install pre-commit
pre-commit install --hook-type pre-push
```

---

## Úlohy

#### Systém prihlasovania na DP a BP

> - [ ] Vytvorte systém umožňujúci prihlasovanie na DP (diplomové práce) a BP (bakalárske projekty) cez Internet. Systém by sa mal skladať z viacerých modulov.

#### Vlastnosti modulov:

> ##### Formulár pre zadávanie tém DP/BP, ktorá obsahuje nasledujúce položky:
>
> > - [ ] názov DP/BP
> >
> > - [ ] meno vedúceho DP/BP
> >
> > - [ ] zadanie DP/BP
> >
> > - [ ] akademický rok
> >
> > - [ ] meno/priezvisko/titul diplomanta/bakalára
> >
> > - [ ] email diplomanta/bakalára
>
> ##### Formulár pre editovanie tém DP/BP:
>
> > - [ ] ktorá obsahuje rovnaké položky ako formulár pre zadávanie osôb
> >
> > - [ ] pred editáciou musí prebehnúť overenie uživateľa na základe hesla
>
> ##### Formátovaný výpis všetkých tém DP/BP (triedených podľa akademického roka a potom podľa vedúceho DP/BP), ktorá obsahuje nasledujúce položky:
>
> > - [ ] akademický rok
> >
> > - [ ] názov DP/BP
> >
> > - [ ] vedúci DP/BP
> >
> > - [ ] obsadenie DP/BP (voľné/obsadené)
> >
> > - [ ] prihlásenie na DP/BP (ak je voľný)
>
> ##### Formulár pre prihlásenie na DP/BP, ktorá obsahuje nasledujúce položky:
>
> > - [ ] meno/priezvisko/titul diplomanta/bakalára
> >
> > - [ ] email diplomanta/bakalára
> >
> > - [ ] komentár
>
> ##### V úvode formulára by mali byť informácie o DP/BP:
>
> > - [ ] názov DP/BP
> >
> > - [ ] vedúci DP/BP
> >
> > - [ ] zadanie DP/BP
>
> ##### Po vyplnení a odoslaní obsahu formulára sa:
>
> > - [ ] zadané údaje odoslať na emailovú adresu vedúceho DP/BP
> >
> > - [ ] ešte raz vypíše všetky položky
