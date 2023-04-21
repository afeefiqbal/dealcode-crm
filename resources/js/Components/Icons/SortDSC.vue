<template>
  <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M7.38181 0.820312H3.82198H0.616412C0.0678664 0.820312 -0.206406 1.45471 0.182147 1.8266L3.14201 4.65953C3.61627 5.11346 4.38767 5.11346 4.86193 4.65953L5.98759 3.58215L7.82179 1.8266C8.20463 1.45471 7.93036 0.820312 7.38181 0.820312Z"
      :fill="active ? '#54636F' : '#C2C7CC'"
    />
  </svg>
</template>

<script setup>
const props = defineProps({
  active: {
    type: Boolean,
    default: false,
  },
});
</script>