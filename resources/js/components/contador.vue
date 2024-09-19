<template>
    <div>
        <h2>Mis Suscripciones</h2>
        <ul>
            <li v-for="subscription in subscriptions" :key="subscription.id">
                Plan: {{ subscription.type }} | Desde: {{ subscription.start_date }} | Hasta: {{ subscription.end_date }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            subscriptions: []
        };
    },
    async mounted() {
        try {
            const response = await axios.get('http://127.0.0.1:8000/subscriptions');
            this.subscriptions = response.data;
        } catch (error) {
            console.error('Error fetching subscriptions:', error);
        }
    }
}
</script>
