# Challenge 14: Magazijn App

## Over dit project

Voor studenten en docenten liggen er in het magazijn veel materialen die ze kunnen gebruiken. Een app om deze spullen te lenen is een goede oplossing om alles netjes te organiseren. Met de app kun je makkelijk bijhouden wie wat leent en wanneer het terug moet. Zo raken spullen niet meer kwijt. Dit bespaart tijd, zorgt voor minder verwarring en maakt het voorraadbeheer een stuk makkelijker.

## Functies

Dit zijn de belangrijkste functies van de app:

*   **Gebruikers:** Je kunt verschillende rollen aanmaken (beheerder, medewerker, gebruiker).
*   **Items:** Je kunt spullen toevoegen, aanpassen en verwijderen.
*   **Uitleensysteem:** Een systeem om spullen te lenen en terug te brengen.
*   **Status:** Je kunt zien of iets is uitgeleend, teruggebracht of te laat is.
*   **Notificaties:** Gebruikers krijgen een berichtje, bijvoorbeeld als ze iets moeten terugbrengen.
*   **Boetes:** Een systeem voor boetes als spullen te laat terugkomen.

## Database Opbouw (ERD)

Hieronder zie je hoe de database is opgebouwd.

### Entiteiten en Attributen

**1. Gebruiker**
*   `gebruiker_id` (PK)
*   `gebruikersnaam`
*   `wachtwoord`
*   `e-mail`
*   `rol` (beheerder, medewerker, gebruiker)
*   `registratiedatum`

**2. Item**
*   `item_id` (PK)
*   `naam`
*   `beschrijving`
*   `categorie`
*   `beschikbaarheid` (boolean)
*   `locatie`

**3. Uitleen**
*   `uitleen_id` (PK)
*   `gebruiker_id` (FK)
*   `item_id` (FK)
*   `uitleendatum`
*   `retourdatum`
*   `status` (uitgeleend, geretourneerd, te laat)

**4. Notificatie**
*   `notificatie_id` (PK)
*   `gebruiker_id` (FK)
*   `bericht`
*   `datum`
*   `gelezen` (boolean)

**5. Boete**
*   `boete_id` (PK)
*   `uitleen_id` (FK)
*   `bedrag`
*   `betaald` (boolean)

### Relaties

*   Een **Gebruiker** kan meerdere spullen **lenen** (meerdere Uitleen-records).
*   Een **Item** kan door meerdere mensen **geleend worden** (meerdere Uitleen-records).
*   Elke **Uitleen** hoort bij één **Gebruiker** en één **Item**.
*   Een **Gebruiker** kan meerdere **Notificaties** krijgen.
*   Een **Notificatie** hoort bij één **Gebruiker**.
*   Een **Uitleen** kan een **Boete** hebben (als het te laat is).
