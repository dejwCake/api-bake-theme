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

$belongsTo = $this->Bake->aliasExtractor($modelObj, 'BelongsTo');
$belongsToMany = $this->Bake->aliasExtractor($modelObj, 'BelongsToMany');
$compact = ["'" . $singularName . "'"];
%>

    /**
     * Edit method
     *
     * @param string|null $id <%= $singularHumanName %> id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $<%= $singularName %> = $this-><%= $currentModelName %>->get($id, [
            'contain' => [<%= $this->Bake->stringifyList($belongsToMany, ['indent' => false]) %>]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
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
                    $this->response->statusCode(200);
                    $this->response->header('Location', Router::url(['_method' => 'GET', 'action' => 'view', $<%= $singularName %>->id]));
                    $this->set(compact('<%=$singularName%>'));
                    $this->set('_serialize', ['<%=$singularName%>']);
                } else {
                    throw new ConflictException(__('Could not be saved.'.$this->getErrorLine($<%= $singularName %>->errors())));
                }
            }
        }
    }
