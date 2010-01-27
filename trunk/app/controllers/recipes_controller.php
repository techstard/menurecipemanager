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
	        $recipe = $this->Recipe->read();
			
			foreach($recipe['IngredientList'] as &$ingredient)
			{
				$t = $this->Recipe->IngredientList->Ingredient->read('ingredient', $ingredient['ingredient_id']);	
				$ingredient['Ingredient'] = $t['Ingredient'];
				
				$t = $this->Recipe->IngredientList->Measurement->read('measurement', $ingredient['measurement_id']);
				$ingredient['Measurement'] = $t['Measurement'];

				$t = $this->Recipe->IngredientList->Fraction->read('fraction', $ingredient['fraction_id']);
				$ingredient['Fraction'] = $t['Fraction'];
				
			}
			
	        $this->set('recipe', $recipe);
	    }		
	}
	
	public function add()
	{
		if (!empty($this->data)) 
		{
			$this->clean_data();
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
			$this->clean_data();
			// TODO this is kind of a hack. I could not get the saveAll method to update the IngredientList
			// it kept inserting new records.
			$this->Recipe->IngredientList->deleteAll('WHERE recipe_id = ' . $id);
			if ($this->Recipe->saveAll($this->data))
	        {
				$this->Session->setFlash('Your recipe has been updated.');
		           $this->redirect(array('action'=>'index'));
	        }
	    }
		
		$this->set('recipeTypes', $this->Recipe->RecipeType->find('list'));
		$this->set('ingredients', $this->Recipe->IngredientList->Ingredient->find('list'));
		$this->set('measurements', $this->Recipe->IngredientList->Measurement->find('list'));
		$this->set('fractions', $this->Recipe->IngredientList->Fraction->find('list'));
	}
	
    public function delete($id)
	{
		$this->Recipe->delete($id, $cascade = true);
	    $this->Session->setFlash('The recipe with id: '.$id.' has been deleted.');
	    $this->redirect(array('action'=>'index'));
	}
	
	/**
	 * @method	clean_data
	 * @return 	void
	 * @description	Loops through the ingredients and do various clean up tasks.
	 */
	private function clean_data()
	{
		$data = array();
		
		foreach($this->data['IngredientList'] as $k => $ingredient)
		{
			if($this->is_valid_ingredient($ingredient))
			{
				$data[] = $ingredient;
			}
		}
		
		$this->data['IngredientList'] = $data;
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