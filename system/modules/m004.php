<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['faqs'])) {
        foreach ($_POST['faqs'] as $faq_id => $faq_data) {
            $question = $faq_data['question'];
            $answer = $faq_data['answer'];

            // Check if the action is to delete the FAQ
            if (isset($faq_data['delete'])) {
                $delete_query = "DELETE FROM faq WHERE faq_id = ?";
                $stmt = $conn->prepare($delete_query);
                $stmt->bind_param("i", $faq_id);
                $stmt->execute();
                $stmt->close();
            } else {
                // Update existing FAQ
                $update_query = "UPDATE faq SET question = ?, answer = ? WHERE faq_id = ?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("ssi", $question, $answer, $faq_id);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    // Insert a new FAQ
    if (!empty($_POST['new_question']) && !empty($_POST['new_answer'])) {
        $new_question = $_POST['new_question'];
        $new_answer = $_POST['new_answer'];

        $insert_query = "INSERT INTO faq (question, answer) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ss", $new_question, $new_answer);
        $stmt->execute();
        $stmt->close();
    }
}

$sql = "SELECT faq_id, question, answer FROM faq";
$result = $conn->query($sql);

?>

   <center><h1><br>FAQ Update</h1></center>

<form action="" method="POST" class="edit-profile">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="faq-item">'; // Group each FAQ in its own container
            
            echo '<div class="form-group">';
            echo '<label for="question">Question:</label>';
            echo '<textarea id="questions" name="faqs[' . $row['faq_id'] . '][question]" rows="1" required>' . $row['question'] . '</textarea>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo '<label for="answer">Answer:</label>';
            echo '<textarea id="answers" name="faqs[' . $row['faq_id'] . '][answer]" rows="3" required>' . $row['answer'] . '</textarea>';
            echo '</div>';
            
           
            echo '<div class="form-group buttons">'; // Align buttons properly
            echo '<button type="submit" name="faqs[' . $row['faq_id'] . '][delete]" class="delete-btn">Delete</button>';
            echo '</div>';
            
            echo '</div>'; // 
        }
    } else {
        echo '<p>No FAQs available.</p>';
    }
    ?>
  
    <button type="submit">Update FAQs</button>
</form>

<center><h2><br>Add New FAQ</h2></center>
<form action="" method="POST" class="edit-profile">
    <div class="faq-item">
        <div class="form-group">
            <label for="new_question">Question:</label>
            <textarea id="new_question" name="new_question" rows="1" required></textarea>
        </div>

        <div class="form-group">
            <label for="new_answer">Answer:</label>
            <textarea id="new_answer" name="new_answer" rows="3" required></textarea>
        </div>

        <button type="submit">Add FAQ</button>
    </div>
</form>
