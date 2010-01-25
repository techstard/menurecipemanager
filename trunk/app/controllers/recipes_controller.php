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
		var_dump($this->data);
	
		if (!empty($this->data)) 
		{
			
			$ingredient_list = $this->reformat_ingredient_list($this->data);
			var_dump($ingredient_list);
			/* TEMPORARILY COMMENTED OUT TO PREVENT SAVING OF DATA
			if ($this->Recipe->save($this->data)) 
			{
				$this->Session->setFlash('Your recipe has been saved.');
				$this->redirect(array('action' => 'index'));
			}
			*/
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
	    $this->Recipe->delete($id);
	    $this->Session->setFlash('The recipe with id: '.$id.' has been deleted.');
	    $this->redirect(array('action'=>'index'));
	}

	/**
	 * @method	reformat_ingredient_list
	 * @param	array $data
	 * @return 	array
	 * @description	Takes in a list of the following structure:
	 * 
		array
		  'Recipe' => 
		    array
		      'recipe' => string '' (length=0)
		      'recipe_type_id' => string '0000000006' (length=10)
		      'description' => string '' (length=0)
		  'IngredientList0' => 
		    array
		      'whole_amount' => string '5' (length=1)
		      'fraction_id' => string '' (length=0)
		      'measurement_id' => string '0000000014' (length=10)
		      'ingredient_id' => string '0000000053' (length=10)
		      'instruction' => string 'chopped' (length=7)
		  'IngredientList1' => 
		    array
		      'whole_amount' => string '' (length=0)
		      'fraction_id' => string '0000000004' (length=10)
		      'measurement_id' => string '0000000016' (length=10)
		      'ingredient_id' => string '0000000052' (length=10)
		      'instruction' => string 'bolied' (length=6)
		  'IngredientList2' => 
		    array
		      'whole_amount' => string '1' (length=1)
		      'fraction_id' => string '' (length=0)
		      'measurement_id' => string '0000000016' (length=10)
		      'ingredient_id' => string '0000000051' (length=10)
		      'instruction' => string 'sliced' (length=6)

	      
	     And returns this:
	     
	     array
			  0 => 
			    array
			      'whole_amount' => string '5' (length=1)
			      'fraction_id' => string '' (length=0)
			      'measurement_id' => string '0000000014' (length=10)
			      'ingredient_id' => string '0000000053' (length=10)
			      'instruction' => string 'chopped' (length=7)
			  1 => 
			    array
			      'whole_amount' => string '' (length=0)
			      'fraction_id' => string '0000000004' (length=10)
			      'measurement_id' => string '0000000016' (length=10)
			      'ingredient_id' => string '0000000052' (length=10)
			      'instruction' => string 'bolied' (length=6)
			  2 => 
			    array
			      'whole_amount' => string '1' (length=1)
			      'fraction_id' => string '' (length=0)
			      'measurement_id' => string '0000000016' (length=10)
			      'ingredient_id' => string '0000000051' (length=10)
			      'instruction' => string 'sliced' (length=6)
	 * 
	 */
	private function reformat_ingredient_list($data)
	{
		$ingredient_list = array();
		$key = 'IngredientList';
		foreach($data as $k => $v)
		{
			$row = str_split($k, strlen($key));
			if($row[0] == $key)
			{
				if($this->is_valid_ingredient($v))
				{
					$ingredient_list[] = $v;
				}
			}
		}
		return $ingredient_list;
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