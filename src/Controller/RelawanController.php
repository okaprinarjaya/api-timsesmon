<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class RelawanController extends AppController
{
  protected $RelawanTbl = null;
  protected $RelawanProfileTbl = null;

  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->viewBuilder()->setLayout(false);
    $this->viewBuilder()->setTemplate('/Pages/json');

    $this->RelawanTbl = TableRegistry::getTableLocator()->get('Relawan');
    $this->RelawanProfileTbl = TableRegistry::getTableLocator()->get('RelawanProfile');
  }

  public function login()
  {
    $this->request->allowMethod(['post']);

    if ($this->request->is('post')) {
      $request_data = $this->request->getData();
      $relawan_query = $this->RelawanTbl->find('all', [
        'conditions' => [
          'Relawan.username' => $request_data['username'],
          'Relawan.password' => $request_data['password']
        ]
      ]);

      $number = $relawan_query->count();
      $response = null;

      if ($number < 1) {
        $response = ['status' => 'USER_NOT_FOUND'];
        $this->response = $this->response->withStatus(404)
          ->withType('json');

      } else {
        $relawan = $relawan_query->first();
        $relawan_profile_query = $this->RelawanProfileTbl->find('all', [
          'conditions' => ['RelawanProfile.relawan_id' => $relawan->relawan_id],
          'contain' => ['Usia', 'Pekerjaan', 'Penghasilan', 'ElectionSession']
        ]);

        if ($relawan_profile_query->count() > 0) {
          $relawan_profile = $relawan_profile_query->first();
          $response = [
            'status' => 'SUCCESS',
            'data' => $this->arrangeRelawanProfileResponse($relawan_profile, $relawan)
          ];
        } else {
          $response = [
            'status' => 'SUCCESS',
            'data' => [
              'relawan_profile' => null
            ]
          ];
        }

        $this->response = $this->response->withStatus(200)
          ->withType('json');
      }

      $this->set(compact('response'));
    }
  }

  public function profile($id)
  {
    $this->request->allowMethod(['post']);

    if ($this->request->is('post')) {
      $request_data = $this->request->getData();
      $relawan = $this->RelawanTbl->get($id);
      $relawan_profile_query = $this->RelawanProfileTbl->find('all', [
        'conditions' => ['RelawanProfile.relawan_id' => $id],
        'contain' => ['Usia', 'Pekerjaan', 'Penghasilan', 'ElectionSession']
      ]);
      $relawan_profile = null;
      $status_code = null;
      $request_data['created_by'] = '8b16d313-9804-473c-8e68-88b6b5122c2a';

      if ($relawan_profile_query->count() > 0) {
        $relawan_profile = $relawan_profile_query->first();
        $relawan_profile = $this->RelawanProfileTbl->patchEntity(
          $relawan_profile,
          $request_data
        );
        $status_code = 200;
      } else {
        $relawan_profile = $this->RelawanProfileTbl->newEntity($request_data);
        $status_code = 201;
      }

      $response = null;

      if ($relawan_profile_save = $this->RelawanProfileTbl->save($relawan_profile)) {
        if (!property_exists($relawan_profile_save, 'election_session')) {
          $relawan_profile_query = $this->RelawanProfileTbl->find('all', [
            'conditions' => ['RelawanProfile.relawan_id' => $id],
            'contain' => ['Usia', 'Pekerjaan', 'Penghasilan', 'ElectionSession']
          ]);
          $relawan_profile_new = $relawan_profile_query->first();
          $response = [
            'status' => 'SUCCESS',
            'data' => $this->arrangeRelawanProfileResponse($relawan_profile_new, $relawan)
          ];
        } else {
          $response = [
            'status' => 'SUCCESS',
            'data' => $this->arrangeRelawanProfileResponse($relawan_profile_save, $relawan)
          ];
        }

        $this->response = $this->response->withStatus($status_code)->withType('json');
      } else {
        $response = ['status' => 'ERROR'];
        $this->response = $this->response->withStatus(500)->withType('json');
      }

      $this->set(compact('response'));
    }
  }

  private function arrangeRelawanProfileResponse($relawan_profile, $relawan)
  {
    return [
      'relawan_profile' => [
        'relawan_id' => $relawan_profile->relawan_id,
        'nama' => $relawan_profile->nama,
        'election_session_id' => $relawan_profile->election_session_id,
        'election_session_name' => $relawan_profile->election_session->nama_kegiatan,
        'gender' => $relawan_profile->gender,
        'usia_id' => $relawan_profile->usia_id,
        'usia' => $relawan_profile->usium->usia,
        'pekerjaan_id' => $relawan_profile->pekerjaan_id,
        'pekerjaan' => $relawan_profile->pekerjaan->pekerjaan,
        'penghasilan_id' => $relawan_profile->penghasilan_id,
        'penghasilan' => $relawan_profile->penghasilan->penghasilan,
        'email' => $relawan_profile->email,
        'alamat' => $relawan_profile->alamat,
        'phonenumber' => $relawan_profile->phonenumber,
        'photo_profile' => $relawan_profile->photo_profile,
        'target_canvasing' => $relawan_profile->target_canvasing,
        'wilayah_prov_id' => $relawan->wilayah_prov_id,
        'nama_prov' => $relawan->nama_prov,
        'wilayah_kabkot_id' => $relawan->wilayah_kabkot_id,
        'nama_kabkot' => $relawan->nama_kabkot,
        'wilayah_kec_id' => $relawan->wilayah_kec_id,
        'nama_kec' => $relawan->nama_kec,
        'wilayah_kel_id' => $relawan->wilayah_kel_id,
        'nama_kel' => $relawan->nama_kel,
        'created' => $relawan_profile->created,
        'modified' => $relawan_profile->modified
      ]
    ];
  }
}
