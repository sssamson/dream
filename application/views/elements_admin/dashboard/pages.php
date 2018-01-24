<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th>Order</th>
      <th>Title</th>
      <th data-sortable="false">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pages as $element) { ?>
      <tr>
        <td><?= $element->order ?></td>
        <td><?= $element->section ?></td>
        <td>
          <!-- Edit -->
          <button 
            data-id="<?= $element->id ?>" 
            data-toggle="tooltip" 
            title="Edit" 
            type="button" 
            class="btn-loading btn btn-warning btn-sm edit ">
            <i class="fa fa-pencil" aria-hidden="true"></i>
          </button>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>