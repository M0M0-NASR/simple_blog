const fruits = ['Abiu', 'Açaí', 'Acerola', 'Akebi', 'Ackee', 'African Cherry Orange', 'American Mayapple', 'Apple', 'Apricot', 'Araza', 'Avocado', 'Banana', 'Bilberry', 'Blackberry', 'Blackcurrant', 'Black sapote', 'Blueberry', 'Boysenberry', 'Breadfruit', 'Buddhas hand (fingered citron)', 'Cactus pear', 'Canistel', 'Cashew', 'Cempedak', 'Cherimoya (Custard Apple)', 'Cherry', 'Chico fruit', 'Cloudberry', 'Coco De Mer', 'Coconut', 'Crab apple', 'Cranberry', 'Currant', 'Damson', 'Date', 'Dragonfruit (or Pitaya)', 'Durian', 'Egg Fruit', 'Elderberry', 'Feijoa', 'Fig', 'Finger Lime (or Caviar Lime)', 'Goji berry', 'Gooseberry', 'Grape', 'Raisin', 'Grapefruit', 'Grewia asiatica (phalsa or falsa)', 'Guava', 'Hala Fruit', 'Honeyberry', 'Huckleberry', 'Jabuticaba (Plinia)', 'Jackfruit', 'Jambul', 'Japanese plum', 'Jostaberry', 'Jujube', 'Juniper berry', 'Kaffir Lime', 'Kiwano (horned melon)', 'Kiwifruit', 'Kumquat', 'Lemon', 'Lime', 'Loganberry', 'Longan', 'Loquat', 'Lulo', 'Lychee', 'Magellan Barberry', 'Mamey Apple', 'Mamey Sapote', 'Mango', 'Mangosteen', 'Marionberry', 'Melon', 'Cantaloupe', 'Galia melon', 'Honeydew', 'Mouse melon', 'Musk melon', 'Watermelon', 'Miracle fruit', 'Momordica fruit', 'Monstera deliciosa', 'Mulberry', 'Nance', 'Nectarine', 'Orange', 'Blood orange', 'Clementine', 'Mandarine', 'Tangerine', 'Papaya', 'Passionfruit', 'Pawpaw', 'Peach', 'Pear', 'Persimmon', 'Plantain', 'Plum', 'Prune (dried plum)', 'Pineapple', 'Pineberry', 'Plumcot (or Pluot)', 'Pomegranate', 'Pomelo', 'Purple mangosteen', 'Quince', 'Raspberry', 'Salmonberry', 'Rambutan (or Mamin Chino)', 'Redcurrant', 'Rose apple', 'Salal berry', 'Salak', 'Sapodilla', 'Sapote', 'Satsuma', 'Shine Muscat or Vitis Vinifera', 'Sloe or Hawthorn Berry', 'Soursop', 'Star apple', 'Star fruit', 'Strawberry', 'Surinam cherry', 'Tamarillo', 'Tamarind', 'Tangelo', 'Tayberry', 'Ugli fruit', 'White currant', 'White sapote', 'Ximenia', 'Yuzu'];

function autocomplete(input, list) {
    //Add an event listener to compare the input value with all countries
    input.addEventListener('input', function () {
        //Close the existing list if it is open
        closeList();

        //If the input is empty, exit the function
        if (!this.value)
            return;

        //Create a suggestions <div> and add it to the element containing the input field
        suggestions = document.createElement('div');
        
        suggestions.setAttribute('id', 'suggestions');
        this.parentNode.appendChild(suggestions);

        //Iterate through all entries in the list and find matches
        for (let i=0; i<list.length; i++) {
            if (list[i].toUpperCase().includes(this.value.toUpperCase())) {
                //If a match is found, create a suggestion <div> and add it to the suggestions <div>
                suggestion = document.createElement('div');
                suggestion.innerHTML = list[i];
                
                suggestion.addEventListener('click', function () {
                    input.value = this.innerHTML;
                    closeList();
                });
                suggestion.style.cursor = 'pointer';

                suggestions.appendChild(suggestion);
            }
        }

    });

    function closeList() {
        let suggestions = document.getElementById('suggestions');
        if (suggestions)
            suggestions.parentNode.removeChild(suggestions);
    }
}
autocomplete(document.getElementById('input'), fruits);