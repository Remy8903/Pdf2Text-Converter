import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.pdmodel.PDPage;
import org.apache.pdfbox.pdmodel.PDPageContentStream;
import org.apache.pdfbox.pdmodel.PDPageTree;
import org.apache.pdfbox.pdmodel.common.PDRectangle;
import org.apache.pdfbox.pdmodel.font.PDType1Font;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;

public class Main {
    public static void main(String[] args) {
        if (args.length != 2) {
            System.out.println("Usage: java TextToPdfConverter <input.txt> <output.pdf>");
            return;
        }

        String inputFilePath = args[0];
        String outputPdfFilePath = args[1];

        try (PDDocument document = new PDDocument()) {
            File inputFile = new File(inputFilePath);
            String content = new String(Files.readAllBytes(inputFile.toPath()));

            PDPageTree allPages = document.getPages();
            // Split content into lines
            String[] lines = content.split("\n");

            // Add each line as a new page
            for (String line : lines) {
                line = line.replace("\r", ""); // Remove carriage return characters

                PDPage page = new PDPage(PDRectangle.A4);
                allPages.add(page);

                try (PDPageContentStream contentStream = new PDPageContentStream(document, page)) {
                    //START CREATE TEXT
                    contentStream.beginText();
                    //SET FONT AND SET TO HELVETICA_BOLD
                    contentStream.setFont(PDType1Font.HELVETICA_BOLD, 20); // Use HELVETICA instead of HELVETICA_BOLD
                    contentStream.newLineAtOffset(50, 700);
                    contentStream.showText(line);
                    contentStream.endText();
                }
            }

            // Save the PDF
            document.save(outputPdfFilePath);

            System.out.println("Conversion successful.");
        } catch (IOException e) {
            System.err.println("Error during conversion: " + e.getMessage());
            e.printStackTrace();
        }
    }
}
