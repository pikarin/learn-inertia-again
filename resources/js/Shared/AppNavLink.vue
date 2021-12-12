<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
  active: {
    type: Boolean,
    default: false
  },
})
</script>

<template>
<Link
  class="text-blue-500 hover:underline"
  :class="{ 'font-bold underline': props.active }"
>
  <slot />
</Link>
</template>
