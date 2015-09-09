<html>
<head>
<title>Picmonic App</title>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/fonts/glyphicons/css/glyphicon.css">
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Yii::app()->homeUrl; ?>">Logo Space</a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li<?php echo (Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index' ? ' class="active"' : '') ?>><a href="<?php echo Yii::app()->homeUrl; ?>">Home</a></li>
                <li<?php echo (Yii::app()->controller->id == 'commit' ? ' class="active"' : '') ?>><a href="<?php echo Yii::app()->createUrl("commit") ?>">Commits</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(Yii::app()->user->isGuest) { ?>
                <li><p style="margin-right:20px;" class="navbar-btn"><a href="<?php echo Yii::app()->createUrl("login") ?>" class="btn btn-primary">Login</a></p></li>
                <?php } else { ?>
                <li><h3 style="margin-top:20px;margin-right:10px;" class="navbar-btn">Welcome <?php echo Yii::app()->user->display_name ?></h3></li>
                <li><p style="margin-right:20px;" class="navbar-btn"><a href="<?php echo Yii::app()->createUrl("logout") ?>" class="btn btn-primary">Logout</a></p></li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    
    <div class="container">
           
		<?php echo $content ?>
        
    </div>

</body>
</html>