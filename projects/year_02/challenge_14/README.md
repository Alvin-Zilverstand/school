# Challenge 14: Magazijn App Plannen - Gedetailleerd Ontwerp

---

[<-- Back to Main README](../../../../README.md)

---

Dit project omvat de gedetailleerde planning en het conceptuele ontwerp van een magazijn-app. Deze app is specifiek bedoeld voor het beheer van uitleenbare materialen aan studenten en docenten binnen een onderwijsinstelling. Het hoofddoel is het organiseren en stroomlijnen van het uitleenproces, om zo verlies te minimaliseren en het voorraadbeheer te optimaliseren.

## Belangrijkste Functionaliteiten van de App

De app is ontworpen met de volgende kernfunctionaliteiten:

*   **Gebruikersbeheer:** Ondersteuning voor verschillende gebruikersrollen (beheerder, medewerker, gebruiker) met bijbehorende rechten.
*   **Itembeheer:** Mogelijkheid om materialen toe te voegen, aan te passen en te verwijderen uit de inventaris.
*   **Uitleensysteem:** Een intuïtief systeem voor het registreren van het uitlenen en terugbrengen van materialen.
*   **Status-tracking:** Realtime inzicht in de status van elk item (uitgeleend, geretourneerd, te laat).
*   **Notificaties:** Geautomatiseerde berichten aan gebruikers, bijvoorbeeld ter herinnering aan een naderende retourdatum.
*   **Boetesysteem:** Een mechanisme voor het beheren van boetes voor te laat ingeleverde materialen.

## Database Opbouw (Entity-Relationship Diagram - ERD)

De database is conceptueel ontworpen met de volgende entiteiten en hun onderlinge relaties:

### Entiteiten en Attributen

1.  **Gebruiker**
    *   `gebruiker_id` (Primaire Sleutel)
    *   `gebruikersnaam`
    *   `wachtwoord`
    *   `e-mail`
    *   `rol` (beheerder, medewerker, gebruiker)
    *   `registratiedatum`

2.  **Item**
    *   `item_id` (Primaire Sleutel)
    *   `naam`
    *   `beschrijving`
    *   `categorie`
    *   `beschikbaarheid` (boolean)
    *   `locatie`

3.  **Uitleen**
    *   `uitleen_id` (Primaire Sleutel)
    *   `gebruiker_id` (Vreemde Sleutel)
    *   `item_id` (Vreemde Sleutel)
    *   `uitleendatum`
    *   `retourdatum`
    *   `status` (uitgeleend, geretourneerd, te laat)

4.  **Notificatie**
    *   `notificatie_id` (Primaire Sleutel)
    *   `gebruiker_id` (Vreemde Sleutel)
    *   `bericht`
    *   `datum`
    *   `gelezen` (boolean)

5.  **Boete**
    *   `boete_id` (Primaire Sleutel)
    *   `uitleen_id` (Vreemde Sleutel)
    *   `bedrag`
    *   `betaald` (boolean)

### Relaties

*   Een **Gebruiker** kan meerdere **Uitleen**-records hebben (leent meerdere spullen).
*   Een **Item** kan in meerdere **Uitleen**-records voorkomen (wordt door meerdere mensen geleend).
*   Elke **Uitleen** is gekoppeld aan één **Gebruiker** en één **Item**.
*   Een **Gebruiker** kan meerdere **Notificaties** ontvangen.
*   Een **Notificatie** is gekoppeld aan één **Gebruiker**.
*   Een **Uitleen** kan één **Boete** hebben (indien het item te laat is ingeleverd).

Dit gedetailleerde plan dient als blauwdruk voor de implementatie van de magazijn-app in toekomstige fases.

---

[View Project](./Challenge_14_Magazijn_App_plannen)