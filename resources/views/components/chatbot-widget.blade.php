<button class="chatbot-toggle" aria-label="Ouvrir l'assistant" aria-controls="chatbot-panel" aria-expanded="false">
    <div class="chatbot-toggle-lottie" id="chatbot-lottie"></div>
</button>

<div id="chatbot-panel" class="chatbot-panel" role="dialog" aria-modal="true" aria-label="Assistant Atelier Normand du Web" aria-hidden="true">
    <div class="chatbot-header">
        <b>Assistant Atelier Normand du Web</b>
        <button type="button" class="chatbot-close" aria-label="Fermer l'assistant">&times;</button>
    </div>

    <div class="chatbot-messages" id="chatbot-messages">
        <div class="chatbot-msg chatbot-msg--assistant">
            Bonjour ! Posez-moi vos questions sur les services, les tarifs, ou décrivez votre projet.
        </div>
    </div>

    <form class="chatbot-form" id="chatbot-form">
        <input type="text" id="chatbot-input" placeholder="Écrivez votre message..." required maxlength="1000" autocomplete="off">
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>