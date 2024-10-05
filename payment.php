<?php
$additionalCSS = ["styles/payment_styles.css"];
include 'header.php';
?>

        <!-- Left Side: Payment Description -->
         <div class="container1">
        <div class="payment-description">
            <h1 class="">Payment Option</h1>
            <img src="images/visalogo.png" id="img"width="260" height="100">
            <h2 class="Hdes">Payment Description</h2>
            <p>When making a payment, it is essential to choose a secure and convenient method to ensure the 
                transaction is processed smoothly. Payment methods can vary, ranging from traditional options like cash 
                and checks to modern digital solutions such as credit cards, debit cards, and online payment platforms like PayPal,
                 Apple Pay, or Google Pay. Additionally, many businesses now accept mobile payments and cryptocurrency, 
                 offering customers more flexibility. Regardless of the method chosen, ensuring the security and reliability of the 
                 transaction is crucial for both the payer and the recipient.</p>
        </div>
        </div>

        <div class="container2">
        <!-- Center: Payment Form -->
        <div class="payment-form">
            <h2>Online Payment</h2>

            <form action="payment_success.php" method="post">

                <h3>Enter Card Details</h3>
                <div class="form-group" >
                    <label for="card-number">Card Number:</label>
                    <input type="text" id="card-number" placeholder="Enter Card number">
                </div>
                <div class="form-group">
                    <label for="card-name">Card Name:</label>
                    <input type="text" id="card-name" placeholder="Enter Card Name">
                </div>
                <div class="form-group">
                    <label for="expire-date">Expire Date:</label>
                    <input type="text" id="expire-date" placeholder="MM/YY">
                </div>
                <div class="form-group">
                    <label for="security-code">Security Code:</label>
                    <input type="text" id="security-code" placeholder="CVC">
                </div>

                <h3>Payment Method</h3>
                <div class="payment-methods">
                    <div class="method">
                        <input type="radio" id="visa" name="payment-method" checked>
                        <label for="visa">VISA</label>
                    </div>
                    <div class="method">
                        <input type="radio" id="mastercard" name="payment-method">
                        <label for="mastercard">MasterCard</label>
                    </div>
                 
                </div>

                <div class="form-buttons">
                <button type="button" onclick="window.location.href='index.php'" class = "cancel">Cancel</button>
                <button type="submit" class ="pay">Pay</button>
                </div>
            </form>
        </div>
</div>
        <!-- Right Side: Total Amount -->
        <div class="total-amount">
            <h3>Total Amount</h3>
            <div class="bill">
            <p>Base fare &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;LKR #####</p>
            <p>Taxes and carrier &emsp;&emsp;LKR #####</p>
            <hr>
            <p><b>Total  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; LKR #####</b></p>
        </div>
        </div>

<?php
include 'footer.php';
?>