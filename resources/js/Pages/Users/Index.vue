<script setup>
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'
import { ref, watch } from 'vue'
import AppPagination from '../../Shared/AppPagination.vue'

const props = defineProps({
  users: {
    type: Object,
    default: () => ({}),
  },
  filters: {
    type: Object,
    default: () => ({}),
  },
})

const search = ref(props.filters.search)

watch(search, value => {
  Inertia.get('/users', { search: value }, {
    preserveState: true,
    replace: true,
  })
})
</script>

<template>
<Head title="Users" />

<div class="flex justify-between">
  <div class="flex items-center">
    <h1 class="text-4xl font-bold">
      Users
    </h1>

    <Link href="/users/create" class="ml-2 text-blue-500 text-sm">
      New User
    </Link>
  </div>

  <input
    v-model="search" type="text"
    placeholder="Search..." class="border px-2 rounded-lg"
  >
</div>

<div class="mt-10 flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="user in users.data" :key="user.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="text-sm font-medium text-gray-900" v-text="user.name" />
                </div>
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                  Edit
                </Link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<AppPagination :links="users.links" class="mt-6" />
</template>
