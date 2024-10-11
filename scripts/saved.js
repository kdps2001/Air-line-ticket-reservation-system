document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.getElementById('popup');
    
    saveButton.addEventListener('click', function(event) {
        // Show popup notification
        event.preventDefault(); // Prevent immediate form submission for now

        // Create a popup element
        const popup = document.createElement('div');
        popup.classList.add('popup');
        popup.innerText = "Your profile changes have been saved successfully!";

        // Style the popup (you can also do this via CSS)
        popup.style.position = 'fixed';
        popup.style.top = '50%';
        popup.style.left = '50%';
        popup.style.transform = 'translate(-50%, -50%)';
        popup.style.backgroundColor = '#4CAF50';
        popup.style.color = 'white';
        popup.style.padding = '20px';
        popup.style.borderRadius = '5px';
        popup.style.zIndex = '9999';
        popup.style.boxShadow = '0px 4px 10px rgba(0, 0, 0, 0.2)';
        popup.style.fontSize = '18px';

        // Append the popup to the document body
        document.body.appendChild(popup);

        // Remove popup after 3 seconds
        setTimeout(function() {
            popup.remove();
            // After popup is gone, submit the form
            saveButton.closest('form').submit();
        }, 3000);
    });
});
