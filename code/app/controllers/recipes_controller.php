<?php

/**
 * RecipesController class
 *
 * @uses          AppController
 * @package       mongodb
 * @subpackage    mongodb.samples.controllers
 */
class RecipesController extends AppController
{

    public $Recipe;
    public $paginate = array(
        'limit' => 12,
        'order' => array(
            'Recipe.name' => 'asc'
        )
    );

    /**
     * name property
     *
     * @var string 'Recipes'
     * @access public
     */
    public $name = 'Recipes';

    public function __construct()
    {
        parent::__construct();
    }

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    /**
     * index method
     *
     * @return void
     * @access public
     */
    public function index()
    {
        // Only accept the following criteria for search params
        $validCriteria = array('modelSelect', 'criteria', 'opSelect');

        /*
         *  See if the user passed seach criteria. If so, then assign it to the
         * session so we can retrieve it on the next request. If there is not 
         * criteria then delete it from the session
         */
        foreach ($validCriteria as $crit)
        {
            if (!empty($this->data['Recipe'][$crit]))
            {
                $this->Session->write('Pager.Recipe.' . $crit, $this->data['Recipe'][$crit]);
            }
            else
            {
                $this->Session->delete('Pager.Recipe.' . $crit);
            }
        }
        
        /*
         * If there is search criteria in Session then assign it back to the 
         * Controller's data property so that its available to the view and we
         * can then extract it to form the search conditions.
         */
        foreach ($validCriteria as $crit)
        {
            if ($this->Session->check('Pager.Recipe.' . $crit))
            {
                $this->data['Recipe'][$crit] = $this->Session->read('Pager.Recipe.' . $crit);
            }
        }

        $this->paginate['conditions'] = $this->extractSearchParams();
        $results = $this->paginate('Recipe');
        $this->set(compact('results'));
    }

    /**
     * 
     * @return array 
     */
    private function extractSearchParams()
    {

        $searchParams = array();
        if (!empty($this->data['Recipe']['criteria']))
        {
            $criteria = array();
            $model = null;

            $op = '$or'; // $and | $or
            if (!empty($this->data['Recipe']['opSelect']))
            {
                $op = $this->data['Recipe']['opSelect'];
            }

            $this->set('selectedOp', $op);

            $ar = explode(',', $this->data['Recipe']['criteria']);
            foreach ($ar as $a)
            {
                $criteria[] = trim($a);
            }

            switch ($this->data['Recipe']['modelSelect'])
            {
                case 'ingredients':
                    $field = 'Recipe.ingredients.ingredient';
                    break;
                case 'recipe':
                    $field = 'Recipe.name';
                    break;
            }

            $this->set('selectedModel', $this->data['Recipe']['modelSelect']);

            foreach ($criteria as $item)
            {
                $searchParams["$op"][] = array(
                    $field => array(
                        '$regex' => new MongoRegex('/' . $item . '/i')
                    )
                );
            }
        }
        return $searchParams;
    }

    public function getRecipeList()
    {
        $arrayOfObjects = array();
        
        $params = array(
            'order' => array('name' => 1)
        );
        
        $results = $this->Recipe->find('list', $params);

        foreach ($results as $k => $v)
        {
            $obj = new stdClass();
            $obj->value = $k;
            $obj->label = $v;
            $arrayOfObjects[] = $obj;
        }
        $this->set('response', $arrayOfObjects);
        $this->render('../elements/ajax_response', 'ajax');
    }

    /**
     * add method
     *
     * @return void
     * @access public
     */
    public function add()
    {
        if (!empty($this->data))
        {

            $this->Recipe->create();

            $this->removeEmptyIngredient();

            $this->lowerCaseInput();

            if ($this->Recipe->save($this->data))
            {
                $this->flash(__('Recipe saved.', true), array('action' => 'index'));
            }
            else
            {
                
            }
        }
    }

    /**
     * edit method
     *
     * @param mixed $id null
     * @return void
     * @access public
     */
    public function edit($id = null)
    {
        if (!$id && empty($this->data))
        {
            $this->flash(__('Invalid Recipe', true), array('action' => 'index'));
        }
        if (!empty($this->data))
        {

            $this->removeEmptyIngredient();

            $this->lowerCaseInput();

            if ($this->Recipe->save($this->data))
            {
                $this->flash(__('The Recipe has been saved.', true), array('action' => 'index'));
            }
            else
            {
                
            }
        }
        if (empty($this->data))
        {
            $this->data = $this->Recipe->read(null, $id);
//$this->data = $this->Recipe->find('first', array('conditions' => array('_id' => $id)));
        }

        $this->set('tags', $this->Recipe->Tag->find('list'));
    }

    /**
     * edit method
     *
     * @param mixed $id null
     * @return void
     * @access public
     */
    public function view($id = null)
    {
        if (!$id && empty($this->data))
        {
            $this->flash(__('Invalid Recipe', true), array('action' => 'index'));
        }
        if (empty($this->data))
        {
            $this->data = $this->Recipe->read(null, $id);
        }

        $this->set('tags', $this->Recipe->Tag->find('list'));
    }

    /**
     * There must be at least on of the following fields present:
     * Ingredient
     * in order for an ingredient to be valid
     */
    private function removeEmptyIngredient()
    {
        $fields = array('ingredient');
        foreach ($this->data['Recipe']['ingredients'] as $k => $ingredient)
        {
            $empty = true;

            foreach ($fields as $field)
            {
                if (!empty($ingredient[$field]))
                {
                    $empty = false;
                    break;
                }
            }
            if ($empty)
            {
                unset($this->data['Recipe']['ingredients'][$k]);
            }
        }
    }

    /**
     * delete method
     *
     * @param mixed $id null
     * @return void
     * @access public
     */
    public function delete($id = null)
    {
        if (!$id)
        {
            $this->flash(__('Invalid Recipe', true), array('action' => 'index'));
        }
        if ($this->Recipe->delete($id))
        {
            $this->flash(__('Recipe deleted', true), array('action' => 'index'));
        }
        else
        {
            $this->flash(__('Recipe deleted Fail', true), array('action' => 'index'));
        }
    }

    public function getNewIngredientRow()
    {
        $this->set('rowNum', $this->params['url']['rowCount']);
        $this->render('../elements/ingredient_row', 'ajax');
    }

    /**
     * deleteall method
     *
     * @return void
     * @access public
     */
    public function deleteall()
    {
        $conditions = array('title' => 'aa');
        if ($this->Recipe->deleteAll($conditions))
        {
            $this->flash(__('Recipe deleteAll success', true), array('action' => 'index'));
        }
        else
        {
            $this->flash(__('Recipe deleteAll Fail', true), array('action' => 'index'));
        }
    }

    /**
     * updateall method
     *
     * @return void
     * @access public
     */
    public function updateall()
    {
        $conditions = array('title' => 'ichi2');

        $field = array('title' => 'ichi');

        if ($this->Recipe->updateAll($field, $conditions))
        {
            $this->flash(__('Recipe updateAll success', true), array('action' => 'index'));
        }
        else
        {
            $this->flash(__('Recipe updateAll Fail', true), array('action' => 'index'));
        }
    }

    public function createindex()
    {
        $mongo = ConnectionManager::getDataSource($this->Recipe->useDbConfig);
        $mongo->ensureIndex($this->Recipe, array('title' => 1));
    }

    public function getNewRecipeInstructionRow()
    {
        $this->set('rowNum', $this->params['url']['rowCount']);
        $this->render('../elements/recipe_instruction_row', 'ajax');
    }

    /**
     * Forces input to lowercase
     */
    protected function lowerCaseInput()
    {
        $this->data['Recipe']['name'] = strtolower($this->data['Recipe']['name']);
        $this->data['Recipe']['tags'] = strtolower($this->data['Recipe']['tags']);
        $this->data['Recipe']['description'] = strtolower($this->data['Recipe']['description']);

        foreach ($this->data['Recipe']['ingredients'] as &$ingredient)
        {
            $ingredient['ingredient'] = strtolower($ingredient['ingredient']);
            $ingredient['instruction'] = strtolower($ingredient['instruction']);
            $ingredient['unit'] = strtolower($ingredient['unit']);
        }

        foreach ($this->data['Recipe']['nutritional_info'] as &$info)
        {
            $info = strtolower($info);
        }
    }

}