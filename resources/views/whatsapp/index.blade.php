<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<style>
    /* Sidebar Styles */
    .chat-sidebar {
        height: calc(100vh - 50px);
        overflow-y: auto;
        border-right: 1px solid #ddd;
        background-color: #f8f9fa;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }

    .chat-sidebar .list-group-item {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        margin-bottom: 5px;
        border-radius: 8px;
        transition: background-color 0.2s ease, box-shadow 0.2s ease;
    }

    .chat-sidebar .list-group-item:hover {
        background-color: #e3f2fd;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .chat-sidebar .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 1rem;
        font-weight: bold;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
    }

    /* Add dynamic background colors for avatars */
    .chat-sidebar .avatar:nth-child(1) {
        background-color: #007bff;
    }

    .chat-sidebar .avatar:nth-child(2) {
        background-color: #6f42c1;
    }

    .chat-sidebar .avatar:nth-child(3) {
        background-color: #e83e8c;
    }

    .chat-sidebar h6 {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        color: #212529;
    }

    .chat-sidebar small {
        color: #6c757d;
    }

    /* Chat Area */
    .chat-message-box {
        height: calc(100vh - 150px);
        overflow-y: auto;
        scroll-behavior: smooth;
        padding: 16px;
        background-color: #ffffff;
    }

    .chat-bubble {
        max-width: 70%;
        padding: 10px 14px;
        border-radius: 15px;
        margin-bottom: 10px;
        line-height: 1.5;
        font-size: 0.95rem;
        word-wrap: break-word;
    }

    .chat-bubble-sent {
        background-color: #007bff;
        color: #fff;
        align-self: flex-end;
    }

    .chat-bubble-received {
        background-color: #f1f1f1;
        color: #212529;
        align-self: flex-start;
    }

    .chat-bubble .small {
        font-size: 0.8rem;
        margin-top: 8px;
        display: block;
    }

    .chat-bubble-sent .small {
        color: #cce5ff;
    }

    .chat-bubble-received .small {
        color: #6c757d;
    }

    /* Typing Indicator */
    .typing-indicator {
        font-size: 0.9rem;
        color: #6c757d;
        font-style: italic;
    }

    /* Chat Input */
    .chat-input {
        height: 50px;
        resize: none;
        border-radius: 8px;
    }

    .input-group .btn {
        border-radius: 8px;
    }

    /* Chat Header */
    .chat-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .chat-header img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
    }

    .chat-header h6 {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
    }

    .chat-header small {
        color: #6c757d;
    }

    .chat-header button {
        border-radius: 50%;
        padding: 6px 10px;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .chat-sidebar {
            height: auto;
        }

        .chat-message-box {
            height: calc(100vh - 200px);
        }

        .chat-bubble {
            max-width: 100%;
        }
    }
</style>


<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-12 col-md-4 col-lg-3 chat-sidebar bg-light">
            <div class="p-3">
                <input type="text" class="form-control mb-3" placeholder="Search...">
                <div class="list-group">
                    <!-- Static user list -->
                    <a href="#" class="list-group-item">
                        <div class="avatar">WJ</div> <!-- Initials in circle -->
                        <div>
                            <h6 class="mb-0">William Johnson</h6>
                            <small class="text-muted">What about the second plan</small>
                        </div>
                        <span class="ms-auto small text-muted">10:15 AM</span>
                    </a>
                    <a href="#" class="list-group-item">
                        <div class="avatar">JS</div> <!-- Initials in circle -->
                        <div>
                            <h6 class="mb-0">John Smith</h6>
                            <small class="text-muted">There's a bug you need to...</small>
                        </div>
                        <span class="ms-auto small text-muted">Yesterday</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="col-12 col-md-8 col-lg-9 d-flex flex-column">
            <!-- Header -->
            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                    <div>
                        <h6 class="mb-0">Stevens</h6>
                        <small class="text-muted">Online</small>
                    </div>
                </div>
                <div>
                    <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-telephone"></i></button>
                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-envelope"></i></button>
                </div>
            </div>
            <!-- Messages -->
            <div class="flex-grow-1 p-3 d-flex flex-column chat-message-box">
                <!-- Static message list -->
                <div class="chat-bubble chat-bubble-received">
                    Hey, there! It's been a while!
                    <div class="small text-muted mt-1">10:10 AM</div>
                </div>
                <div class="chat-bubble chat-bubble-received mt-3">
                    Wanted to know if you wanted to get lunch sometime this week?
                    <div class="small text-muted mt-1">10:11 AM</div>
                </div>
                <div class="chat-bubble chat-bubble-sent align-self-end mt-3">
                    Sure, let's do it!
                    <div class="small text-white-50 mt-1">10:15 AM</div>
                </div>
                <div class="typing-indicator mt-3">Stevens is typing...</div>
            </div>
            <!-- Input -->
            <div class="p-3 border-top">
                <div class="input-group">
                    <textarea class="form-control chat-input" placeholder="Type a message"></textarea>
                    <button class="btn btn-primary"><i class="bi bi-send"></i> Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto-scroll to the latest message
        const chatBox = document.querySelector('.chat-message-box');
        chatBox.scrollTop = chatBox.scrollHeight;
</script>