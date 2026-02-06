<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskManager extends Component
{
    public $tasks;
    public $title;

    public function mount()
    {
        $this->tasks = Task::all();
      
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255|min:3',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'title.min' => 'The title must be at least 3 characters.',
        ];
    }

    public function save()
    {
      $validated = $this->validate();

        $validated['title'] = htmlspecialchars(strip_tags(trim($validated['title'])));

        Task::create([
            'title' => $validated['title']
        ]);
        $this->tasks = Task::all();  
        $this->title = ''; 
        session()->flash('message', 'Task created successfully!');  
    }
   

    public function deleteTask($id)
    {
      Task::find($id)->delete();  
        $this->tasks = Task::all();  
        session()->flash('message', 'Task deleted successfully!');
    }
    public function render()
    {
        return view('livewire.task-manager');
    }
}
