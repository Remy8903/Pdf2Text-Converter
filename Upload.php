<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Download Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="Download">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["File"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["File"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if the file is a PDF or Text
            if ($fileType != "pdf" && $fileType != "txt") {
                echo "Sorry, only PDF and Text files are allowed";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["File"]["tmp_name"], $target_file)) {
                    echo "The file ".htmlspecialchars(basename($_FILES["File"]["name"]))." has been uploaded ";

                    // Call Java jar file based on the selected conversion type
                    $ConversionType = $_POST['convertType'];
                    

                    if ($ConversionType == "pdf2Text") {
                        $outputFilename = "./converted/"."CONVERTED-".basename($_FILES["File"]["name"]). ".txt";
                        $output = shell_exec("java -jar Pdf2Text2.0-final.jar $target_file $outputFilename");
                        if ($output === null) {
                            echo "Error executing the command.\n";
                        } else {
                            echo "<p>Conversion successful! Download your text file:</p>";
                            echo "<a href='$outputFilename' download>Download text File</a>";
                        }
                    } else if ($ConversionType == "txt2Pdf") {
                        $outputFilename = "./converted/"."CONVERTED-".basename($_FILES["File"]["name"]). ".pdf";
                        $output = shell_exec("java -jar Text2Pdf2.0-final.jar $target_file $outputFilename");
                        if ($output === null) {
                            echo "Error executing the command.\n";
                        } else {
                            echo "<p>Conversion successful! Download your PDF file:</p>";
                            echo "<a href='$outputFilename' download>Download PDF File</a>";
                        }
                    } else {
                        echo "<p>Invalid type of conversion</p>";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        ?>
    </div>

</body>
</html>
