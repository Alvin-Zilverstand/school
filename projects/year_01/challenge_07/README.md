# Challenge 07: Schoolkantine Bestelsysteem

Dit project omvat de ontwikkeling van een bestelsysteem voor een schoolkantine, gericht op het efficiënt beheren van producten en bestellingen via een MySQL-database.

## Database Structuur en Inhoud

De kern van het systeem wordt gevormd door de `schoolkantine.sql` database, die twee hoofstabellen bevat:

*   **`items` Tabel:** Deze tabel beheert het volledige assortiment van de kantine. Elk item heeft een unieke `id`, een `title` (naam), een `imageSrc` (pad naar de afbeelding), een `price`, een `description` en een `category`. De beschikbare categorieën omvatten een breed scala aan producten, zoals:
    *   Broodjes
    *   Koude en Warme Dranken
    *   Snacks (o.a. frikandellen, bitterballen, friet)
    *   Desserts (o.a. ijsjes, appelflappen)
    *   Maaltijddeals
    *   Soepen en Salades
    *   Sausjes
    *   Zuivelproducten (yoghurt, optimel)
    *   Snoep (diverse Haribo-producten)
    *   Overige benodigdheden (bestek, bekers)

*   **`orders` Tabel:** Deze tabel registreert alle geplaatste bestellingen. Per bestelling worden het `order_number`, de bestelde `items` (opgeslagen als JSON-string), de `total_price` en het `order_time`stip vastgelegd.

## Doel

Het systeem is ontworpen om een efficiënt en gebruiksvriendelijk bestelproces in de schoolkantine te faciliteren. Dit resulteert in een gestroomlijnde workflow, wat zowel studenten als kantinepersoneel ten goede komt.
