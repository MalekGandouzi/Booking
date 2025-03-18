<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;

class BookingManager extends Component
{
    public $hotelId;
    public $property_id;
    public $start_date;
    public $end_date;
    public $showForm = false;
    public $selectedHotel = null;
    public $properties = [];
    public $search = '';

    protected $listeners = ['hotelSearchUpdated' => 'updateHotelList'];

    public function updateHotelList($search = '')
    {
        $this->search = $search;
        $this->properties = Property::where('name', 'like', '%' . $this->search . '%')->get();
    }

    public function mount()
    {
        $this->updateHotelList();
    }

    protected $rules = [
        'property_id' => 'required|exists:properties,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ];

    public function showBookingForm($hotelId)
    {
        $this->property_id = $hotelId;
        $this->selectedHotel = Property::find($hotelId);
        $this->showForm = true;
    }

    public function bookProperty()
    {
        $this->validate();

        Book::create([
            'user_id' => Auth::id(),
            'property_id' => $this->property_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Réservation effectuée avec succès !');

        $this->reset(['start_date', 'end_date', 'showForm', 'selectedHotel']);
    }

    public function closeBookingForm()
    {
        $this->showForm = false;
        $this->selectedHotel = null;
    }

    public function render()
    {
        return view('livewire.booking-manager', [
            'properties' => $this->properties
        ]);
    }
}
