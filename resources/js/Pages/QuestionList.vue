<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";

import { useForm } from '@inertiajs/vue3'
defineProps({
    questions:Array
});

</script>

<template>
  <AppLayout title="Import File">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Question List
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">Savol</th>
            <th class="px-4 py-3">A</th>
            <th class="px-4 py-3">B</th>
            <th class="px-4 py-3">C</th>
            <th class="px-4 py-3">D</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr class="text-gray-700" v-for="question in questions" :key="question.id">
            <td class="px-4 py-3 border">
                {{ question.question }}
            </td>
            <td class="px-4 py-3 text-sm border" v-for="option in question.options" :key="option.id">{{ option.option }}</td>
          </tr>

        </tbody>
      </table>

        </div>
      </div>
    </div>
  </AppLayout>
</template>
