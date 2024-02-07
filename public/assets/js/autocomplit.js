const tagsData = [];

// Use fetch API to get data from the server
fetch('/tags')
    .then(response => response.json())
    .then(data => {
        // Update the tags array with data from the server
        tagsData.push(...data);

        // Now you can use the 'tags' array as needed
        console.log(tagsData);
    })
    .catch(error => console.error('Error fetching data:', error));




// get Tags Div
$tags = document.getElementById("tags");



// autoComplete function to tags input field
function autocomplete(input, list) {


    //Add an event listener to compare the input value with all countries
    input.addEventListener('input', function() {
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
        for (let i = 0; i < list.length; i++) {
            if (list[i].toUpperCase().includes(this.value.toUpperCase())) {
                //If a match is found, create a suggestion <div> and add it to the suggestions <div>
                suggestion = document.createElement('div');
                suggestion.innerHTML = list[i];

                suggestion.addEventListener('click', function() {

                    //create Close Button
                    $closeButton = document.createElement("button");
                    $closeButton.setAttribute("type", "button")
                    $closeButton.setAttribute("aria-label", "Close")
                    $closeButton.setAttribute("class", "btn-close mx-1")
                    
                    //create tag Span
                    $tagSpan = document.createElement("span");
                    $tagSpan.setAttribute("class", "badge rounded-pill bg-danger align-middle")

                    $tagSpan.innerHTML = this.innerHTML;
                    $tagSpan.appendChild($closeButton)
                    input.value = "";
                    $tags.appendChild($tagSpan);

                    index = tagsData.indexOf(this.innerHTML);
                    tagsData.splice( index , 1)
                    console.log(tagsData);
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

// delete tag from Tags Div 
function deleteTag()
{
    tags.addEventListener('click', function(e) {
        if (e.target.className == "btn-close mx-1") {
            
            // Remove the parent element
    
            parentElement = e.target.parentNode;
            
            tagsData.push(parentElement.innerText)
            parentElement.remove();
        }
    
    });
}


deleteTag();
autocomplete(document.getElementById('input'), tagsData);