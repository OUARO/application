<div class="container">
    
    <div class="card-header">
        <h2 id='Tablename' class="card-title">Liste des emplois</h2>
        <span hidden id="print">portrait</span>

    </div>
    <div class="card-body">
        <div class="table-responsive table mb-0 pt-3 pe-2">
            <table id="ListTable" class="table table-striped table-sm my-0 display ">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>emplois</th>
                        
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($emplois==null) : ?> <tr><td> Base vide </td></tr>
                    <?php else : 
                        $i=0; 
                        foreach($emplois as $emploi):
                            if( !is_bool($emploi)):?>
                            <form action="administration/diplome" method="post">
                                <tr>    
                                    <td><?= ++$i; ?></td>
                                    <td><?= $emploi->designation ?></td>
                                    <td><button type='submit' value="<?=$i?>">supprimer</button></td>
                                </tr>
                            <?php  endif; endforeach; ?>
                            </form>
                            <?php endif;  ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>