<?php

namespace App\Livewire;

use Livewire\Component;

class HotelSearch extends Component
{
    public $search = '';

    public function searchHotels()
    {
        $this->dispatch('hotelSearchUpdated', $this->search);
    }

    public function render()
    {
        return view('livewire.hotel-search');
    }
}
