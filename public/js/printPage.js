if((bloc=document.getElementById('pdfcontent') )){
    print=document.getElementById('print')
    print.addEventListener("click", function(){
    navbloc = document.getElementById('headerpdf'); 
    footbloc = document.getElementById('footerpdf'); 
    nav="<nav class='navbar navbar-light navbar-expand-md py-3 mb-2'><div class='container'><a class='navbar-brand d-flex align-items-center' href='#'><span class='bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon'><img src='public/img/Logo-ONEA-Avec-ISO-9001.jpg'></span></a></div></nav>";
    foot=" <footer class='d-block bottom-0'><p class='text-center small p-0'><br>&nbsp;Société d'Etat régie par la loi N° 25/99/AN du 16/11/19<br> Créée par décret N° 85/387/CNR/PRES/Eau du 22/07/1985<br> Capital social 3 080 000 000<br><br></p></footer>";
    // navbloc.innerHTML=nav;
    // footbloc.innerHTML=foot;
    var divContents = $("#pdfcontent").html();
  
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head><title>RecepisseOnea</title>');
        printWindow.document.write('<meta charset="utf-8">');
        printWindow.document.write('<meta http-equiv="Content-Type" content="application/pdf; " />');
        printWindow.document.write('<meta Content-Disposition:attachment;filename="recepisseOnea.pdf" />');
        printWindow.document.write('<link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">');
        printWindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">');
        printWindow.document.write('<link rel="stylesheet" href="public/fonts/fontawesome-all.min.css">');
        printWindow.document.write('</head><body >');
        printWindow.document.write(nav);
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.write(foot);
        printWindow.document.close();
        // printWindow.print();
    });
}