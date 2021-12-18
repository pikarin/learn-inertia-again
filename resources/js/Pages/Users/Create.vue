<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
})

const submit = () => {
  form.post('/users')
}
</script>

<template>
<Head title="Create User" />

<h1 class="text-3xl">
  Create New User
</h1>

<form class="max-w-md mx-auto mt-8" @submit.prevent="submit">
  <div class="mb-6">
    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>

    <input
      id="name"
      v-model="form.name"
      type="text"
      name="name"
      class="border border-gray-400 p-2 w-full"
    >

    <p v-if="form.errors.name" class="text-red-500 text-xs mt-1" v-text="form.errors.name" />
  </div>

  <div class="mb-6">
    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>

    <input
      id="email"
      v-model="form.email"
      type="email"
      name="email"
      class="border border-gray-400 p-2 w-full"
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
      class="border border-gray-400 p-2 w-full"
    >

    <p v-if="form.errors.password" class="text-red-500 text-xs mt-1" v-text="form.errors.password" />
  </div>

  <div class="mb-6">
    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 disabled:bg-blue-400/70" :disabled="form.processing">
      Submit
    </button>
  </div>
</form>
</template>
