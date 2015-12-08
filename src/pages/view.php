<div id="view"><?php
//Selection de l'article
$article = \Models\Articles::findByPk($_GET["id"]);
    ?>
	<h1><?php echo $article->title;?></h1>
	<img src="assets/images/articles/<?php echo $article->picture;?>" alt="<?php echo $article->title;?>" />
	<p><?php echo $article->description;?></p>
	<div class="prix"><?php echo number_format($article->price, 2);?></div>
	<a href="basket?action=add&amp;id=<?php echo $article->primaryKey;?>">Ajouter au panier</a>
	<br /><br /><?php
    ?>
</div>