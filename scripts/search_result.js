document.getElementById('continueBtn').addEventListener('click', function(event) {
 
    event.preventDefault();

    const radios = document.querySelectorAll('input[name="select"]');

    let isSelected = false;
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            isSelected = true;
            break;
        }
    }

   
    if (!isSelected) {
        alert("Please Select Flight");
    } else {

        document.getElementById('flightForm').submit();
    }
});
