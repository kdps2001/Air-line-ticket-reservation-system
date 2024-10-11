
  document.addEventListener('DOMContentLoaded', function () {
    const bookTripButton = document.getElementById('checkButton');
    
    bookTripButton.addEventListener('click', function (event) {

        event.preventDefault();

        if (!isLoggedIn) {
            const userResponse = confirm('Please Sign In To Check Your Ticket Status! Would You Like To Sign Up or Log In Now?');
            if (userResponse) {
                window.location.href = 'signin.php'; 
            }
            else{
                alert('You are NOT signed in Yet! Please Sign In for Proceeding to Check In...');
                window.location.href = 'index.php';  
            }

        } 
        else{
            window.location.href = 'mybooking.php';
        }

    });
});

