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

    protected $rules = [
        'property_id' => 'required|exists:properties,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ];


    public function showBookingForm($hotelId)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion
        }

        $this->property_id = $hotelId;
        $this->showForm = true;
    }

    public function bookProperty()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige si l'utilisateur essaie de tricher
        }

        $this->validate();

        Book::create([
            'user_id' => Auth::id(),
            'property_id' => $this->property_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Réservation effectuée avec succès !');

        $this->reset(['start_date', 'end_date', 'showForm']);
    }

  public function render()
{
    return view('livewire.booking-manager', [
        'properties' => Property::all(), // Passer la liste des propriétés à la vue
    ]);
}
}
