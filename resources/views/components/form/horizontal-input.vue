<script setup>
const props = defineProps({
  canEdit: { type: Boolean, default: false },
  type: { type: String, default: 'text' },
  disabled: { type: Boolean, default: false },
  label: String,
  modelValue: String,
  error: { type: Boolean, default: false },
});

const emit = defineEmits(['update:modelValue', 'enableEdit']);

const handleInput = (e) => {
  emit('update:modelValue', e.target.value);
};
</script>
<template>
  <div class="row mb-2 g-0">
    <label class="col-sm-3 col-form-label">
      {{ label }}
    </label>
    <div class="col-11 col-sm-8">
      <input
        :type="type"
        class="form-control"
        :class="{ 'is-invalid': error }"
        :disabled="disabled == 1"
        :value="modelValue"
        @input="handleInput"
      />
      <div class="invalid-feedback" v-if="error">{{ error }}</div>
    </div>
    <div class="col-1 d-flex align-items-center justify-content-center px-1">
      <a
        href="#"
        class="text-decoration-none"
        v-if="canEdit"
        @click="emit('enableEdit')"
        >Edit</a
      >
    </div>
  </div>
</template>
