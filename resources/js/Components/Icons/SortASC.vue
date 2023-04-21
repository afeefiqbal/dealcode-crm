<template>
  <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M7.81584 3.17337L5.98164 1.41783L4.86169 0.340444C4.38743 -0.113481 3.61604 -0.113481 3.14177 0.340444L0.181913 3.17337C-0.20664 3.54526 0.0733465 4.17966 0.616178 4.17966H3.82174H7.38158C7.93012 4.17966 8.2044 3.54526 7.81584 3.17337Z"
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