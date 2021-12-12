<script setup>
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
  links: {
    type: Array,
    default: () => []
  },
})
</script>

<template>
<div>
  <Component
    :is="link.url ? Link : 'span'"
    v-for="link in links" :key="link.label"
    :href="link.url"
    class="px-1"
    :class="{ 'text-gray-500': !link.url, 'font-bold': link.active }"
    v-html="link.label"
  />
</div>
</template>
