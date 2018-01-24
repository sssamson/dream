<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="/admin/general/?page=dashboard">Home</a></li>
	<li class="breadcrumb-item"><a href="<?= $page['section_url'] ?>"><?= ucfirst($page['section']) ?></a></li>
	<?php
  if (!empty($page['page_title'])) {
  ?>
  	<li class="breadcrumb-item active"><?= ucfirst($page['title']) ?></li>
  <?php
  }
  ?>
</ol>