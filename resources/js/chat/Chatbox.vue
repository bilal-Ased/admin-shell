<!-- resources/js/components/Chatbox.vue -->
<template>
    <div>
        <div v-for="(msg, index) in messages" :key="index">
            <strong>{{ msg.user }}:</strong> {{ msg.message }}
        </div>
        <input
            v-model="newMessage"
            @keyup.enter="sendMessage"
            placeholder="Type your message"
        />
    </div>
</template>

<script>
export default {
    data() {
        return {
            messages: [],
            newMessage: "",
        };
    },
    mounted() {
        Echo.channel("chat").listen("ChatMessage", (event) => {
            this.messages.push(event);
        });
    },
    methods: {
        sendMessage() {
            axios
                .post("/send-message", { message: this.newMessage })
                .then(() => {
                    this.newMessage = ""; // Clear the input after sending
                })
                .catch((error) => {
                    console.error("Error sending message:", error);
                });
        },
    },
};
</script>
