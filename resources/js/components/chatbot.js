import lottie from "lottie-web";

const SESSION_KEY = "chatbot_session_id";

document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.querySelector(".chatbot-toggle");
    const panel = document.getElementById("chatbot-panel");
    const closeBtn = document.querySelector(".chatbot-close");
    const form = document.getElementById("chatbot-form");
    const input = document.getElementById("chatbot-input");
    const messages = document.getElementById("chatbot-messages");
    const lottieContainer = document.getElementById("chatbot-lottie");

    if (!toggle || !panel || !form) return;

    // Animation Lottie sur le bouton flottant
    if (lottieContainer) {
        lottie.loadAnimation({
            container: lottieContainer,
            renderer: "svg",
            loop: true,
            autoplay: true,
            path: "/animations/chatbot.json",
        });
    }

    function togglePanel(forceOpen) {
        const isOpen = panel.classList.contains("is-open");
        const shouldOpen = forceOpen ?? !isOpen;

        panel.classList.toggle("is-open", shouldOpen);
        panel.setAttribute("aria-hidden", String(!shouldOpen));
        toggle.setAttribute("aria-expanded", shouldOpen);

        if (shouldOpen) {
            input.focus();
        }
    }

    toggle.addEventListener("click", () => togglePanel());
    closeBtn?.addEventListener("click", () => togglePanel(false));
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") togglePanel(false);
    });

    function appendMessage(role, content) {
        const div = document.createElement("div");
        div.className = `chatbot-msg chatbot-msg--${role}`;
        div.textContent = content;
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
        return div;
    }

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const text = input.value.trim();
        if (!text) return;

        appendMessage("user", text);
        input.value = "";
        input.disabled = true;

        const typing = appendMessage("typing", "L'assistant écrit...");

        try {
            const response = await fetch("/chatbot/message", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]',
                    )?.content,
                },
                body: JSON.stringify({
                    message: text,
                    session_id: localStorage.getItem(SESSION_KEY),
                }),
            });

            const data = await response.json();
            typing.remove();

            if (data.session_id) {
                localStorage.setItem(SESSION_KEY, data.session_id);
            }

            appendMessage(
                "assistant",
                data.reply || "Désolé, une erreur est survenue.",
            );
        } catch (error) {
            typing.remove();
            appendMessage(
                "assistant",
                "Désolé, je n'arrive pas à vous répondre pour le moment. Essayez le formulaire de contact.",
            );
        } finally {
            input.disabled = false;
            input.focus();
        }
    });
});
