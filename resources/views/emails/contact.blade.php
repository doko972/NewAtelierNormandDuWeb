<p>Nouveau message reçu depuis le site :</p>

<p>
    <strong>Nom :</strong> {{ $contactMessage->name }}<br>
    <strong>Email :</strong> {{ $contactMessage->email }}<br>
    @if ($contactMessage->subject)
    <strong>Sujet :</strong> {{ $contactMessage->subject }}<br>
    @endif
    <strong>IP :</strong> {{ $contactMessage->ip }}
</p>

<p><strong>Message :</strong></p>
<p>{{ $contactMessage->message }}</p>