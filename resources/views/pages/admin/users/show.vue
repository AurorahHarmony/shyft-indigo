<script setup>
import ContentCard from '../../../components/content-card.vue';
import HorizontalInput from '@/views/components/form/horizontal-input.vue';
import VerticalInput from '@/views/components/form/vertical-input.vue';
import LoaderButton from '@/views/components/form/loader-button.vue';

import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
  user: Object,
});

const passwordForm = useForm({
  password: null,
  newpassword: null,
  newpassword_confirmation: null,
});

let editingPassword = ref(false);
let editingPasswordLoading = ref(false);

const cancelEditPassword = () => {
  passwordForm.reset();
  editingPassword.value = false;
};

const patchPassword = () => {
  passwordForm.patch(`/admin/users/${props.user.id}`, {
    onStart: () => {
      editingPasswordLoading.value = true;
    },
    onFinish: () => {
      editingPasswordLoading.value = false;
    },
    onSuccess: () => {
      editingPassword.value = false;
    },
  });
};
</script>
<template layout>
  <div>
    <Link href="/admin/users" class="btn btn-primary mb-2">&lt; All users</Link>
    <div class="row">
      <div class="col-md-6 mb-2">
        <ContentCard class="p-3">
          <p class="h4">Person's name</p>
          <HorizontalInput label="Name" v-model="user.name" :disabled="true" />
          <HorizontalInput
            label="Username"
            v-model="user.username"
            :disabled="true"
          />
          <HorizontalInput
            label="Email"
            type="email"
            v-model="user.email"
            :disabled="true"
          />
          <hr />
          <HorizontalInput
            label="Password"
            type="password"
            modelValue="********"
            :disabled="true"
            :canEdit="true"
            v-if="editingPassword == false"
            @enableEdit="editingPassword = true"
          />
          <form v-if="editingPassword" @submit.prevent="patchPassword">
            <VerticalInput
              label="Old Password"
              type="password"
              v-model="passwordForm.password"
              :error="passwordForm.errors.password"
            />
            <VerticalInput
              label="New Password"
              type="password"
              v-model="passwordForm.newpassword"
              :error="passwordForm.errors.newpassword"
            />
            <VerticalInput
              label="Confirm password"
              type="password"
              v-model="passwordForm.newpassword_confirmation"
              :error="passwordForm.errors.newpassword_confirmation"
            />
            <div class="text-end">
              <button class="btn btn-light me-2" @click="cancelEditPassword">
                Cancel
              </button>
              <LoaderButton :loading="editingPasswordLoading">
                Save
              </LoaderButton>
            </div>
          </form>
        </ContentCard>
      </div>
      <div class="col-md-6">
        <ContentCard>
          <p class="h4">Login History</p>
          <table class="table mb-0">
            <thead>
              <tr>
                <th scope="col">Device</th>
                <th scope="col">Location</th>
                <th scope="col" class="text-end">Time</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="index in 5" :key="index">
                <td>Windows PC</td>
                <td>192.168.1.1</td>
                <td class="text-muted text-end">12:45pm, 5 December 2022</td>
              </tr>
            </tbody>
          </table>
        </ContentCard>
      </div>
    </div>
  </div>
</template>
