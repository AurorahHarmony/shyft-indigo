<script setup>
import '../../../sass/backgrounds.scss';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref, computed } from 'vue';

const form = useForm({
  username: null,
  password: null,
});

let loading = ref(false);
let hasError = computed(() => {
  return (
    form.errors.username !== undefined || form.errors.password !== undefined
  );
});

const submit = () => {
  form.post('/login', {
    onStart: () => {
      loading.value = true;
    },
    onFinish: () => {
      loading.value = false;
    },
  });
};
</script>
<template layout="no-wrapper">
  <div class="content bg-cogs">
    <div class="form-signin bg-white rounded shadow">
      <form class="text-center" @submit.prevent="submit">
        <img class="mb-2" src="/image/shyft-blue.png" alt="" height="57" />
        <div
          class="text-danger"
          v-if="form.errors.username || form.errors.password"
        >
          {{ form.errors.username || form.errors.password }}
        </div>
        <input
          type="text"
          class="form-control"
          :class="{ 'is-invalid': hasError }"
          placeholder="Username"
          autofocus
          autocapitalize="none"
          v-model="form.username"
        />

        <input
          type="password"
          class="form-control"
          :class="{ 'is-invalid': hasError }"
          placeholder="Password"
          autocapitalize="none"
          v-model="form.password"
        />
        <button class="w-100 btn btn-lg btn-primary" :disabled="loading">
          <span v-if="loading">
            <span
              class="spinner-border spinner-border-sm"
              role="status"
              aria-hidden="true"
            ></span>
            Loading
          </span>
          <span v-else>Sign in</span>
        </button>
      </form>
    </div>
  </div>
</template>

<style scoped>
.content {
  height: 100vh;
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
}
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type='text'] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type='password'] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
