<div class="container">
    
    <div class="card-header">
        <h2 id='Tablename' class="card-title">Liste des diplomes</h2>
        <span hidden id="print">portrait</span>
    </div>
    <div class="card-body">
        <div class="table-responsive table mb-0 pt-3 pe-2">
            <table id="ListTable" class="table table-striped table-sm my-0 display ">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>diplomes</th>
                        
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($diplomes==null) : ?> <tr><td> Base vide </td></tr>
                    <?php else : 
                        $i=0; 
                        foreach($diplomes as $diplome):
                            if( !is_bool($diplome)):?>
                            <form action="administration/diplome" method="post">
                                <tr>    
                                    <td><?= ++$i; ?></td>
                                    <td><?= $diplome->designation ?></td>
                                    <td><button type='submit' value="<?=$i?>">supprimer</button></td>
                                </tr>
                            <?php  endif; endforeach;?>
                            </form>
                            <?php endif;  ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>