
<p><?=$totaljokes?> Order have been submitted to the order Database.</p>

<?php foreach($jokes as $joke): ?>
  <blockquote>
  <p><b>
  <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?></b>
    (<a href="mailto:<?=htmlspecialchars($joke['email'], ENT_QUOTES,
                    'UTF-8'); ?>">
         <!--yxie 5/24/2022 - first name -->
                <?=htmlspecialchars($joke['f_name'], ENT_QUOTES,
                    'UTF-8'); ?>
         <!--yxie 5/24/2022 - last name -->
                <?=htmlspecialchars($joke['l_name'], ENT_QUOTES,
                    'UTF-8'); ?> </a>  on 
<?php
$date = new DateTime($joke['jokedate']);
//yxie ADD new date format 
echo $date->format('Y-m-d H:i:s');
?>)

<!-- <//  ?php if ($userId == $joke['authorId']): ?>
  <a href="/joke/edit?id=<// ?=$joke['id']?>">Edit</a>
   <form action="/joke/delete" method="post">    JG 5/25/18 org -->
 <?php if ($userId == $joke['authorId']): ?>
  <a href="index.php?joke/edit?id=<?=$joke['id']?>">Edit</a>  <!-- JG 5/25/18 MOD2L --> 
  <form action="index.php?joke/delete" method="post">
    <input type="hidden" name="id" value="<?=$joke['id']?>">
    <input type="submit" value="Delete">
  </form>
<?php endif; ?>
  </p>
</blockquote>
<?php endforeach; ?>