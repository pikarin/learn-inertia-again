<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import AppNav from '../Shared/AppNav'

const props = defineProps({
  time: {
    type: String,
    default: '',
  },
})
</script>

<template>
  <h1 class="text-4xl font-bold">
    Users
  </h1>

  <AppNav />

  <div class="mt-[800px]">
    <p>The current time is {{ props.time }}</p>

    <Link
      href="/users" class="text-blue-500 hover:underline"
      preserve-scroll
    >
      Refresh
    </Link>
  </div>
</template>
