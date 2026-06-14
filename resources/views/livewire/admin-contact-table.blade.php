<div>
    <div class="table-responsive">
        <table class="table table-striped" id="contact-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->name }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ Str::limit($m->message, 60) }}</td>
                    <td>{{ $statusLabels[$m->estatus] ?? $m->estatus }}</td>
                    <td nowrap>
                        <button class="btn btn-info btn-sm" wire:click="reply({{ $m->id }})" title="Responder">
                            <i class="fas fa-reply"></i>
                        </button>
                    </td>
                </tr>
                @if($replyingTo === $m->id)
                <tr>
                    <td colspan="6">
                        <form wire:submit="sendReply" class="d-flex gap-2">
                            <textarea wire:model="replyMessage" class="form-control" rows="2" placeholder="Escribir respuesta..."></textarea>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i></button>
                            <button type="button" wire:click="cancelReply" class="btn btn-secondary btn-sm"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
                @endif
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay mensajes</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $messages->links() }}
        </div>
    </div>
</div>
