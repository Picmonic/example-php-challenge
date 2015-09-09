<?php
/**
 * Model is the customized base active record class.
 * All model classes for this application should extend from this base class.
 */
class Model extends CActiveRecord {
	
	public $forbiddenRoutes = array(
		'sitemap.xml',
		'search',
		'contact',
		'post.rss',
		'post',
		'video.rss',
		'video',
		'activation',
		'forgot',
		'register',
		'login',
		'logout',
		'admin',
		'hybridauth',
		'about'
	);
	
}