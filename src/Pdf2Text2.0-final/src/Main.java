import org.apache.pdfbox.Loader;
import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

public class Main {
    public static void main(String[] args) {
        if (args.length != 2) {
            System.out.println("Usage: java Main <input.pdf> <output.txt>");
            return;
        }

        String inputFilePath = args[0];
        String outputTxtFilePath = args[1];

        try (PDDocument document = Loader.loadPDF(new File(inputFilePath));
             FileWriter writer = new FileWriter(outputTxtFilePath)) {

            // Convert PDF to TXT
            PDFTextStripper pdfTextStripper = new PDFTextStripper();
            String text = pdfTextStripper.getText(document);

            // Write text to output.txt
            writer.write(text);

            System.out.println("Conversion successful.");
        } catch (IOException e) {
            System.err.println("Error during conversion: " + e.getMessage());
            e.printStackTrace();
        }
    }
}
