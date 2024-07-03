<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";

import { useForm } from '@inertiajs/vue3'
defineProps({
    question:Array
});
const form = useForm({
  excel: null,
})

function submit() {
  form.post('/question')
}


</script>

<template>
  <AppLayout title="Import File">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Import File
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <form @submit.prevent="submit">
            <input type="file" @input="form.excel = $event.target.files[0]" />
            <progress
              v-if="form.progress"
              :value="form.progress.percentage"
              max="100"
            >
              {{ form.progress.percentage }}%
            </progress>
            <button type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
