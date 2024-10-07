<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Check if the FAQs are set in the POST request
    if (isset($_POST['faqs'])) 
    {
        foreach ($_POST['faqs'] as $faq_id => $faq_data)
         {
            
            $question = $conn->real_escape_string($faq_data['question']);
            $answer = $conn->real_escape_string($faq_data['answer']);

            // Check if the action is to delete the FAQ
            if (isset($faq_data['delete'])) 
            {
                $query = "DELETE FROM faq WHERE faq_id = '$faq_id'";
                $conn->query($query);
            } 
            else 
            {
                // Update 
                $query = "UPDATE faq SET question = '$question', answer = '$answer' WHERE faq_id = '$faq_id'";
                $conn->query($query);
            }
        }
    }

    // Insert 
    if (!empty($_POST['new_question']) && !empty($_POST['new_answer']))
    {
        $new_question = $conn->real_escape_string($_POST['new_question']);
        $new_answer = $conn->real_escape_string($_POST['new_answer']);

        $insert_query = "INSERT INTO faq (question, answer) VALUES ('$new_question', '$new_answer')";
        $conn->query($insert_query);
    }
}

$sql = "SELECT faq_id, question, answer FROM faq";
$result = $conn->query($sql);

?>

   <center><h1><br>FAQ Update</h1></center>

<form action="" method="POST" class="edit-profile">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) 
        {
            echo '<div class="faq-item">'; 
            
            echo '<div class="form-group">';
            echo '<label for="question">Question:</label>';
            echo '<textarea id="questions" name="faqs[' . $row['faq_id'] . '][question]" rows="1" required>' . $row['question'] . '</textarea>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo '<label for="answer">Answer:</label>';
            echo '<textarea id="answers" name="faqs[' . $row['faq_id'] . '][answer]" rows="3" required>' . $row['answer'] . '</textarea>';
            echo '</div>';
            
           
            echo '<div class="form-group buttons">'; 
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
