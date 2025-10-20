# Challenge 08: Pokédex Database Constructie

Dit project richt zich op de geautomatiseerde constructie van een Pokédex-database. Het maakt gebruik van een Node.js-script (`fetch_and_insert.js`) om uitgebreide Pokémon-gegevens op te halen van de officiële PokéAPI en deze te structureren in een lokale MySQL-database.

## Functionaliteit van `fetch_and_insert.js`

Het script automatiseert het proces van data-acquisitie en -opslag, waarbij de volgende stappen worden uitgevoerd:

1.  **Gegevensextractie van PokéAPI:** Voor elke Pokémon (van ID 1 tot 1010) worden gedetailleerde gegevens opgehaald. Deze omvatten:
    *   **Algemene informatie:** `id`, `name`, `height`, `weight`, `base_experience`.
    *   **Visuele data:** `image_url` (officiële artwork).
    *   **Soortspecifieke data:** `species_url`, `genus`, `flavor_text`, `growth_rate`, `base_happiness`, `capture_rate`, `gender_rate`.
    *   **Gevechtsstatistieken:** `hp`, `attack`, `defense`, `sp_attack`, `sp_defense`, `speed`.
    *   **Eigenschappen:** `types`, `abilities`, `egg_groups`.

2.  **Database-integratie:** De opgehaalde gegevens worden opgeslagen in een gestructureerde `pokedex`-database, die de volgende tabellen omvat:
    *   `pokemon`: Bevat de basisgegevens van elke Pokémon.
    *   `types`: Definieert de verschillende elementaire typen (bijv. 'fire', 'water', 'grass').
    *   `abilities`: Lijst van unieke vaardigheden van Pokémon.
    *   `stats`: Gedetailleerde gevechtsstatistieken per Pokémon.
    *   `species`: Informatie over de soort, inclusief genus en smaaktekst.
    *   `egg_groups`: Definieert de eiergroepen voor voortplanting.
    *   `pokemon_types`, `pokemon_abilities`, `pokemon_egg_groups`: Koppeltabellen voor het beheren van vele-op-vele relaties tussen Pokémon en hun eigenschappen.

## Doel

Dit project demonstreert een robuuste methode voor het programmatisch vullen van een relationele database met externe API-gegevens. Dit is een essentiële vaardigheid voor het bouwen van data-gedreven applicaties, zoals een Pokédex.
