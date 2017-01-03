<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$compact = ["'" . $singularName . "'"];
%>

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $<%= $singularName %> = $this-><%= $currentModelName %>->newEntity();
        if ($this->request->is('post')) {
            $defaultValidator = $this-><%= $currentModelName %>->validator('default');
            $errors = $defaultValidator->errors($this->request->data());
            if (!empty($errors)) {
                throw new BadRequestException(__('Data validation error.'.$this->getErrorLine($errors)));
            }
            $<%= $singularName %> = $this-><%= $currentModelName %>->patchEntity($<%= $singularName %>, $this->request->data);
            if ($<%= $singularName %>->errors()) {
                throw new BadRequestException(__('Data validation error.'.$this->getErrorLine($<%= $singularName %>->errors())));
            } else {
                if ($this-><%= $currentModelName; %>->save($<%= $singularName %>)) {
                    $this->response->statusCode(201);
                    $this->response->header('Location', Router::url(['_method' => 'GET', 'action' => 'view', $<%= $singularName %>->id]));
                    $this->set(compact('<%=$singularName%>'));
                    $this->set('_serialize', ['<%=$singularName%>']);
                } else {
                    throw new ConflictException(__('Could not be saved.'.$this->getErrorLine($<%= $singularName %>->errors())));
                }
            }
        }
    }
