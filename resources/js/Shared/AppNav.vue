<script setup>
import AppNavLink from './AppNavLink.vue';
</script>

<template>
  <nav class="mt-6">
    <ul class="list-disc">
      <li>
        <AppNavLink href="/" :active="$page.component === 'Home'">
          Home
        </AppNavLink>
      </li>
      <li>
        <AppNavLink href="/users" :active="$page.component === 'Users'">
          Users
        </AppNavLink>
      </li>
      <li>
        <AppNavLink href="/settings" :active="$page.component === 'Settings'">
          Settings
        </AppNavLink>
      </li>
    </ul>
  </nav>
</template>
g
