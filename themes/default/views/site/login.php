
        <?php
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'form-signin',
			),
		));
		?>
            <h2 class="form-signin-heading">Please sign in</h2>
            
            <label for="inputEmail" class="sr-only">Username</label>
            <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'username','autofocus'=>'autofocus')); ?>
            
            <label for="inputPassword" class="sr-only">Password</label>
            <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'password')); ?>
            
            <div class="checkbox">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <?php $this->endWidget(); ?>