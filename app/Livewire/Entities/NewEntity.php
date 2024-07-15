<?php

namespace App\Livewire\Entities;

use App\Helpers\CustomFunction;
use App\Models\Country;
use App\Models\Entity;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewEntity extends Component
{
    public $countries;

    public $name;
    public $entity_status = true;
    public $country;

    public function mount()
    {
        if(session('name') && strlen(session('name') > 0))
        {
            $this->name = session('name');
            session(['name' => '']);
        }
        if(session('entity_status'))
        {
            $this->entity_status = session('entity_status');
        }

        $this->countries = Country::orderBy('name', 'asc')->get();
    }

    public function storeEntity()
    {
        $this->validate([
            'name' => 'required|string|min:2',
            'country' => 'required|integer|min:1'
        ]);
        session(['name' => $this->name]);
        session(['entity_status' => $this->entity_status]);
        
        if(!CustomFunction::isUniqueEntityName($this->name))
        {
            session([
                'error_message' => 'You created an entity with the same name earlier.'
            ]);
            return $this->redirect(route('entities.index'), navigate:true);
        }
        if(!Country::find($this->country))
        {
            session([
                'error_message' => 'Invalid country selection.'
            ]);
            return $this->redirect(route('entities.index'), navigate:true);
        }

        try 
        {
            $slug = CustomFunction::generateEntitySlug($this->name);

            $entity = new Entity();

            $entity->name = $this->name;
            $entity->slug = $slug;
            $entity->is_active =  $this->entity_status ? 1 : 0;
            $entity->user_id = Auth::user()->id;
            $entity->country_id = $this->country;

            $entity->save();

            $manager = new Manager();

            $manager->entity_id = $entity->id;
            $manager->user_id = Auth::user()->id;
            $manager->is_manager = true;

            $manager->save();

            session(['name' => '']);
        }
        catch(\Exception $e)
        {
            session([
                'error_message' => 'ERROR: '.$e->getMessage()
            ]);
            return $this->redirect(route('entities.index'), navigate:true);
        }
        
        session([
            'success_message' => 'Entity created successfully.'
        ]);
        return $this->redirect(route('entities.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.entities.new-entity');
    }
}
