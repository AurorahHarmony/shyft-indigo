<script setup>
const props = defineProps({
  type: { type: String, default: 'text' },
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
  <div class="mb-2">
    <label :for="id" class="form-label" v-if="label">{{ label }}</label>
    <input
      :type="type"
      class="form-control"
      :class="{ 'is-invalid': error }"
      :id="id"
      :value="modelValue"
      @input="handleInput"
    />
    <div class="invalid-feedback" v-if="error">{{ error }}</div>
  </div>
</template>
