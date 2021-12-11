<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
    <nav>
        <ul>
            <li><Link href="/">Home</Link></li>
            <li><Link href="/users">Users</Link></li>
            <li><Link href="/settings">Settings</Link></li>
            <li><Link href="/logout" method="post" as="button">Log Out</Link></li>
        </ul>
    </nav>
</template>
