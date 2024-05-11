<?php

App::uses('AppController', 'Controller');

/**

 * SocialLinks Controller

 *

 * @property SocialLink $SocialLink

 * @property PaginatorComponent $Paginator

 * @property RequestHandlerComponent $RequestHandler

 */

class SocialLinksController extends AppController {



/**

 * Helpers

 *

 * @var array

 */

	public $helpers = array('Text');



/**

 * Components

 *

 * @var array

 */

	public $components = array('Paginator', 'RequestHandler');





/**

 * admin_index method

 *

 * @return void

 */

	public function admin_index() {

		$this->SocialLink->recursive = 0;

		$this->set('socialLinks', $this->Paginator->paginate());

	}



/**

 * admin_view method

 *

 * @throws NotFoundException

 * @param string $id

 * @return void

 */

	public function admin_view($id = null) {

		if (!$this->SocialLink->exists($id)) {

			throw new NotFoundException(__('Invalid social link'));

		}

		$options = array('conditions' => array('SocialLink.' . $this->SocialLink->primaryKey => $id));

		$this->set('socialLink', $this->SocialLink->find('first', $options));

	}



/**

 * admin_add method

 *

 * @return void

 */

	public function admin_add() {

		if ($this->request->is('post')) {

			//$this->uploadValidImage('SocialLink','image','img/frontend/social');

			$this->SocialLink->create();

			if ($this->SocialLink->save($this->request->data)) {

				$last_insert_id = $this->SocialLink->getLastInsertID();

				$this->Session->setFlash(__('The social link has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'view',$last_insert_id));

			} else {

				$this->Session->setFlash(__('The social link could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));

			}

		}

	}



/**

 * admin_edit method

 *

 * @throws NotFoundException

 * @param string $id

 * @return void

 */

	public function admin_edit($id = null) {

		if (!$this->SocialLink->exists($id)) {

			throw new NotFoundException(__('Invalid social link'));

		}

		if ($this->request->is(array('post', 'put'))) {
			

			//$this->uploadValidImage('SocialLink','image','img/frontend/social');

			if ($this->SocialLink->save($this->request->data)) {

				$this->Session->setFlash(__('The social link has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'view',$id));

			} else {

				$this->Session->setFlash(__('The social link could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));

			}

		} else {

			$options = array('conditions' => array('SocialLink.' . $this->SocialLink->primaryKey => $id));

			$this->request->data = $this->SocialLink->find('first', $options);

		}

	}



/**

 * admin_delete method

 *

 * @throws NotFoundException

 * @param string $id

 * @return void

 */

	public function admin_delete($id = null) {

		$this->SocialLink->id = $id;

		if (!$this->SocialLink->exists()) {

			throw new NotFoundException(__('Invalid social link'));

		}

		$this->request->onlyAllow('post', 'delete');

		if ($this->SocialLink->delete()) {

			$this->Session->setFlash(__('The social link has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));

		} else {

			$this->Session->setFlash(__('The social link could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));

		}

		return $this->redirect(array('action' => 'index'));

	}}

