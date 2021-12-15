<script setup>
import { Inertia } from '@inertiajs/inertia';
import { reactive } from 'vue'

const form = reactive({
  name: '',
  email: '',
  password: '',
})

const submit = () => {
  Inertia.post('/users', form)
}
</script>

<template>
<Head title="Create User" />

<h1 class="text-3xl">
  Create New User
</h1>

<form
  class="max-w-md mx-auto mt-8"
  @submit.prevent="submit"
>
  <div class="mb-6">
    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>

    <input
      id="name" v-model="form.name"
      type="text"
      name="name" required
      class="border border-gray-400 p-2 w-full"
    >
  </div>

  <div class="mb-6">
    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>

    <input
      id="email"
      v-model="form.email" type="email"
      name="email" required
      class="border border-gray-400 p-2 w-full"
    >
  </div>

  <div class="mb-6">
    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>

    <input
      id="password"
      v-model="form.password" type="password"
      name="password" required
      class="border border-gray-400 p-2 w-full"
    >
  </div>

  <div class="mb-6">
    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
      Submit
    </button>
  </div>
</form>
</template>
