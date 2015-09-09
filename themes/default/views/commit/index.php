<?php
$this->pageTitle = 'Commits';
$this->breadcrumbs=array(
	$this->pageTitle,
);

if(count($items) > 0) {
	$sort_item = $sort->getDirections();
	$sort_key = key($sort_item);
	$direction_icon = (in_array('1', $sort_item) ? '<i class="fa fa-sort-down"></i>' : '<i class="fa fa-sort-up"></i>');
}
?>

        <div class="widget stacked widget-table action-table">
                
            <div class="widget-header">
                <i class="icon-th-list"></i>
                <h3>Last 25 Commits</h3>
            </div>
            
            <div class="widget-content">
                
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $sort->link('id'); ?><?php echo $sort_key == 'id' ? ' '.$direction_icon : ''; ?></th>
                            <th><?php echo $sort->link('sha'); ?><?php echo $sort_key == 'sha' ? ' '.$direction_icon : ''; ?></th>
                            <th><?php echo $sort->link('committer'); ?><?php echo $sort_key == 'committer' ? ' '.$direction_icon : ''; ?></th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tappend">
                        
                        <?php
						if(count($items) > 0) {
							foreach($items as $item) {
						?>
                        
                        <tr<?php echo is_numeric(substr($item->sha, -1, 1)) ? ' style="background:#E6F1F6"' : ''; ?>>
                            <td><?php echo $item->id; ?></td>
                            <td><a href="<?php echo $item->url; ?>" target="_blank"><?php echo $item->sha; ?></a></td>
                            <td><?php echo $item->committer; ?></td>
                            <td class="text-right">
                                <a href="<?php echo $item->url; ?>" target="_blank" class="btn btn-small btn-success">
                                    <i class="fa fa-link"></i> View Commit
                                </a>
                            </td>
                        </tr>
                        <?php
							}
						}
						else {
						?>
                        <tr>
                            <td><h3>No commits in the database ...</h3></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                
            </div>
        
        </div>