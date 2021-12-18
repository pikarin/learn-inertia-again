<script setup>
import AppNavLink from './AppNavLink.vue'
</script>

<template>
<nav>
  <ul class="flex space-x-6">
    <li>
      <AppNavLink href="/" :active="$page.component === 'Home'">
        Home
      </AppNavLink>
    </li>
    <li>
      <AppNavLink href="/users" :active="$page.component.startsWith('Users')">
        Users
      </AppNavLink>
    </li>
    <li>
      <AppNavLink href="/settings" :active="$page.component === 'Settings'">
        Settings
      </AppNavLink>
    </li>
    <li>
      <AppNavLink href="/logout" method="POST">
        Logout
      </AppNavLink>
    </li>
  </ul>
</nav>
</template>
