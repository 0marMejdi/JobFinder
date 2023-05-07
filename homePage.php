<?php
include_once "allFrags.php";
includeHeader("Home");
needsAuthentication();
$curr  = $_SESSION["currentUser"];
JobSeekerRepository::update($curr, "lastName","Doee");
?>

<body>

    <div class="container" >
        <?=showErrorIfExists()?>
        <?php $detail = $_SESSION["currentUser"];
        $picDir ="";
        if($detail->isJobSeeker()){
            if ($detail->hasPhoto) {
                $picDir = "assets/data/JobSeeker/" . $detail->email . "/";
                if (findPictureWithSuffix("pdp", $picDir))
                    $picDir = findPictureWithSuffix("pdp", $picDir);
                else $picDir = "assets/templates/default-profile-icon-24.jpg";
            }
            else
                $picDir = "assets/templates/default-profile-icon-24.jpg";
            echo $detail;
        }else{
            if ($detail->hasLogo) {
                $picDir = "assets/data/Company/" . $detail->email . "/";
                if (findPictureWithSuffix("pdp", $picDir))
                    $picDir = findPictureWithSuffix("pdp", $picDir);
                else $picDir = "assets/templates/default-company.jpg";
            }
            else
                $picDir = "assets/templates/default-company.jpg";
            echo $detail;
        }

        ?>
    </div>
    <span id="firstname"> <?=$detail->firstName?> </span>
    <button id="modify-btn">Modify</button>
    <div id="modify-confirm" style="display: none;">
        <input type="text" id="modify-text" />
        <button id="modify-confirm-btn">Confirm</button>
        <button id="modify-cancel-btn">Cancel</button>
    </div>
    <script>
        // Get the elements
        const modifyBtn = document.getElementById("modify-btn");
        const modifyConfirm = document.getElementById("modify-confirm");
        const modifyText = document.getElementById("modify-text");
        const modifyConfirmBtn = document.getElementById("modify-confirm-btn");
        const modifyCancelBtn = document.getElementById("modify-cancel-btn");

        // Add event listener to the modify button
        modifyBtn.addEventListener("click", function() {
            // Hide the modify button
            modifyBtn.style.display = "none";

            // Show the modify confirmation div
            modifyConfirm.style.display = "block";

            // Set the input value to the current text value
            modifyText.value = document.getElementById("firstname").textContent.trim();
        });

        // Add event listener to the confirm button
        modifyConfirmBtn.addEventListener("click", function() {
            // Get the new text value
            const newFirstName = modifyText.value.trim();

            // Execute the PHP method "modify" with the new text as a parameter using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "modify.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Request successful, update the text value
                    document.getElementById("firstname").textContent = newFirstName;

                    // Hide the modify confirmation div
                    modifyConfirm.style.display = "none";

                    // Show the modify button
                    modifyBtn.style.display = "inline-block";
                } else {
                    // Request failed, handle the error
                    console.error(xhr.statusText);
                }
            };
            xhr.send("attributeName=firstName&attributeValue=" + newFirstName);
        });

        // Add event listener to the cancel button
        modifyCancelBtn.addEventListener("click", function() {
            // Hide the modify confirmation div
            modifyConfirm.style.display = "none";

            // Show the modify button
            modifyBtn.style.display = "inline-block";
        });


    </script>

        <div class="alert alert-info"> Welcome to HomePage</div>
        <form action="disconnect.php" method="post">
        <p> </p>

            <button class="w-100 btn btn-light btn btn-outline-success btn-success" type="submit">Disconnect</button>
        </form>
    </div>
</body>
