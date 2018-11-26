<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class MasterDataController extends AppController
{
  protected $WilayahProvTbl;
  protected $WilayahKabkotTbl;
  protected $WilayahKecmTbl;
  protected $WilayahKelrTbl;
  protected $UsiaTbl;
  protected $PekerjaanTbl;
  protected $PenghasilanTbl;

  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->viewBuilder()->setLayout(false);
    $this->viewBuilder()->setTemplate('/Pages/json');

    $this->WilayahProvTbl = TableRegistry::getTableLocator()->get('WilayahProvinsi');
    $this->WilayahKabkotTbl = TableRegistry::getTableLocator()->get('WilayahKabkot');
    $this->WilayahKecmTbl = TableRegistry::getTableLocator()->get('WilayahKecamatan');
    $this->WilayahKelrTbl = TableRegistry::getTableLocator()->get('WilayahKelurahan');
    $this->UsiaTbl = TableRegistry::getTableLocator()->get('Usia');
    $this->PekerjaanTbl = TableRegistry::getTableLocator()->get('Pekerjaan');
    $this->PenghasilanTbl = TableRegistry::getTableLocator()->get('Penghasilan');
  }

  public function index()
  {
    $this->request->allowMethod(['get']);

    if ($this->request->is('get')) {
      $response = [
        'status' => 'SUCCESS',
        'data' => [
          'provinsi' => $this->WilayahProvTbl->find('all')->toArray(),
          'kabkot' => $this->WilayahKabkotTbl->find('all')->toArray(),
          'kecamatan' => $this->WilayahKecmTbl->find('all')->toArray(),
          'kelurahan' => $this->WilayahKelrTbl->find('all')->toArray(),
          'usia' => $this->UsiaTbl->find('all')->toArray(),
          'pekerjaan' => $this->UsiaTbl->find('all')->toArray(),
          'penghasilan' => $this->PenghasilanTbl->find('all')->toArray()
        ]
      ];

      $this->response = $this->response->withStatus(200)->withType('json');
      $this->set(compact('response'));
    }
  }
}
