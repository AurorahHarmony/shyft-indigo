<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import ContentCard from '@/views/components/content-card.vue';
import VerticalInput from '@/views/components/form/vertical-input.vue';
import LoaderButton from '@/views/components/form/loader-button.vue';

const form = useForm({
  username: null,
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
});

let loading = ref(false);

const submit = () => {
  form.post('/admin/users', {
    onStart: () => {
      loading.value = true;
    },
    onFinish: () => {
      loading.value = false;
    },
  });
};
</script>
<template layout>
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
      <ContentCard>
        <p class="h4">Create a new user</p>
        <form @submit.prevent="submit">
          <VerticalInput
            label="Username"
            v-model="form.username"
            :error="form.errors.username"
          />
          <VerticalInput
            label="Name"
            v-model="form.name"
            :error="form.errors.name"
          />
          <VerticalInput
            label="Email"
            type="email"
            v-model="form.email"
            :error="form.errors.email"
          />
          <VerticalInput
            label="Password"
            type="password"
            v-model="form.password"
            :error="form.errors.password"
          />
          <VerticalInput
            class="mb-3"
            label="Confirm password"
            type="password"
            v-model="form.password_confirmation"
            :error="form.errors.password_confirmation"
          />

          <div class="d-flex justify-content-between">
            <Link href="/admin/users" class="btn btn-outline-danger me-2">
              Cancel
            </Link>
            <LoaderButton :loading="loading">Create user</LoaderButton>
          </div>
        </form>
      </ContentCard>
    </div>
  </div>
</template>
