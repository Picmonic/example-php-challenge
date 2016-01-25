<?php

/**
 * This is the model class for table "commits".
 *
 * The followings are the available columns in table 'commits':
 * @property string $hash
 * @property string $url
 * @property string $message
 * @property integer $author_id
 * @property integer $committer_id
 * @property string $modified
 */
class Commits extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'commits';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hash, url, message, author_id, committer_id', 'required'),
			array('author_id, committer_id', 'numerical', 'integerOnly'=>true),
			array('hash', 'length', 'max'=>40),
			array('url', 'length', 'max'=>255),
			array('modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('hash, url, message, author_id, committer_id, modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
      'author' => array(self::BELONGS_TO, 'Authors', 'author_id'),
      'committer' => array(self::BELONGS_TO, 'Authors', 'committer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'hash' => 'Hash',
			'url' => 'Url',
			'message' => 'Message',
			'author_id' => 'Author',
			'committer_id' => 'Committer',
			'modified' => 'Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('committer_id',$this->committer_id);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  /**
   * Replace entries in database with new data from GitHub API
   *
   * This method will query the GitHub API for a list of recent commits.  If the query is
   * successful, the existing commits in the database will be removed and replaced with the
   * updated data.
   *
   * @return boolean Success or failure of the flush
   */
  public function flush() {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.github.com/repos/nodejs/node/commits');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_VERBOSE, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Example PHP Challenge');
    $result = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($httpcode != 200) {
      return false;
    } else {
      $headersize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
      $result = substr($result, $headersize);
      $this->deleteAll();
      $commits = json_decode($result);
      $commits = array_slice($commits, 0, 25);
      foreach ($commits as $commit) {
        $model = new Commits;
        if (!$author = Authors::model()->findByPK($commit->author->id)) {
          $author = new Authors;
          $author->id = $commit->author->id;
          $author->login = $commit->author->login;
          $author->avatar_url = $commit->author->avatar_url;
          $author->url = $commit->author->html_url;
          $author->save();
        }
        if (!$committer = Authors::model()->findByPK($commit->committer->id)) {
          $committer = new Authors;
          $committer->id = $commit->committer->id;
          $committer->login = $commit->committer->login;
          $committer->avatar_url = $commit->committer->avatar_url;
          $committer->url = $commit->committer->html_url;
          $committer->save();
        }
        $model->hash = $commit->sha;
        $model->url = $commit->html_url;
        $model->message = $commit->commit->message;
        $model->author_id = $author->id;
        $model->committer_id = $committer->id;
        $model->modified = date('Y-m-d H:i:s');
        $model->save();
      }
      return true;
    }
    
  }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Commits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
