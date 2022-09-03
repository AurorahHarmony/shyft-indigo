<script setup>
import ContentCard from '@/views/components/content-card.vue';
import { computed } from 'vue';

const props = defineProps({ auth: Object });
const user = computed(() => {
  return props.auth?.user || false;
});
</script>
<template layout>
  <div>
    <div class="row g-3 mb-3">
      <div class="col-xl-8">
        <ContentCard
          class="gradient-sunny text-white d-flex align-items-end"
          style="min-height: 250px"
        >
          <div class="w-100">
            <p class="h1 d-inline-block me-3 mb-0">
              Good Afternoon, {{ user.name }}
            </p>
            <div class="d-inline-block date-badge font-code">
              Monday 2nd January, 2022
            </div>
          </div>
        </ContentCard>
      </div>
      <div class="col-6 col-xl-2">
        <ContentCard
          class="
            gradient-latenight
            h-100
            text-white text-center
            d-flex
            flex-column
            justify-content-center
          "
        >
          <p class="h5" style="margin-bottom: -1rem">Successful Stat</p>
          <p class="font-code" style="font-size: 4rem">95.2%</p>
        </ContentCard>
      </div>
      <div class="col-6 col-xl-2">
        <ContentCard
          class="
            gradient-bluesky
            h-100
            text-white text-center
            d-flex
            flex-column
            justify-content-center
          "
        >
          <p class="h5" style="margin-bottom: -1rem">Other things</p>
          <p class="font-code" style="font-size: 4rem">255</p>
        </ContentCard>
      </div>
    </div>

    <div class="bg-white shadow-sm rounded-1 p-2">
      <h1 class="text-muted">Dashboard</h1>
    </div>
  </div>
</template>;
