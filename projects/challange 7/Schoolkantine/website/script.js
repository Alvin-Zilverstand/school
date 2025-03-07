// Function to show products for a selected category
function showCategory(category) {
    console.log(`Fetching items for category: ${category}`); // Debugging: log category
    const productDisplay = document.getElementById('product-display');
    productDisplay.innerHTML = ''; // Clear display before adding new items

    fetch(`get_items.php?category=${category}`)
        .then(response => {
            if (!response.ok) { 
                console.error('Network response was not ok', response.statusText);
                throw new Error('Network response was not ok'); 
            }
            return response.json();
        })
        .then(items => {
            if (items.error) {
                console.error('Error fetching items:', items.error);
                return;
            }
            if (items.length === 0) {
                console.warn(`No items found for category: ${category}`); // Debugging: log no items found
            }
            console.log('Fetched items:', items); // Debugging: log fetched items
            items.forEach(item => {
                const productBox = document.createElement('div');
                productBox.classList.add('product-box');
                productBox.onclick = () => showItemDetails(item);
                productBox.innerHTML = `
                    <img src="${item.imageSrc}" alt="${item.title}">
                    <h3>${item.title}</h3>
                    <p>€${item.price.toFixed(2)}</p>
                `;
                productDisplay.appendChild(productBox);
            });
            document.querySelector('.menu-bar').classList.add('top'); // Bring menu to top
            document.getElementById('cart').classList.add('visible');
            document.querySelector('.cart-icon').classList.add('visible');

            // Remove logo if present
            const logo = document.querySelector('.logo');
            if (logo) { logo.remove(); }
        })
        .catch(error => console.error('Error fetching items:', error));
}

// Functie om de details van een item weer te geven in het modaal
function showItemDetails(item) {
    const title = item.title;
    const imageSrc = item.imageSrc;
    const description = item.description; // Use description from item data
    const price = item.price;

    // Update de inhoud van het modaal venster
    document.getElementById("modal-title").innerText = title;
    document.getElementById("modal-image").src = imageSrc;
    document.getElementById("modal-description").innerText = description;
    document.getElementById("modal-price").innerText = `Prijs: €${price.toFixed(2)}`;
    document.getElementById("add-to-cart").onclick = function() {
        addToCart({ title, price });
    };

    document.getElementById('modal').style.display = 'block';
}

// Functie om de beschrijving op te halen afhankelijk van de titel
function getDescription(title) {

    // Broodjes beschrijvingen
    if (title === "Broodje Gezond") {
        return "Op dit broodje zit kaas, veldsla, komkommer, tomaat, ei, ham en/of kip en bufkes saus.";
    }   else if (title === "Bagel") {
        return "Doughnut brood met spek, ei en kaas";
    } else if (title === "Broodje Gehakt met Joppiesaus") {
        return "Een wit of bruin broodje met Gehakt, Ei, Sla en Joppiesaus   .";  
    }    else if (title === "Saucijzenbroodje") {
            return "Een knapperig korstje met een warme, kruidige vleesvulling";
        }    else if (title === "Frikandelbroodje") {
            return "Een knapperige korstje met een warme frikandel en curry saus erin";
        }    else if (title === "Croissant") {
            return "Verschilende diverse croisantje beschikbaar bij de counter";
        }    else if (title === "Chocolade broodje") {
            return "Een krokrantig korstje met chocolade erin";
        }    else if (title === "Broodje kip") {
            return "Op het broodje kip zit komkommer, salade, kip en bufkes saus";
        }    else if (title === "Panini broodje") {
                return "Verschillende diverse panini's zijn te vinden op de counter!";

    // Koude dranken beschrijving
    } else if (title === "Spa Water") {
        return "Koude verfrissende water.";
    }    else if (title === "Milkshake") {
        return "Verschillende diverse milkshake (keuze bij de counter maken)";
    }    else if (title === "Lente Redbull") {
        return "De Red Bull Spring Edition Walstro & Pink Grapefruit";
    }    else if (title === "Redbull") {
        return "De orginele Redbull";


    // Warme dranken beschrijving
    } else if (title === "Chocomel") {
        return "Een lekker warme chocolade melk";
    }   else if (title === "Chocomel met slagroom") {
        return "Een lekkere warme chocolade melk met slagroom";
    }   else if (title === "Koffie") {
        return "Een lekker warme koffie";
    }   else if (title === "Thee") {
        return "heerlijke warme thee (keuze bij de kassa)";

    // Snacks beschrijving
    } else if (title === "Frikandel") {
        return "Gemalen gehakt in een staafje";
    } else if (title === "Friet") {
        return "Een bakje friet";
    } else if (title === "Kipcorn") {
        return "Een lekkere krokante Kipcorn.";
    } else if (title === "Kipnuggets") {
        return "Een bakje met 9 kipnuggets.";
    } else if (title === "Mexicano") {
        return "Een pittige mexicano.";
    } else if (title === "Bitterballen") {
        return "Een bakje met 9 Bitterballen    .";
    } else if (title === "Koekjes") {
        return "Lekkere knapperige chocolade koekjes!";
    } else if (title === "Kroket") {
        return "Een lekkere krokante kroket!";
    } else if (title === "Kaassoufle") {
        return "Een lekkere krokante kaassoufle!";



    // Ijsjes beschrijving  
    } else if (title === "Ijsjes") {
        return "Een lekker ijsje met vele smaken, zoals aardbei, vanille, chocolade, mint, bosbes en nog veel meer (alleen in de zomer!).";
    }    else if (title === "Sorbet") {
        return "Lekkeresorbet met saus naar keuze";
    } else if (title === "Softijs") {
        return "Een melk ijsje";
    }    else if (title === "Sundea ijs") {
        return "Een softijs ijsje in een bakje met een sas naar keuze!";
    }    else if (title === "Appelflap") {
        return "Een lekker korstje met fijn gesneden appels, rozijnen en kaneel erin";

    // Deals beschrijing
    } else if (title === "Lunch Deal") {
        return "Bij deze deal krijg je 1 snack naar keuze, wat frietjes en drinken naar keuze erbij!";
    }        else if (title === "Gezonde Deal") {
        return "Bij deze deal krijg je een keuze naar een broodje en een keuze naar een koude drank!!";
    
    
    // Soepen beschrijving
    } if (title === "Tomatensoep") {
        return "Tomatensoep met gehakt balletje";
    } if (title === "Kippensoep") {
        return "Kippensoep met kip en groenten";
    } if (title === "Erwtensoep") {
        return "Gemalen erwten met stukjes worst erin";
    } if (title === "Groentesoep (met gehaktballetjes)") {
        return "Een soep met veel groente erin en gehaktballetjes";

    // Salades beschrijving
    }  if (title === "Caesar Salade") {
        return "In een klassieke Ceesar salade zit sla romaine, ui,  kipfilet, citroen, mayonaise en olijfolie";
    }  if (title === "Griekse Salade") {
        return "In een Griekse salade zit komkommer, snoeptomatjes, klein beetje rode ui, olijven, feta kaas en croutons";
    }  if (title === "Krokante Kip Salade") {
        return "In de krokante Kip Salade zit kip, sla, klein beetje rode ui, snoeptomaatjes, olijfolie en komkommer";
    }  if (title === "Aardappel Salade") {
        return "In de aardappel salade zit aardappelen, prei, erwten, peper en zout";

    // Sauzen beschrijving
    }   if (title === "Ketchup") {
        return "Ketchup";
    }   if (title === "Mayonaise") {
        return "Mayonaise";
    }   if (title === "Mosterd") {
        return "Mosterd";
    }   if (title === "Sweet Chili") {
        return "Sweet Chili";
    }   if (title === "Curry saus") {
        return "Curry saus";
    }
    // Yoghurt beschrijving 
        if (title === "Aardbij yoghurt") {
        return "Yoghurt met aardbei";
    }   if (title === "Optimel klein 250ml") {
        return "Een klein pakje drink yoghurt";
    }    if (title === "Optimel groot") {
    return "Een groot pakje drink yoghurt";
    }    if (title === "Melk") {
    return "Halfvolle melk in een klein pakje";
    }    if (title === "Fristi") {
    return "Melkdrank met vruchtensmaak";
    }    if (title === "Koude chocomelk") {
    return "Koude chocomelk in een flesje";
    }    if (title === "Breaker") {
    return "Verschillende diverse smaken bij de counter";
    }    if (title === "Yoghurt beker") {
    return "Een klein bakje met yoghurt en musli erbij";
    }       if (title === "Kwark 150 gram") {
    return "Een klein bakje kwark";

    }
    {    
        // snoep beschrijing
    }    if (title === "Haribo starmix") {
        return "Een mixzakje met 75g snoepjes. ";
    }    if (title === "Haribo Kikkers") {
        return "Een zakje met 75g kikkertjes.";
    }    if (title === "Haribo Goudberen") {
        return "Een zakje met 75g beertjes";
    }    if (title === "Haribo Bananen") {
        return "Een zakje met 75g banaantjes.";
    }    if (title === "Haribo Perzikken") {
        return "Een zakje met 75g Perzikken.";
    }    if (title === "Haribo Tropifrutti") {
        return "Een mix zakje met 75g Snoepjes.";
    }    if (title === "Haribo Tangfastics") {
        return "Een mixzakje met 75g zure snoepjes.";
    }    if (title === "Haribo Kersen") {
        return "Een zakje met 75g kersjes.";
    }    if (title === "Haribo Rolletje") {
        return "Een rolletje met snoepjes.";
    }    if (title === "Haribo Pinballs") {
        return "Een zakje met 75g balletjes.";
    }    if (title === "Haribo Happy Cola") {
        return "Een zakje met 75g cola snoepjes.";
}
}
{
    // overige beschrijing
   if (title === "Bestek") {
    return "Plastice vorken, messen en lepels ";
}    if (title === "Hervul baar bekers") {
    return "Bekers die je kunt hervullen en daarna weg kan gooien";
}    if (title === "Rietjes") {
    return "Plastice rietjes";
}
}
// Functie om een item aan het winkelwagentje toe te voegen
function addToCart(item) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(item); // Add item to the cart array
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
}

// Functie om het winkelwagentje bij te werken
function updateCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItemsContainer = document.getElementById("cart-items");
    cartItemsContainer.innerHTML = '';
    let totalPrice = 0;
    cart.forEach((item, index) => {
        const cartItemElement = document.createElement('li');
        cartItemElement.className = 'cart-item';
        cartItemElement.innerHTML = `
            <span>${item.title}</span>
            <span>€${item.price.toFixed(2)}</span>
            <button onclick="removeFromCart(${index})">Verwijderen</button>
        `;
        cartItemsContainer.appendChild(cartItemElement);
        totalPrice += item.price;
    });
    document.getElementById('total-price').innerText = totalPrice.toFixed(2);

    // Show or hide the "Bestellen" button based on the cart's content
    const orderButton = document.getElementById('order-button');
    if (cart.length > 0) {
        orderButton.style.display = 'block';
    } else {
        orderButton.style.display = 'none';
    }

    // Update the cart count in the cart icon
    document.getElementById('cart-count').innerText = cart.length;
}

// Functie om een item uit het winkelwagentje te verwijderen
function removeFromCart(index) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
}

// Functie om het modaal venster te sluiten
function closeModal() {
    document.getElementById('modal').style.display = 'none';
    document.querySelector('.menu-bar').classList.remove('dark'); // Remove dark class from menu-bar
}

// Zorg ervoor dat het modaal venster sluit wanneer er buiten het venster wordt geklikt
window.onclick = function(event) {
    if (event.target == document.getElementById('modal')) {
        closeModal();
    }
}

// Initial call to updateCart to ensure the button is hidden on page load
updateCart();

// Functie om een bestelling te plaatsen
function placeOrder() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length === 0) {
        alert('Uw winkelmandje is leeg.');
        return;
    }

    const totalPrice = cart.reduce((total, item) => total + item.price, 0).toFixed(2);

    fetch('place_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            items: cart,
            total_price: totalPrice
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            localStorage.removeItem('cart'); // Clear the cart
            updateCart(); // Update the cart display
            window.open(`betalen.html?order_number=${encodeURIComponent(data.order_number)}`, '_blank'); // Open the payment page in a new tab with order number
        } else {
            alert('Er is een fout opgetreden bij het plaatsen van uw bestelling. Probeer het opnieuw.');
        }
    })
    .catch(error => console.error('Error placing order:', error));
}

// Bind the placeOrder function to the order button
document.getElementById('order-button').addEventListener('click', placeOrder);

// Vertalingen voor beide talen (nl en en)
const translations = {
    en: {
        "Broodjes": "Sandwiches",
        "Koude Dranken": "Cold Drinks",
        "Warme Dranken": "Hot Drinks",
        "Snacks": "Snacks",
        "deserts": "Ice Creams",
        "Deals": "Deals",
        "Soepen": "Soups",
        "Salades": "Salads",
        "Sausjes": "Sauces",
        "Snoep": "Candy",
        "Winkelmandje": "Shopping Cart",
        "Prijs": "Price",
        "Toevoegen aan winkelmandje": "Add to cart",
        "Bestellen": "Order",
        "Totaal": "Total",
        "Overige": "Other",
        "Op dit broodje zit kaas, veldsla, komkommer, tomaat, ei, ham en/of kip en bufkes saus.": "This sandwich contains cheese, lamb's lettuce, cucumber, tomato, egg, ham and/or chicken, and bufkes sauce.",
        "Doughnut brood met spek, ei en kaas": "Doughnut bread with bacon, egg, and cheese",
        "Een wit of bruin broodje met Gehakt, Ei, Sla en Joppiesaus": "A white or brown sandwich with minced meat, egg, lettuce, and Joppiesaus",
        "Een knapperig korstje met een warme, kruidige vleesvulling": "A crispy crust with a warm, spicy meat filling",
        "Een knapperige korstje met een warme frikandel en curry saus erin": "A crispy crust with a warm frikandel and curry sauce inside",
        "Koude verfrissende water.": "Cold refreshing water.",
        "Verschillende diverse milkshake (keuze bij de counter maken)": "Various milkshakes (choose at the counter)",
        "Een lekker warme chocolade melk": "A delicious hot chocolate milk",
        "Een lekkere warme chocolade melk met slagroom": "A delicious hot chocolate milk with whipped cream",
        "Een lekker warme koffie": "A delicious hot coffee",
        "heerlijke warme thee (keuze bij de kassa)": "Delicious hot tea (choose at the counter)",
        "Een frikandel, dat wil je wel!": "A frikandel, you want that!",
        "Een klein bakje met friet.": "A small box of fries.",
        "Een lekkere krokante Kipcorn.": "A delicious crispy Kipcorn.",
        "Een bakje met 9 kipnuggets.": "A box with 9 chicken nuggets.",
        "Een pittige mexicano.": "A spicy mexicano.",
        "Een bakje met 9 Bitterballen.": "A box with 9 Bitterballen.",
        "Een lekker ijsje met vele smaken, zoals aardbei, vanille, chocolade, mint, bosbes en nog veel meer (alleen in de zomer!).": "A delicious ice cream with many flavors, such as strawberry, vanilla, chocolate, mint, blueberry, and many more (only in summer!).",
        "Lekkeresorbet met saus naar keuze": "Delicious sorbet with sauce of your choice",
        "Bij deze deal krijg je 1 snack naar keuze, wat frietjes en drinken naar keuze erbij!": "With this deal, you get 1 snack of your choice, some fries, and a drink of your choice!",
        "Bij deze deal krijg je een keuze naar een broodje en een keuze naar een koude drank!!": "With this deal, you get a choice of a sandwich and a choice of a cold drink!!",
        "Soep van de dag! (Allergieën? Meld het bij ons!)": "Soup of the day! (Allergies? Let us know!)",
        "Een heerlijke salade met verse groenten en een dressing naar keuze.": "A delicious salad with fresh vegetables and a dressing of your choice.",
        "Kies de saus naar je keuze!": "Choose the sauce of your choice!", 
    },
    nl: {
        "Sandwiches": "Broodjes",
        "Cold Drinks": "Koude Dranken",
        "Hot Drinks": "Warme Dranken",
        "Snacks": "Snacks",
        "Ice Creams": "deserts",
        "Deals": "Deals",
        "Soups": "Soepen",
        "Salads": "Salades",
        "Sauces": "Sausjes",
        "Candy": "Snoep",
        "Shopping Cart": "Winkelmandje",
        "Price": "Prijs",
        "Add to cart": "Toevoegen aan winkelmandje",
        "Order": "Bestellen",
        "Total": "Totaal",
        "Other": "Overige",
        "This sandwich contains cheese, lamb's lettuce, cucumber, tomato, egg, ham and/or chicken, and bufkes sauce.": "Op dit broodje zit kaas, veldsla, komkommer, tomaat, ei, ham en/of kip en bufkes saus.",
        "Doughnut bread with bacon, egg, and cheese": "Doughnut brood met spek, ei en kaas",
        "A white or brown sandwich with minced meat, egg, lettuce, and Joppiesaus": "Een wit of bruin broodje met Gehakt, Ei, Sla en Joppiesaus",
        "A crispy crust with a warm, spicy meat filling": "Een knapperig korstje met een warme, kruidige vleesvulling",
        "A crispy crust with a warm frikandel and curry sauce inside": "Een knapperige korstje met een warme frikandel en curry saus erin",
        "Cold refreshing water.": "Koude verfrissende water.",
        "Various milkshakes (choose at the counter)": "Verschillende diverse milkshake (keuze bij de counter maken)",
        "A delicious hot chocolate milk": "Een lekker warme chocolade melk",
        "A delicious hot chocolate milk with whipped cream": "Een lekkere warme chocolade melk met slagroom",
        "A delicious hot coffee": "Een lekker warme koffie",
        "Delicious hot tea (choose at the counter)": "heerlijke warme thee (keuze bij de kassa)",
        "A frikandel, you want that!": "Een frikandel, dat wil je wel!",
        "A small box of fries.": "Een klein bakje met friet.",
        "A delicious crispy Kipcorn.": "Een lekkere krokante Kipcorn.",
        "A box with 9 chicken nuggets.": "Een bakje met 9 kipnuggets.",
        "A spicy mexicano.": "Een pittige mexicano.",
        "A box with 9 Bitterballen.": "Een bakje met 9 Bitterballen.",
        "A delicious ice cream with many flavors, such as strawberry, vanilla, chocolate, mint, blueberry, and many more (only in summer!).": "Een lekker ijsje met vele smaken, zoals aardbei, vanille, chocolade, mint, bosbes en nog veel meer (alleen in de zomer!).",
        "Delicious sorbet with sauce of your choice": "Lekkeresorbet met saus naar keuze",
        "With this deal, you get 1 snack of your choice, some fries, and a drink of your choice!": "Bij deze deal krijg je 1 snack naar keuze, wat frietjes en drinken naar keuze erbij!",
        "With this deal, you get a choice of a sandwich and a choice of a cold drink!!": "Bij deze deal krijg je een keuze naar een broodje en een keuze naar een koude drank!!",
        "Soup of the day! (Allergies? Let us know!)": "Soep van de dag! (Allergieën? Meld het bij ons!)",
        "A delicious salad with fresh vegetables and a dressing of your choice.": "Een heerlijke salade met verse groenten en een dressing naar keuze.",
        "Choose the sauce of your choice!": "Kies de saus naar je keuze!", 
    }
};

// Functie om de taal te wisselen
function switchLanguage(lang) {
    // Zoek alle elementen met een data-translate attribuut
    document.querySelectorAll("[data-translate]").forEach(element => {
        const key = element.getAttribute("data-translate"); // Verkrijg de sleutel uit het data-translate attribuut
        element.textContent = translations[lang][key] || key;  // Vertaal de tekst of behoud de sleutel als er geen vertaling is
    });
}

// Functie om de taal te wisselen wanneer de knop wordt aangeklikt
document.getElementById("language-switcher").addEventListener("click", () => {
    const currentLang = document.documentElement.lang; // Huidige taal ophalen
    const newLang = currentLang === "nl" ? "en" : "nl"; // Nieuwe taal bepalen
    document.documentElement.lang = newLang; // Wijzig de taal van de pagina
    switchLanguage(newLang); // Pas de vertalingen toe voor de nieuwe taal
    
    // Verander de tekst op de taalwisselknop
    const switcher = document.getElementById("language-switcher");
    switcher.textContent = newLang === "nl" ? "EN" : "NL"; // Zet de knop tekst naar de andere taal
});

// Stel de standaardtaal in
document.documentElement.lang = "nl"; // Begin met Nederlands
switchLanguage("nl"); // Pas de vertalingen toe voor Nederlands bij het laden van de pagina
