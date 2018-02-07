<div class="categories single-sidebar">
    <h4><span class="section-title-style left-section-title-style"><i></i><i></i><i></i></span><b> Blog Categories </b><span class="section-title-style right-section-title-style"><i></i><i></i><i></i></span></h4>
    <ul>
        <li><a href="/main/blog_category?id=0"><i class="fa fa-check"></i> Uncategorised</a></li>
        <?php foreach($categories as $element) { ?>
        <li><a href="/main/blog_category?id=<?= $element->id ?>"><i class="fa fa-check"></i> <?= $element->name ?></a></li>
        <?php } ?>
    </ul>
</div>

<div class="recent-post  single-sidebar">
    <h4><span class="section-title-style left-section-title-style"><i></i><i></i><i></i></span><b> Latest Posts </b><span class="section-title-style right-section-title-style"><i></i><i></i><i></i></span></h4>
    <?php foreach($blogs as $element) { ?>
    <div class="recent-single">
        <?php if (!empty($element->image)) { ?>
          <a href="/main/blog?id=<?= $element->id ?>"><img src="/assets/img/blog/<?= $element->image ?>" class="img-responsive" alt="image"></a>
        <?php } ?>
        <a class="re-button" href="/main/blog?id=<?= $element->id ?>"><?= $element->title ?> | <?= db_seperate_date('date',$element->date) ?> | Post By: Admin</a>
    </div>
    <?php } ?>
</div>
