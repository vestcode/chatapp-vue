<!-- resources/js/Pages/ChatInput.vue -->
<template>
    <div >
        <input v-model="message" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"  type="text" />
        <button @click="emitSendMessage" class="my-2 inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" >Send</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: '',
        };
    },
    methods: {
        emitSendMessage() {
            this.$emit('sendMessage', this.message);
            this.message = '';
        },
    },
};
</script>
