<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Converter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Libre+Baskerville&family=Nunito:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Converter</h1>
        <form action="Upload.php" method="post" enctype="multipart/form-data" onsubmit="showProgressBar()">
            <label id="convertType" for="convertType">Please choose your conversion Type</label>
            <select name="convertType" id="conversionType">
                <option value="pdf2Text">Pdf To Text</option>
                <option value="txt2Pdf">Text To Pdf</option>
            </select>
            <label id="chooseFile" for="File">Choose a PDF file:</label>
            <input type="File" name="File" id="File" accept=".pdf,.txt" required>
            <button type="submit">Convert</button>
        </form>
        <div id="progressContainer" style="display: none;">
            <h2>Conversion Progress:</h2>
            <div id="progressBar">
                <div id="progressFill"></div>
            </div>
        </div>
    </div>
    <div class="HowTo">
        <h2>How to use</h2>
        <ol>
            <li>Choose the type of conversion</li>
            <li>Choose Type Of Convertion, Pdf To Text Or Text To Pdf</li>
            <li>Press the convert button</li>
            <li>if Its Sucessfull , Click Download Button to Download the Converted File </li>
        </ol>
    </div>
</body>
</html>
    <!-- <script>
        function showProgressBar() {
            document.getElementById('progressContainer').style.display = 'block';
            simulateConversion(); // You would replace this with the actual code to handle the conversion and update the progress.
        }

        function simulateConversion() {
            var progressBar = document.getElementById('progressFill');
            var progress = 0;
            var interval = setIn
    </script> -->
