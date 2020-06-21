<?

  defined('KERNEL_ACCESS') or header('Location: /');

  if($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'http')
  {
    $URL = $this->URL();
    $_SERVER['HTTPS'] = 'on';
    header('Location: https://' . $URL['host'] . $_SERVER['REQUEST_URI']);
  }

?>
