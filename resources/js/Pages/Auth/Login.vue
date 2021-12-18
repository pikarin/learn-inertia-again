<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  email: '',
  password: '',
})

const submit = () => {
  form.post('/login')
}
</script>

<script>
export default {
  layout: null,
}
</script>


<template>
<Head title="Login Page" />

<main class="grid place-items-center min-h-screen">
  <section class="bg-white p-8 rounded-xl max-w-md mx-auto mt-8 border">
    <h1 class="text-3xl mb-6">
      Login
    </h1>

    <form @submit.prevent="submit">
      <div class="mb-6">
        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>

        <input
          id="email"
          v-model="form.email"
          type="email"
          name="email"
          class="border p-2 w-full rounded"
        >

        <p v-if="form.errors.email" class="text-red-500 text-xs mt-1" v-text="form.errors.email" />
      </div>

      <div class="mb-6">
        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>

        <input
          id="password"
          v-model="form.password"
          type="password"
          name="password"
          class="border p-2 w-full rounded"
        >

        <p v-if="form.errors.password" class="text-red-500 text-xs mt-1" v-text="form.errors.password" />
      </div>

      <div class="mb-6">
        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 disabled:bg-blue-400/70" :disabled="form.processing">
          Login
        </button>
      </div>
    </form>
  </section>
</main>
</template>
