function printDiv() {
    let divContents = document.getElementById("GFG").innerHTML;
    let printWindow = window.open('', '', 'height=500, width=500');
    printWindow.document.open();
    printWindow.document.write(`
        <html>
        <head>
            <title>Sky Wave</title>
            <style>
                body { font-family: Arial, sans-serif; }
                
                .details{
                    margin-top: 30px;
                    line-height:30px;
                    font-size: 15px;
                }
                .header{
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                    text-align: center;
                }

            </style>
        </head>
        <body>
            ${divContents}
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();

    alert("Print Successful");
}