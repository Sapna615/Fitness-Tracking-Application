<!-- Chatbot UI -->
<div id="fitness-chatbot" class="chatbot-container">
    <!-- Chat Toggle Button -->
    <button id="chat-toggle" class="chat-toggle-btn shadow-lg border-0 rounded-circle bg-primary text-white p-0">
        <i class="fas fa-robot fs-3"></i>
        <span class="badge bg-danger rounded-circle position-absolute top-0 end-0 p-2 border border-white">
            <span class="visually-hidden">New messages</span>
        </span>
    </button>

    <!-- Chat Window -->
    <div id="chat-window" class="chat-window d-none shadow-xl border-0 rounded-4 overflow-hidden bg-white">
        <!-- Header -->
        <div class="chat-header bg-dark text-white p-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="bg-primary rounded-circle p-2 me-2">
                    <i class="fas fa-robot text-white"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">Fitness AI</h6>
                    <small class="opacity-75">Online & Ready to Help</small>
                </div>
            </div>
            <button id="close-chat" class="btn btn-sm text-white opacity-75 hover-opacity-100">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="chat-messages" class="chat-messages p-3 bg-light">
            <div class="message ai-message mb-3">
                <div class="message-content p-2 px-3 rounded-4 shadow-sm bg-white text-dark small">
                    Hello! I'm your Fitness Assistant. How can I help you with your health goals today?
                </div>
            </div>
        </div>

        <!-- Typing Indicator -->
        <div id="typing-indicator" class="typing-indicator d-none px-3 py-2 bg-light">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>

        <!-- Input Area -->
        <div class="chat-input p-3 border-top bg-white">
            <div class="input-group">
                <input type="text" id="user-input" class="form-control border-0 bg-light rounded-pill px-3 py-2 small" placeholder="Ask about weight loss, abs..." autocomplete="off">
                <button id="send-btn" class="btn btn-primary rounded-pill ms-2 px-3">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .chatbot-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999;
    }

    .chat-toggle-btn {
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .chat-toggle-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important;
    }

    .chat-window {
        position: absolute;
        bottom: 85px;
        right: 0;
        width: 350px;
        height: 480px;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        transform-origin: bottom right;
    }

    .chat-messages {
        flex-grow: 1;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        scrollbar-width: thin;
        scrollbar-color: rgba(0,0,0,0.1) transparent;
    }

    .message-content {
        max-width: 85%;
        word-wrap: break-word;
        line-height: 1.4;
    }

    .user-message {
        align-self: flex-end;
    }

    .user-message .message-content {
        background-color: #667eea !important;
        color: white !important;
    }

    .ai-message {
        align-self: flex-start;
    }

    .typing-indicator {
        display: flex;
        gap: 4px;
        align-items: center;
    }

    .typing-indicator .dot {
        width: 6px;
        height: 6px;
        background: #bbb;
        border-radius: 50%;
        animation: typing 1.4s infinite;
    }

    .typing-indicator .dot:nth-child(2) { animation-delay: 0.2s; }
    .typing-indicator .dot:nth-child(3) { animation-delay: 0.4s; }

    @keyframes typing {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .shadow-xl {
        box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
    }

    .hover-opacity-100:hover {
        opacity: 1 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('chat-toggle');
        const chatWindow = document.getElementById('chat-window');
        const closeBtn = document.getElementById('close-chat');
        const sendBtn = document.getElementById('send-btn');
        const userInput = document.getElementById('user-input');
        const messagesArea = document.getElementById('chat-messages');
        const typingIndicator = document.getElementById('typing-indicator');

        // Toggle Chat Window
        toggleBtn.addEventListener('click', () => {
            chatWindow.classList.toggle('d-none');
            if (!chatWindow.classList.contains('d-none')) {
                userInput.focus();
                toggleBtn.querySelector('.badge').classList.add('d-none');
            }
        });

        closeBtn.addEventListener('click', () => {
            chatWindow.classList.add('d-none');
        });

        // Send Message
        const sendMessage = async () => {
            const text = userInput.value.trim();
            if (!text) return;

            // Add user message
            addMessage(text, 'user');
            userInput.value = '';

            // Show typing indicator
            typingIndicator.classList.remove('d-none');
            messagesArea.scrollTop = messagesArea.scrollHeight;

            try {
                const response = await fetch('{{ route('chat.send') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: text })
                });

                const data = await response.json();
                
                // Hide typing indicator and add AI response
                setTimeout(() => {
                    typingIndicator.classList.add('d-none');
                    addMessage(data.response, 'ai');
                }, 800); // Small delay for "realism"

            } catch (error) {
                typingIndicator.classList.add('d-none');
                addMessage("Sorry, I'm having trouble connecting right now. Please try again!", 'ai');
            }
        };

        const addMessage = (text, sender) => {
            const msgDiv = document.createElement('div');
            msgDiv.className = `message ${sender}-message mb-3`;
            msgDiv.innerHTML = `
                <div class="message-content p-2 px-3 rounded-4 shadow-sm ${sender === 'ai' ? 'bg-white text-dark' : 'bg-primary text-white'} small">
                    ${text}
                </div>
            `;
            messagesArea.appendChild(msgDiv);
            messagesArea.scrollTop = messagesArea.scrollHeight;
        };

        sendBtn.addEventListener('click', sendMessage);
        userInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
    });
</script>
