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
%>

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
<% $belongsTo = $this->Bake->aliasExtractor($modelObj, 'BelongsTo'); %>
        $<%= $pluralName %> = $this-><%= $currentModelName %>->find('all');

        $this->set(compact('<%= $pluralName %>'));
        $this->set('_serialize', ['<%= $pluralName %>']);
    }
