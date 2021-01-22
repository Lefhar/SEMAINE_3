<h1>Mon panier</h1>

<!-- application/views/detail.php -->
<div class="container">
    <div class="row">
<div class="col-12">   
<article>
<?php 
// Si le panier n'existe pas encore  
if ($this->session->panier != null) 
{ 
?>
    <div class="row">
    <div class="col-12"> 

                <table class="table table-sm table-striped table-bordered"><!--début du tableau-->
        <thead>
            <tr>
                <th>Quantité</th>
                <th>Libéllé produit</th>
                <th>Prix unitaire</th>
                <th>Sous-total</th>
                <th>Modifier</th>
                <th>Retirer</th> 
            </tr>   
        </thead>
        <tbody>
        <?php 
        
        $iTotal = 0;
        foreach($panier as $article){
            $iTotal += $article['pro_qte'] * $article['pro_prix'];
            
            
         


//    var_dump($article);   
//    echo $article;
// echo 'aaa'.$article[$key].'';
// echo 'aaa'.$article["pro_qte"].'';

$soustotal = $article['pro_qte'] * $article['pro_prix'];
echo '<tr>
'.form_open("panier/modifierQuantite").'
  
    <td><input type="number" class="form-control" name="pro_qte" id="pro_qte" value="'.$article['pro_qte'].'"></td>
    <td>'.$article['pro_libelle'].'</td>
    <td>'.$article['pro_prix'].'</td>
    <td>'.$soustotal.'€</td>
    <input type="hidden" name="pro_prix" id="pro_prix" value="'.$article['pro_prix'].'">
    <input type="hidden" name="pro_id" id="pro_id" value="'.$article['pro_id'].'">
    <input type="hidden" name="pro_libelle" id="pro_libelle" value="'.$article['pro_libelle'].'">
    <td><button type="submit" class="btn btn-dark">Modifier</button></td>
    </form>
    <td><a href="'.site_url('panier/supprimerProduit/'.$article['pro_id'].'').'">Retirer du panier</a></td>
</tr>

';
}

        

        /* ici, écrire le code pour afficher les produits mis dans le panier...
        * ... oh oh oh! ça sent la boucle...  
        * n'oubliez pas de calculer le total,
        * ni d'ajouter de mettre un champ de type number pour augmenter/diminuer la quantité d'un produit
        */
        ?>
        </tbody>
    </table>
    </div>
    </div>

        <div>
            <h3>Récapitulatif</h3>
            <div>
                <p>TOTAL : <?= str_replace('.', ',' , $iTotal); ?> &euro;</p>
                <p> <a href="<?= site_url("panier/supprimerPanier"); ?>" >Supprimer le panier</a></p> 
                <p><a href="<?= site_url("produits/liste"); ?>">Retour liste des produits</a></p>
            </div>
        </div>
    </div>
    </div>
    <?php 
    } 
    else 
    { 

        ?>
        <div class="alert alert-danger">Votre panier est vide. Pour le remplir, vous pouvez consulter <a href="<?= site_url("produits/liste"); ?>">la liste des produits</a>.</div>
        <?php 
    } 
    ?>
     </article>
        </div>
    </div>
</div>