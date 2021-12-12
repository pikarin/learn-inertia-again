<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
import AppNav from './AppNav.vue';

const username = computed(() => usePage().props.value.auth.user.username);

</script>

<template>
<section class="p-6 bg-gray-200">
  <header class="flex justify-between">
    <div class="flex items-center">
      <h1 class="font-bold text-lg">
        My App
      </h1>

      <p class="ml-4">
        Welcome Back, {{ username }}!
      </p>
    </div>

    <AppNav />
  </header>
</section>

<section class="p-6">
  <div class="max-w-3xl mx-auto">
    <slot />
  </div>
</section>
</template>
