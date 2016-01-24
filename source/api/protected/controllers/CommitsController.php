<?php

class CommitsController extends Controller
{

  /**
   * Sends a response with an HTTP status code header
   *
   * Formats a message with an HTTP status code for use in an API, and terminates the
   * current Yii app instance.  
   *
   * @link http://www.gen-x-design.com/archives/create-a-rest-api-with-php/ original source
   *
   * @param int $status HTTP status of the response
   * @param string $body Body to send with the response
   * @param string $content_type MIME type, defaults to text/html
   */
  private function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
  {
      // set the status
      $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
      header($status_header);
      // and the content type
      header('Content-type: ' . $content_type);
   
      // pages with body are easy
      if($body != '')
      {
          // send the body
          echo $body;
      }
      // we need to create the body if none is passed
      else
      {
          // create some body messages
          $message = '';
   
          // this is purely optional, but makes the pages a little nicer to read
          // for your users.  Since you won't likely send a lot of different status codes,
          // this also shouldn't be too ponderous to maintain
          switch($status)
          {
              case 401:
                  $message = 'You must be authorized to view this page.';
                  break;
              case 404:
                  $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                  break;
              case 500:
                  $message = 'The server encountered an error processing your request.';
                  break;
              case 501:
                  $message = 'The requested method is not implemented.';
                  break;
          }
   
          // servers don't always have a signature turned on 
          // (this is an apache directive "ServerSignature On")
          $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];
   
          // this should be templated in a real-world solution
          $body = '
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
  <html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
      <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
  </head>
  <body>
      <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
      <p>' . $message . '</p>
      <hr />
      <address>' . $signature . '</address>
  </body>
  </html>';
   
          echo $body;
      }
      Yii::app()->end();
  }

  /**
   * Gets a string message for a given HTTP status code
   *
   * Helper function to supply generic HTTP status code messages
   *
   * @link http://www.gen-x-design.com/archives/create-a-rest-api-with-php/ original source
   *
   * @param int $status HTTP status of the response
   * @return string Status code message
   */
  private function _getStatusCodeMessage($status)
  {
      $codes = Array(
          200 => 'OK',
          400 => 'Bad Request',
          401 => 'Unauthorized',
          402 => 'Payment Required',
          403 => 'Forbidden',
          404 => 'Not Found',
          500 => 'Internal Server Error',
          501 => 'Not Implemented',
      );
      return (isset($codes[$status])) ? $codes[$status] : '';
  }

	public function actionFlush()
	{
		if ($code = Commits::model()->flush()){
      $this->_sendResponse(200, 'Database flushed');
    } else {
      $this->_sendResponse(500, 'Could not flush database');
    }
	}
  
  public function actionList() {
    $models = Commits::model()->findAll();
    if (empty($models)) {
      $this->_sendResponse(404, 'No records found.  Try flushing the database?');
    } else {
      $rows = array();
      foreach($models as $model) {
        $rows[] = $model->attributes;
      }
      $this->_sendResponse(200, CJSON::encode($rows));
    }
  }
}