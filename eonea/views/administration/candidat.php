
<div class="container">
            <h2 class="text-center">Candidature <?php if(isset($candidat)){echo " Num ".$candidat->code; } ?></h2>
            <?php if(isset($candidat)){echo "<input type='hidden' name='code' value='".$candidat->code."'/>"; } ?>
            <?php if(isset($error)): ?>
            <p class="bagde-danger"><?php $error ?></p>
            <?php endif; ?>
            <form method="Post" action="administration/candidat" enctype="multipart/form-data">
                <div class="font-monospace text-start d-flex d-lg-flex flex-row align-items-lg-center mt-5">
                    <div class="font-monospace text-start col flex-column ">
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="nom">Nom :&nbsp;</label>
                            <p><?php if(isset($candidat->nom)){ echo $candidat->nom ;} ?> </p>
                        </div>
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="prenom">Prénom(s) :&nbsp;</label>
                            <p><?php if(isset($candidat->prenom)){ echo $candidat->prenom ;} ?> </p>
                        </div>
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="telephone">Téléphone :&nbsp;</label>
                            <p><?php if(isset($candidat->telephone)){ echo $candidat->telephone ;} ?> </p>
                        </div>
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="email">Email :&nbsp;</label>
                            <p><?php if(isset($candidat->email)){ echo  $candidat->email ;} ?> </p>
                        </div>
                    </div>
                    <div class="font-monospace text-start col flex-column">
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="nationalite">Nationalité:&nbsp;</label>
                            <p><?php if(isset($candidat->nationalite)){ echo $candidat->nationalite ;} ?> </p>
                        </div>
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="date_naissance">Date de naissance :&nbsp;</label>
                            <p><?php if(isset($candidat->date_naiss)){ echo ($candidat->date_naiss);} ?> </p>
                        </div>
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="lieu_naissance">Lieu de naissance :&nbsp;</label>
                            <p><?php if(isset($candidat->lieu_naiss)){ echo $candidat->lieu_naiss ;} ?> </p>
                        </div>
                        </div>
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="num_cnib_passport">N°CNIB/N°PASSPORT:&nbsp;</label>
                            <p><?php if(isset($candidat->num_cnib_passport)){ echo $candidat->num_cnib_passport ;} ?> </p>
                        </div>
                        </div>
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="date_deliv">Date de délivrance :&nbsp;</label>
                            <p><?php if(isset($candidat->date_deliv)){ echo ($candidat->date_deliv);} ?> </p>
                        </div>
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="experience">Expérience:&nbsp;</label>
                            <p><?php if(isset($candidat->experience)){ echo $candidat->experience ;} ?> </p>
                        </div>
                        </div>
                        <div class="d-flex mb-4 border">
                            <label class="form-label" for="domaine_experience">Domaine d'expérience:&nbsp;</label>
                            <p><?php if(isset($candidat->domaine_experience)){ echo $candidat->domaine_experience ;} ?> </p>
                        </div>

                        <div class="d-flex mb-4 border">
                            <label class="form-label w-auto" for="cnib">Emploi :</label>
                            <p><?php if(isset($candidat->emploi)){ echo $candidat->emploi ;}?></p>
                        </div>
                    </div>
                </div>
                <div class="font-monospace text-start d-flex d-lg-flex flex-row align-items-lg-center">
                    <div class="font-monospace text-start col flex-column ">
                        <div class="d-flex justify-content-around w-50 d-flex mb-4 ">
                            <p><a blank title="Voir la cnib" href="../../eonea/files/<?php if(isset($candidat->cnib)){ echo $candidat->cnib ; } ?> "> 
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="2em" height="2em" fill="currentColor">
                                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M223.8 176C223.8 202.5 202.3 224 175.8 224C149.3 224 127.8 202.5 127.8 176C127.8 149.5 149.3 128 175.8 128C202.3 128 223.8 149.5 223.8 176zM96 309.3C96 279.9 119.9 256 149.3 256H218.7C227.8 256 236.5 258.3 244 262.4C211.6 274.3 186.8 301.9 178.8 336H122.7C107.9 336 96 324.1 96 309.3H96zM395.1 262.4C403.5 258.3 412.2 256 421.3 256H490.7C520.1 256 544 279.9 544 309.3C544 324.1 532.1 336 517.3 336H461.2C453.2 301.9 428.4 274.3 395.1 262.4H395.1zM372 288.1C398 293.4 419.3 311.7 427.9 336C430.6 343.5 432 351.6 432 360C432 373.3 421.3 384 408 384H232C218.7 384 208 373.3 208 360C208 351.6 209.4 343.5 212.1 336C220.7 311.7 241.1 293.4 267.1 288.1C271.9 288.3 275.9 288 280 288H360C364.1 288 368.1 288.3 372 288.1V288.1zM512 176C512 202.5 490.5 224 464 224C437.5 224 416 202.5 416 176C416 149.5 437.5 128 464 128C490.5 128 512 149.5 512 176zM256 192C256 156.7 284.7 128 320 128C355.3 128 384 156.7 384 192C384 227.3 355.3 256 320 256C284.7 256 256 227.3 256 192zM544 0C597 0 640 42.98 640 96V416C640 469 597 512 544 512H96C42.98 512 0 469 0 416V96C0 42.98 42.98 0 96 0H544zM64 416C64 433.7 78.33 448 96 448H544C561.7 448 576 433.7 576 416V96C576 78.33 561.7 64 544 64H96C78.33 64 64 78.33 64 96V416z"></path>
                                        </svg></a><span>CNIB</span>
                            </p>
                        </div>
                    </div>
                    <div class="font-monospace text-start col flex-column ">
                        <div class="d-flex justify-content-around w-50 d-flex mb-4 ">
                            <p><a title='voir le diplome' href="../../eonea/files/<?php if(isset($candidat->files)){ echo $candidat->files ; } ?>" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                </svg></a><span><?= $candidat->diplome ?></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-lg-flex justify-content-between justify-content-lg-endd-flex mb-4 border"><button class="btn btn-primary" id="submit" type="submit" name="submit">soumettre</button></div>
            </form>
        </div>
    </div>