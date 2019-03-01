<?php

namespace common\modules\chat\controllers;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use common\modules\chat\components\Chat;

class DefaultController extends \yii\console\Controller
{
  public function actionIndex()
  {
    $server = IoServer::factory(
      new HttpServer(
        new WsServer(
          new Chat()
        )
      ),
      8080
    );

    $server->run();
  }
}