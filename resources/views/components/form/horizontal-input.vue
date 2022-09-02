<script setup>
const props = defineProps({
  canEdit: { type: Boolean, default: false },
  type: { type: String, default: 'text' },
  disabled: { type: Boolean, default: false },
  label: String,
  modelValue: String,
  error: { type: Boolean, default: false },
});

const emit = defineEmits(['update:modelValue']);

const handleInput = (e) => {
  emit('update:modelValue', e.target.value);
};
</script>
<template>
  <div class="row mb-2">
    <label :for="id" class="col-sm-3 col-form-label">
      {{ label }}
    </label>
    <div class="col-sm-8">
      <input
        :type="type"
        class="form-control"
        :class="{ 'is-invalid': error }"
        :id="id"
        :disabled="disabled == 1"
        :value="modelValue"
        @input="handleInput"
      />
      <div class="invalid-feedback" v-if="error">{{ error }}</div>
    </div>
    <div class="col-1 d-flex align-items-center">
      <a href="#" class="text-decoration-none" v-if="canEdit">Edit</a>
    </div>
  </div>
</template>
