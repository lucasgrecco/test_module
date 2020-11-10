<?php

namespace Drupal\test_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class DecryptController.
 */
class DecryptController extends ControllerBase {

  /**
   * Decrypt.
   *
   * @param $nid
   *
   * @return string
   *   redirect user to the node
   */
  public function decrypt($nid) {
    $d_nid = base64_decode($nid, TRUE);

    if ($d_nid != FALSE && is_numeric($d_nid)) {
      $response = new RedirectResponse(\Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $d_nid])
        ->toString());
      return $response->send();
    }

    return $this->redirect('<front>');
  }

}
