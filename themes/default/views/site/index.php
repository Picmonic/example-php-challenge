
        <div class="row">
            <?php
			$password = 'admin_911';
			$_dbsalt = 'D*eRDBSy5Pepk=3c5V$^bjp^nM6yCAcCGNY%H*k9SXvurW&pBs-gANJ+ZCscD9s!';
			echo mb_strimwidth(hash("sha512", hash("sha512", hash("whirlpool", md5($password))) . hash("sha512", md5($password . md5($_dbsalt))) . $_dbsalt), 0, 64);
			?>
            <div class="col-xs-12">
                <div class="jumbotron">
                    <h1>PicMonic Commits App</h1>
                    <p>This app requires you to be logged in to add the commits to the database and to view the commits. If you click the "Get Commits" button without being signed in, you will be redirected to the login page.</p>
                    <p><a href="<?php echo Yii::app()->createUrl("commit") ?>" class="btn btn-primary btn-lg">Get Commits</a></p>
                </div>
            </div>
        </div>