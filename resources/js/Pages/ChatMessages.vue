<template>
    <div>
        <div v-for="(chat, index) in chats" :key="index">
            <div v-if="chat.typ === 'question'" class="p-2 text-cyan-500"><strong>Du fragst: </strong><br>{{ chat.msg }}</div>
            <div v-if="chat.typ === 'answere'" class="p-2 text-amber-400"><strong>Antwort: </strong><br>{{ chat.msg }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        chats: Array, // Von der übergeordneten Komponente erhalten
    },
};
</script>
