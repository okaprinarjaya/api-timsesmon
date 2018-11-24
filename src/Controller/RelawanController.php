<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class RelawanController extends AppController
{
  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->viewBuilder()->setLayout(false);
    $this->viewBuilder()->setTemplate('/Pages/json');
  }

  public function login()
  {
    $this->request->allowMethod(['post']);

    $request_data = $this->request->getData();
    $relawan_tbl = TableRegistry::getTableLocator()->get('Relawan');
    $relawan_query = $relawan_tbl->find('all', [
      'conditions' => [
        'Relawan.username' => $request_data['username'],
        'Relawan.password' => $request_data['password']
      ],
      'contain' => ['RelawanProfile']
    ]);

    $number = $relawan_query->count();
    $row = $relawan_query->first();
    $response = null;

    if ($number < 1) {
      $response = [
        'status' => 'USER_NOT_FOUND',
        'data' => []
      ];

      $this->response = $this->response->withStatus(404)
        ->withType('json');

    } else {
      $response = [
        'status' => 'SUCCESS',
        'data' => [
          'user_profile' => $row['relawan_profile']
        ]
      ];
      $this->response = $this->response->withStatus(200)
        ->withType('json');
    }

    $this->set(compact('response'));
  }
}
