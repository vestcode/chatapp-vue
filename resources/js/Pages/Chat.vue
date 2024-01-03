<script>
import ChatLayout from '@/Layouts/ChatLayout.vue';

import ChatInput from './ChatInput.vue';
import ChatMessages from './ChatMessages.vue';
import {Head} from "@inertiajs/vue3";

export default {
    components: {
        Head, ChatLayout,
        ChatInput,
        ChatMessages,
    },
    data() {
        return {
            chats: [],
        };
    },
    mounted() {
        this.fetchChats();
    },

    methods: {
        async fetchChats() {
            try {
                const response = await axios.get('/api/chats'); // Ersetzen Sie dies durch die tatsächliche API-Route

                this.chats = response.data;
            } catch (error) {
                console.error('Fehler beim Abrufen der Chats:', error);
            }
        },
        async sendMessage(message) {
            try {
                const response = await axios.post('/api/chat', {
                    message: message
                });
                this.chats = response.data;

                window.scrollTo(0, document.body.scrollHeight);

            } catch (error) {
                console.error('Fehler beim Senden der Nachricht:', error);
            }
        },
    },
};
</script>


<template>
    <Head title="Dashboard" />

    <ChatLayout>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <chat-messages :chats="chats" />

                    </div>
                </div>
            </div>
        </div>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <chat-input @sendMessage="sendMessage" />

                    </div>
                </div>
            </div>
        </div>
    </ChatLayout>
</template>

