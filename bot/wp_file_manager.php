<?php
class FileManager
{
  private $TODAY;
  private $YESTERDAY;
  function __construct(){
      $this->TODAY     = date('Y_m_d');
      $this->YESTERDAY = date('Y_m_d', strtotime("- 1 day"));
  }
  function makePath($date_val){
    $result = dirname(__FILE__) . "/" . $date_val . ".txt";
    return $result;
  }
  public function write($log_message){
    $path         = $this->makePath($this->TODAY);
    $file_manager = fopen($path,"a");
    fwrite($file_manager,$log_message . "\n");
    fclose($file_manager);
  }
  public function getText(){
    $path     = $this->makePath($this->YESTERDAY);
    $textData = file_get_contents($path);
    $result   = $this->YESTERDAY. "のincluderブログ閲覧結果をお知らせするよ！" . PHP_EOL . $textData;
    return $result;
  }
}
?>
