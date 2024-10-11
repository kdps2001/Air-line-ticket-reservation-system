
        function confirmSubmission(popup) 
        {
            var userConfirmed = confirm("Are you sure ?");

            if (!userConfirmed)
            {
                popup.preventDefault();
            }
        
    }

        
        
 