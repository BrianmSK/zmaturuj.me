<div align="center">

# zmaturuj.me🥳

<p float="left">

<img src="https://img.shields.io/github/languages/count/brianmsk/zmaturuj.me?style=flat-square" />
<img src="https://img.shields.io/github/languages/top/brianmsk/zmaturuj.me?style=flat-square" />
<img src="https://img.shields.io/tokei/lines/github/brianmsk/zmaturuj.me?style=flat-square" />
<img src="https://img.shields.io/github/repo-size/brianmsk/zmaturuj.me?style=flat-square" />
<img src="https://img.shields.io/github/issues-pr-closed-raw/brianmsk/zmaturuj.me?style=flat-square" />
<img src="https://img.shields.io/github/license/brianmsk/zmaturuj.me?style=flat-square" />
<img src="https://img.shields.io/github/contributors/brianmsk/zmaturuj.me?style=flat-square" />
<img src="https://img.shields.io/github/commit-activity/y/brianmsk/zmaturuj.me?style=flat-square" />
<img src="https://img.shields.io/github/last-commit/brianmsk/zmaturuj.me?style=flat-square" />

</p>
Maturitná práca - SSOŠ Pro scholaris - 4.AC

Made by **[Denis Uhrík](https://linktr.ee/denisuhrik)** &amp; **Samuel Hoskovec**

</div>

---

## Navigation

- [1. Repository setup](#repository-setup)
  - [1.1 Composer setup](#composer-setup)
  - [1.2 GitGuardian setup](#gitguardian-setup)
- [2. Úlohy](#ulohy)
  - [2.1 Systém prihlasovania na DP a BP](#systém-prihlasovania-na-dp-a-bp)
  - [2.2 Vlastnosti modulov](#vlastnosti-modulov)
    - [2.2.1 Formulár pre zadávanie tém DP/BP](#formulár-pre-zadávanie-tém-dpbp-ktorá-obsahuje-nasledujúce-položky)
    - [2.2.2 Formulár pre editovanie tém DP/BP](#formulár-pre-editovanie-tém-dpbp)
    - [2.2.3 Formátovaný výpis všetkých tém DP/BP](#formátovaný-výpis-všetkých-tém-dpbp-triedených-podľa-akademického-roka-a-potom-podľa-vedúceho-dpbp-ktorá-obsahuje-nasledujúce-položky)
    - [2.2.4 Formulár pre prihlásenie na DP/BP](#formulár-pre-prihlásenie-na-dpbp-ktorá-obsahuje-nasledujúce-položky)
    - [2.2.5 Informácie o DP/BP v úvode](#v-úvode-formulára-by-mali-byť-informácie-o-dpbp)
    - [2.2.6 Vyplnenie a odoslanie formularu](#po-vyplnení-a-odoslaní-obsahu-formulára-sa)

---

## Repository setup

**Don't forget to rename config.php.sample to config.php and fill-in the variables ❗**

```
git clone https://github.com/BrianMSK/zmaturuj.me.git
```

---

### Composer setup

**Beaware: Composer must be installed on your machine ❗**

```
composer install
composer update && composer upgrade
```

---

### [GitGuardian setup](https://docs.gitguardian.com/internal-repositories-monitoring/integrations/git_hooks/pre_push)

**Beaware: Use only if you want to use pre-push by GitGuardian ❗**

- **Don't forget there has to be .env file with API to GitGuardian ❗**

```
GITGUARDIAN_API_KEY=APIKEY
```

- **Python 3.X must be installed on your machine ❗**

```
pip install pre-commit
pre-commit install --hook-type pre-push
```

---

## Úlohy

### Work In Progress

- [ ] [Form to submit Bachelors/Masters degree topic #5](https://github.com/BrianMSK/zmaturuj.me/issues/5)
- [ ] [Form to edit Bachelors/Masters degree topic #6](https://github.com/BrianMSK/zmaturuj.me/issues/6)
- [ ] [Output all the topics of Bachelors/Masters degree #7](https://github.com/BrianMSK/zmaturuj.me/issues/7)

### Systém prihlasovania na DP a BP

> - [x] Vytvorte systém umožňujúci prihlasovanie na DP (diplomové práce) a BP (bakalárske projekty) cez Internet. Systém by sa mal skladať z viacerých modulov.

### Vlastnosti modulov:

> #### Formulár pre zadávanie tém DP/BP, ktorá obsahuje nasledujúce položky:
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
> #### Formulár pre editovanie tém DP/BP:
>
> > - [ ] ktorá obsahuje rovnaké položky ako formulár pre zadávanie osôb
> >
> > - [ ] pred editáciou musí prebehnúť overenie uživateľa na základe hesla
>
> #### Formátovaný výpis všetkých tém DP/BP (triedených podľa akademického roka a potom podľa vedúceho DP/BP), ktorá obsahuje nasledujúce položky:
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
> #### Formulár pre prihlásenie na DP/BP, ktorá obsahuje nasledujúce položky:
>
> > - [ ] meno/priezvisko/titul diplomanta/bakalára
> >
> > - [ ] email diplomanta/bakalára
> >
> > - [ ] komentár
>
> #### V úvode formulára by mali byť informácie o DP/BP:
>
> > - [ ] názov DP/BP
> >
> > - [ ] vedúci DP/BP
> >
> > - [ ] zadanie DP/BP
>
> #### Po vyplnení a odoslaní obsahu formulára sa:
>
> > - [ ] zadané údaje odoslať na emailovú adresu vedúceho DP/BP
> >
> > - [ ] ešte raz vypíše všetky položky
