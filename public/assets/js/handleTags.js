tagsData = new Object(); // { name:id}

tagsDataCopy = new Object(); // to save data

// get Tags Div
$tags = document.getElementById("tags");
$spans =[]


//get post Id
const currentUrl = window.location.href;

const parts = currentUrl.split("/");

const id = (parts[4] === 'create')?"":parts[4];  

console.log(parts);

// Use fetch API to get data from the server
fetch(`/tags/${id}`)
    .then((response) => response.json())
    .then((data) => {
        // Update the tags array with data from the server
        tagsData = data;

        // to make shallow copy
        list = { ...data };

        console.log(tagsData);

        //use here to prevent promise problems
        autocomplete(document.getElementById("input"), tagsData);
    })
    .catch((error) => console.error("Error fetching data:", error));



deleteTag();

// autoComplete function to tags input field
function autocomplete(input, list) {
    //Add an event listener to compare the input value with all countries
    input.addEventListener("input", function () {
        //Close the existing list if it is open
        closeSuggestionsList();

        //If the input is empty, exit the function
        if (!this.value) return;

        //Create a suggestions <div> and add it to the element containing the input field
        suggestions = document.createElement("div");
        suggestions.setAttribute("id", "suggestions");
        this.parentNode.appendChild(suggestions);

        //Iterate through all entries in the list and find matches
        for (let key in list) {
            if (key.toUpperCase().includes(this.value.toUpperCase())) {
                //If a match is found, create a suggestion <div> and add it to the suggestions <div>
                suggestion = document.createElement("div");
                suggestion.innerHTML = key;
                suggestion.addEventListener("click", function () {
                    //create Close Button
                    const closeButton = document.createElement("button");
                    closeButton.setAttribute("type", "button");
                    closeButton.setAttribute("aria-label", "Close");
                    closeButton.setAttribute("class", "btn-close mx-1");

                    //create tag Span
                    const tagSpan = document.createElement("span");
                    tagSpan.setAttribute(
                        "class",
                        "badge rounded-pill bg-danger align-middle"
                    );
                    tagSpan.innerHTML = this.innerHTML;

                    // create hidden input
                    const hiddenInput = document.createElement("input");
                    hiddenInput.setAttribute("type", "hidden");
                    hiddenInput.setAttribute("name", "tags[]");
                    hiddenInput.setAttribute("value", list[this.innerHTML]);

                    // to show element in front-end
                    tagSpan.append(closeButton, hiddenInput);
                    tags.appendChild(tagSpan);

                    // remove tag from suggestions
                    delete list[this.innerHTML];

                    // clear input field
                    input.value = "";

                    closeSuggestionsList();
                });

                suggestion.style.cursor = "pointer";
                suggestions.appendChild(suggestion);
            }
        }
    });

    function closeSuggestionsList() {
        let suggestions = document.getElementById("suggestions");
        if (suggestions) suggestions.parentNode.removeChild(suggestions);
    }
}

// Delete tag from Tags Div
function deleteTag() {
    tags.addEventListener("click", function (e) {
        if (e.target.className == "btn-close mx-1") {
            // Get adn Remove the tag element
            tag = e.target.parentNode;
            tagName = tag.innerText;
            tagsData[tagName] = list[tagName];
            tag.remove();
        }
    });
}
