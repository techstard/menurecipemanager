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
			/*
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