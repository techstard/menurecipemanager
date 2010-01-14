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
			if ($this->Recipe->save($this->data)) 
			{
				$this->Session->setFlash('Your recipe has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}

		$fractions = array('' => '', '.0625' => '1/16', '.125' => '1/8', '.25' => '1/4', '.5' => '1/2', '.75' => '3/4', '.33' => '1/3', '.66' => '2/3');

		$this->set('fractions', $fractions);
		$this->set('recipeTypes', $this->Recipe->RecipeType->find('list'));
		$this->set('ingredients', $this->Recipe->Ingredient->find('list'));
		$this->set('measurements', $this->Recipe->Measurement->find('list'));
	}
	
    function edit($id = null)
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
	
    function delete($id)
	{
	    $this->Recipe->delete($id);
	    $this->Session->setFlash('The recipe with id: '.$id.' has been deleted.');
	    $this->redirect(array('action'=>'index'));
	}



}
?>