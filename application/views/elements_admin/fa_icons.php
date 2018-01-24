<div class="icons-list">
<?php
$fa_icons = fa_icons();
foreach ($fa_icons as $icon=>$hex) {
?>

<label class="checkbox-inline fa_div" for="<?= $icon ?>">
  <input type="radio" id="<?= $icon ?>" name="icon" value="<?= $icon ?>"> <i class="fa <?= $icon ?> fa_display" aria-hidden="true"></i><br><?= str_replace("fa-","",$icon) ?>
</label>

<?php
}
?>
</div>