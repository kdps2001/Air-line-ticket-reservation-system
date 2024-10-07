<?php
$additionalCSS = ["styles/contact_styles.css"];
include 'addphp/header.php';
require_once 'config/db_config.php';

$sql = "SELECT faq_id, question, answer FROM faq";
$result = $conn->query($sql);
?>

<div class="faq-container">
        <h1>Frequently Asked Questions</h1>
        <br><br>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="faq-item">';
                echo '<h2 class="faq-question">' . $row['question'] . '</h2>';
                echo '<p class="faq-answer">' . $row['answer'] . '</p>'; 
                echo '<br></div>';
            }
        } else {
            echo '<p>No FAQs available.</p>';
        }
        ?>
    </div>
<?php
include 'addphp/footer.php';
?>

