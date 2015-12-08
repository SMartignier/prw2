<div id="list">

    <form action="<?php echo htmlentities($_SERVER["REQUEST_URI"]); ?>" method="get">
        <select name="category_id" onchange="this.form.submit();">
            <option value="0">--- Tout ---</option><?php

            //Selection des categories
            $allCategories = \Models\Categories::find();

            foreach ($allCategories AS $category)
            {
                ?>
                <option value="<?php echo $category->primaryKey; ?>"<?php if ($category->primaryKey == @$_GET["category_id"]) echo 'selected="selected"'; ?>><?php echo $category->category; ?></option><?php
            }
            ?>
        </select>
    </form>
    <table><?php
        //Si une categorie est selectionnée, on n'affiche que celle-ci, sinon on affiche tout
        if (@$_GET["category_id"] && $_GET["category_id"] != 0)
        {
            $catSelected = \Models\Categories::findByPk($_GET["category_id"]);
            ?>
            <tr>
                <td colspan="4"><h2><?php echo $catSelected->category; ?></h2></td>
            </tr>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Panier</th>
            </tr><?php

            //Selection des articles d'une categorie
            $catArticles = $catSelected->articles;
            foreach ($catArticles AS $article)
            {
                ?>
                <tr>
                <td><img src="assets/images/articles/<?php echo $article->picture; ?>"
                         alt="<?php echo $article->title; ?>"/></td>
                <td><a href="view?id=<?php echo $article->primaryKey; ?>"><?php echo $article->title; ?></a></td>
                <td class="prix"><?php echo number_format($article->price, 2); ?></td>
                <td><a href="basket?action=add&amp;id=<?php echo $article->primaryKey; ?>">Ajouter au panier</a></td>
                </tr><?php
            }
        }
        else
        {
            foreach ($allCategories AS $category)
            {
                ?>
                <tr>
                    <td colspan="4"><h2><?php echo $category->category; ?></h2></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Panier</th>
                </tr><?php

                //Selection des articles d'une categorie
                $catArticles = $category->articles;
                foreach ($catArticles AS $article)
                {
                    ?>
                    <tr>
                    <td><img src="assets/images/articles/<?php echo $article->picture; ?>"
                             alt="<?php echo $article->title; ?>"/></td>
                    <td><a href="view?id=<?php echo $article->primaryKey; ?>"><?php echo $article->title; ?></a></td>
                    <td class="prix"><?php echo number_format($article->price, 2); ?></td>
                    <td><a href="basket?action=add&amp;id=<?php echo $article->primaryKey; ?>">Ajouter au panier</a>
                    </td>
                    </tr><?php
                }

            }
        }
        ?>
    </table>

</div>