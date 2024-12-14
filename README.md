# File Type Converter  [pdf][txt]

Welcome to the File Type Converter, a web application that facilitates two types of document conversions: Pdf to Text and Text to Pdf. We leverage the power of the pdfbox2.0 and pdfbox 3.0 libraries to seamlessly handle these conversions. This web application is built using PHP, which invokes two distinct JAR files, each dedicated to a specific type of conversion. Additionally, Apache2 serves as the underlying web server.

## Table of Contents
- [Team](#Team)
- [Installation](#installation)
- [Usage](#usage)


## Installation

To run the File Type Converter using Docker, follow these simple steps:

1. Open your terminal in the project directory.
2. Build the Docker image with the following command:
    ```bash
    docker build -t cat201-final . 
    # Create an image named cat201-final or use your desired name
    ```
3. Run the Docker container in detached mode with the following command:
    ```bash
    docker run -d -p 8001:80 --name cat201-final-container cat201-final 
    # Create a container named cat201-final-container or use your desired name
    ```

## Usage

To utilize the File Type Converter, follow these steps:

1. Open the web application in your browser.
2. Choose the type of conversion you need: Pdf to Text or Text to Pdf.
3. Press the "Convert" button to initiate the conversion process.
4. Upon successful conversion, click the "Download" button to obtain the converted file.

Feel free to explore the capabilities of the File Type Converter and streamline your document conversion tasks effortlessly. If you encounter any issues or have suggestions for improvement, don't hesitate to reach out to our dedicated team.
