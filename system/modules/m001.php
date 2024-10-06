<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (isset($_POST['user']) && isset($_POST['option'])) 
        {
            
            $searchValue = $conn->real_escape_string($_POST['user']);
            $searchType = $_POST['option'];
            
            if ($searchType == 'user_id') 
            {
                $query = "SELECT * FROM user WHERE user_id = '$searchValue'";
                
            } 
            elseif ($searchType == 'user_name') 
            {
                $query = "SELECT * FROM user WHERE user_name = '$searchValue'";
            } 
            elseif ($searchType == 'email') 
            {
                $query = "SELECT * FROM user WHERE email = '$searchValue'";
            }

            $result = $conn->query($query);

            if ($result->num_rows > 0) 
            {
                $user = $result->fetch_assoc();
            } 
            else
            {
                $error_message = "No user found.";
            }

            
        }
    }
?>


<div class="container">
    <form action="" method="POST">

        <div class="menubox">
        <select name="option" id="menu" class="menulist" required>
        <option disabled <?php echo !isset($_POST['option']) ? 'selected' : ''; ?>>Select User</option> 
        <option value="user_id" <?php echo (isset($_POST['option']) && $_POST['option'] == 'user_id') ? 'selected' : ''; ?>>user_id</option>
        <option value="user_name" <?php echo (isset($_POST['option']) && $_POST['option'] == 'user_name') ? 'selected' : ''; ?>>user_name</option>
        <option value="email" <?php echo (isset($_POST['option']) && $_POST['option'] == 'email') ? 'selected' : ''; ?>>email</option>
        </select>
        </div>
    
        <div class="user">
        <input type="text" class="user" name="user" placeholder="User ID/Name/Email" value="<?php echo isset($_POST['user']) ? $_POST['user'] : ''; ?>" required>

        </div>   

        <div class="search">
            <input type="submit"  class="search-btn" value ="Search" > 
        </div>
    </form>   

        <?php if (isset($error_message)) echo "<br><p class=\"error\">$error_message</p>"; ?>
       
        
        <?php if (isset($user)): // Check if $user is set ?>
            <fieldset>
            <div class="details">
                <h2>User ID : <?php echo $user['user_id']; ?></h2>
                <h2>User Name : <?php echo $user['user_name']; ?></h2>
                <h2>Email : <?php echo $user['email']; ?></h2>
                <h2>Name : <?php echo $user['first_name'] .' '. $user['last_name']; ?></h2>
                <h2>Phone No : <?php echo $user['phone']; ?></h2>
                <h2>Address : <?php echo $user['user_address']; ?></h2>
                <h2>account status : <?php echo $user['user_status']; ?></h2>
            </fieldset>

        <form action="essentialphp/account_manage.php" method="POST">
            <div class="buttons">
            <input type="hidden" name="manege_user_id" value="<?php echo $user['user_id']; ?>">
            <input type="submit"  name="submit" class="delete-btn" value ="delete" > 
            <input type="submit" name="submit" class="suspend-btn" value ="suspend" > 
            <br>
            </div>
        </form>
           
        <?php endif; // End of user check ?>
        </div>

        <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['user']) && isset($_POST['option'])) {
        
        $searchValue = $conn->real_escape_string($_POST['user']);
        $searchType = $_POST['option'];
        
        if ($searchType == 'user_id') {
            $query = "SELECT * FROM user WHERE user_id = '$searchValue'";
        } elseif ($searchType == 'user_name') {
            $query = "SELECT * FROM user WHERE user_name = '$searchValue'";
        } elseif ($searchType == 'email') {
            $query = "SELECT * FROM user WHERE email = '$searchValue'";
        }

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            $error_message = "No user found.";
        }
    }
}

        // Initialize the suspended_users array before the next query
        $suspended_users = []; // Initialize the array to avoid warnings

        // Fetch suspended users
        $query = "SELECT * FROM user WHERE user_status = 'suspend'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($user = $result->fetch_assoc()) {
                $suspended_users[] = $user; // Append each user to the array
            }
        } else {

            $error_message = "No suspended users found.";
        }
        ?>
       <div class="container" style="margin-top: 10px;">
        <h1>Suspended Users</h1>
        <br>
        
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Suspension Reason</th>
                    <th>Action</th>
                </tr>   
            </thead>
            
            <tbody>
                <?php
                foreach ($suspended_users as $user) {
                    echo '<tr>';
                    echo '<td>' . $user['user_id'] . '</td>';
                    echo '<td>' . $user['user_name'] . '</td>';
                    echo '<td>' . $user['email'] . '</td>';
                    echo '<td>
                        <form action="essentialphp/reactivate_user.php" method="POST">
                            <input type="hidden" name="manege_user_id" value="' . $user['user_id'] . '">
                            <input type="submit" name="submit" class="reactivate-btn" value="Reactivate">
                        </form>
                    </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
