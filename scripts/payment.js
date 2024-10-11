
document.addEventListener('DOMContentLoaded', function () {
    const bookTripButton = document.getElementById('pay-btn');
    
    
    bookTripButton.addEventListener('click', function (event) {

        event.preventDefault();

        if (!isLoggedIn) {
            const userResponse = confirm('Please Sign In To Book Your Ticket! Would You Like To Sign Up or Log In Now?');
            if (userResponse) {
                window.location.href = 'signin.php'; 
            }
                else{
                alert('You are NOT signed in Yet! Please Sign In for Proceeding to Check In...');
                window.location.href = 'payment_failed.php';  
            } 
        } 

  
        const expireDate = document.getElementById('expire-date').value;
        const cardNumber = document.getElementById('card-number').value;
        const securityCode = document.getElementById('security-code').value;
         
 
        const cardNumberPattern = /^[0-9]{16}$/;
       
        if (!cardNumberPattern.test(cardNumber)) {
            alert('Please enter a valid 16-digit card number');
            return;
        }


        const datePattern = /^(0[1-9]|1[0-2])\/([0-9]{2})$/;
        
        if (!datePattern.test(expireDate)) {
            alert('Please enter a valid expiration date in the format MM/YY');
            return;
        }

       
        const [month, year] = expireDate.split('/').map(Number);

    
        const currentYear = new Date().getFullYear() % 100;
        const currentMonth = new Date().getMonth() + 1; 

     
        if (year < currentYear ) {
            alert('The expiration Year is invalid !');
            return;
        }
        if (year <= currentYear && month < currentMonth) {
            alert('The expiration month is invalid !');
            return;
        }


  
        const cvcPattern = /^[0-9]{3,4}$/;

        if (!cvcPattern.test(securityCode)) {
            alert('Please enter a valid 3 digit CVC code');
            return;
        }

      
        alert('Payment successful!');
        event.target.closest('form').submit();


        
        
    });
});

