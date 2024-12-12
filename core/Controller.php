<?php 

class Controller
{
    protected $viewpath='/views/';
    protected $layout='../eonea/views/layout/eonea.php';

    public function Repository($model){
        $model=ucfirst($model);
        $file= '../eonea/model/'. $model. ".php";
        if(isset($file)){
            $repos=$model."Repository";
            $reposFile= '../eonea/repository/'. $repos. ".php";
            try{
                require_once($reposFile);
                return new $repos();
            }catch(Exception $e){echo $e;
                throw new Exception("$e", 1);
            }  
        }
    }

    public function render($view, $data=[],$download=false){ 
        $viewFile= '../eonea'.$this->viewpath. $view. ".php";
        $downloadFile= '../eonea'.$this->viewpath. "download.php";
        global $content;
        if(file_exists($viewFile)){
                ob_start();
                extract($data);
                require_once($viewFile);
                $content = ob_get_clean();
            
                if($download==true) require_once($downloadFile);
                require_once($this->layout);
        } 
    }
    public function download_page($html){ 
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/../eonea/temp']);
        $mpdf->WriteHTML('<nav class="navbar navbar-light navbar-expand-md py-3 mb-2">
                    <div class="container">
                        <a class="navbar-brand d-flex align-items-center" href="#">
                            <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                                <img src="../public/img/Logo-ONEA-Avec-ISO-9001.jpg">
                            </span>
                        </a>
                    </div>
                </nav>',\Mpdf\HTMLParserMode::HTML_BODY);
            $stylesheet = file_get_contents('../public/bootstrap/css/bootstrap.min.css');
            $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);

                //create the pdf
                $mpdf->WriteHTML($html ,\Mpdf\HTMLParserMode::HTML_BODY);
                $mpdf->SetHTMLFooter(" <footer class='d-block bottom-0'>
                <p class='text-center small p-0'><br>&nbsp;Société d'Etat régie par la loi N° 25/99/AN du 16/11/19<br> Créée par décret N° 85/387/CNR/PRES/Eau du 22/07/1985<br> Capital social 3 080 000 000<br><br></p>
                 </footer>");
                //Output the pdf file directly to the browser
                $mpdf->Output("recipisseOnea.pdf",'i');
        
        
    }
    public function mail_to($dest,$html){  try{
        $attachment = new Swift_Attachment($html, 'recepisseOnea.pdf', 'application/pdf');
        $message = (new Swift_Message('Accusé Réception Dossier'))
        ->setFrom(array('seoriginallife@gmail.com' => 'E-ONEA candidature'))
        ->setTo(array("$dest->email", "$dest->email" => "$dest->nom"))
        ->setBody('Nous accusons réception de votre dossier!'."\n".' Votre code est le suivant : '."$dest->code"."\n".'Ci-joint le recepisse de votre candidature')
        ->attach($attachment);

        $transport = (new Swift_SmtpTransport('smtp.gmail.com',25,"Tls"))
        ->setUsername('')
        ->setPassword('');
        ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        // Send the created message
        $mailer->send($message);
    }catch(Exception $e) {throw new Exception($e, 1);}
    
    }

}
