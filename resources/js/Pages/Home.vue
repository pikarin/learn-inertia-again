<script setup>
const props = defineProps({
    name: String,
})
</script>

<template>
    <h1>Hello, {{ props.name  }}</h1>
</template>
