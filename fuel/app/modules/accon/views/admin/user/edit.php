<?php
/**
 * Part of the kurobuta.jp.
 *
 * Copyright (c) 2015 Maemori Fumihiro
 * This software is released under the MIT License.
 * http://opensource.org/licenses/mit-license.php
 *
 * @version    1.0
 * @author     Maemori Fumihiro
 * @link       https://kurobuta.jp
 */

?>
<div class="container">
	<?php echo Form::open(array('action' => MODULE.'/admin/user/modify', 'class' => 'form-horizontal')); ?>
	<?php echo Form::csrf(); // CSRF 保護 ?>
	<div class="row">
		<div class="col-md-12">
			<h2>アカウント情報の変更</h2>
			<div class="well">
				<?php echo render('admin/user/_form_edit', array(ACTION_CREATE => true, ACTION_EDIT => true)); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="btn-group btn-group-lg">
				<?php echo Html::anchor(Session::get('return_url'),
					'<span title="戻る" class="glyphicon glyphicon-arrow-left">',
					array('class' => 'btn btn-default')); ?>
				<button type="submit" id="submit" name="<?php echo PROCESSING ?>" value="<?php echo SUBMIT_CREATE ?>" class="btn btn-primary">
					<span title="保存" class="glyphicon glyphicon-save"></span>
				</button>
			</div>
		</div>
	</div>
	<?php echo Form::close(); ?>
</div>
