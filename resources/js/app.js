import "./bootstrap";

function validateInput(input) {
    const minValue = 1;

    // Check if the input value is not a number or is less than the minimum value
    if (isNaN(input.value) || input.value < minValue) {
        // Set the input value to the minimum value
        input.value = minValue;
    }
}

function addSizeEntry(name) {
    // Check if an input with the specified name already exists
    const existingDiv = document.getElementById(`number${name}`);

    console.log(existingDiv);

    // If it exists, remove it
    if (existingDiv) {
        existingDiv.parentNode.removeChild(existingDiv);

        return;
    }

    // Add the new input
    const sizeContainer = document.querySelector("#size-container");
    const sizeEntryHTML = `
    <x-form.special-input name="${name}" field="quantities" />
`;

    sizeContainer.innerHTML += sizeEntryHTML;
}
