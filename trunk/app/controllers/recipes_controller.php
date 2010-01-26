<?php
class RecipesController extends AppController
{
	public function index() 
	{
		$this->set('recipes', $this->Recipe->find('all'));
	}
	
	public function view($id = null)
	{
	    $this->Recipe->id = $id;
	    if ( empty($this->data))
	    {
	        $this->set('recipe', $this->Recipe->read());
	    }		
	}
	
	public function add()
	{
		if (!empty($this->data)) 
		{
			$this->reformat_data();
			if ($this->Recipe->saveAll($this->data)) 
			{
				$this->Session->setFlash('Your recipe has been saved.');
				$this->redirect(array('action' => 'index'));
			}
			
		}

		$this->set('recipeTypes', $this->Recipe->RecipeType->find('list'));
		$this->set('ingredients', $this->Recipe->IngredientList->Ingredient->find('list'));
		$this->set('measurements', $this->Recipe->IngredientList->Measurement->find('list'));
		$this->set('fractions', $this->Recipe->IngredientList->Fraction->find('list'));
	}
	
    public function edit($id = null)
	{
	    $this->Recipe->id = $id;
	    if ( empty($this->data))
	    {
	        $this->data = $this->Recipe->read();
	    }
	    else
	    {
	        if ($this->Recipe->save($this->data))
	        {
	            $this->Session->setFlash('Your recipe has been updated.');
	            $this->redirect(array('action'=>'index'));
	        }
	    }
	}
	
    public function delete($id)
	{
		$this->Recipe->delete($id, $cascade = true);
	    $this->Session->setFlash('The recipe with id: '.$id.' has been deleted.');
	    $this->redirect(array('action'=>'index'));
	}
	
	/**
	 * @method		reformat_data
	 * @return 		void
	 * @description	This method simply repackages the incoming form data into what CakePHP expects
	 * 				to use for saving multiple records.
	 * 				http://book.cakephp.org/view/75/Saving-Your-Data
	 */
	private function reformat_data()
	{
		$key = 'IngredientList';
		$data = array();
		
		$data['Recipe'] = $this->data['Recipe'];
		
		foreach($this->data as $k => $v)
		{
			$row = str_split($k, strlen($key));
			if($row[0] == $key)
			{
				if($this->is_valid_ingredient($v))
				{
					$data[$key][] = $v;
				}
			}
		}
		
		$this->data = $data;
	}

	/**
	 * @method		is_valid_ingredient
	 * @param 		array $ingredient
	 * @return 		boolean
	 * @description	A valid ingredient must have an ingredient_id
	 */
	private function is_valid_ingredient($ingredient)
	{
		if($ingredient['ingredient_id'] != '')
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
?>