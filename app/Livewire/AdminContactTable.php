<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ContactMessage;
use App\Models\ContactReply;

class AdminContactTable extends Component
{
    use WithPagination;

    public $replyingTo = null;
    public $replyMessage = '';

    protected $rules = [
        'replyMessage' => 'required|string',
    ];

    public function reply($id)
    {
        $this->replyingTo = $id;
        $this->replyMessage = '';
    }

    public function sendReply()
    {
        $this->validate();

        $contact = ContactMessage::findOrFail($this->replyingTo);
        ContactReply::create(['message' => $this->replyingTo, 'content' => $this->replyMessage]);
        $contact->update(['estatus' => 3]);

        $this->replyingTo = null;
        $this->replyMessage = '';
        $this->dispatch('reply-sent');
    }

    public function cancelReply()
    {
        $this->replyingTo = null;
        $this->replyMessage = '';
    }

    public function archive($id)
    {
        ContactMessage::findOrFail($id)->update(['estatus' => 4]);
    }

    public function render()
    {
        $statusLabels = ['Nuevo', 'Leído', 'Respondido', 'Archivado', 'Eliminado'];

        $messages = ContactMessage::with('replies')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.admin-contact-table', compact('messages', 'statusLabels'));
    }
}
