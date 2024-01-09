<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';

import { ref, onMounted } from 'vue';

const { events } = usePage().props;

const calendarOptions = ref({
  plugins: [dayGridPlugin, timeGridPlugin],
  initialView: 'dayGridMonth',
  events: events,
  dayRender: function (info) {
    const date = info.date.toISOString().split('T')[0];
    const hasData = events.some(event => event.start === date);

    const cell = info.el;
    const tooltip = document.createElement('div');
    tooltip.className = 'tooltip';
    tooltip.textContent = `Plugin Data: ${info.dayNumberText}`;
    tooltip.style.display = hasData ? 'block' : 'none'; // initially hide the tooltip

    cell.appendChild(tooltip);

    cell.addEventListener('mouseenter', () => {
      tooltip.style.display = 'block'; // show the tooltip on hover
    });

    cell.addEventListener('mouseleave', () => {
      tooltip.style.display = 'none'; // hide the tooltip when mouse leaves
    });
  },
});

onMounted(() => {
  const calendarEl = document.getElementById('calendar');

  if (calendarEl) {
    const calendar = new Calendar(calendarEl, calendarOptions.value);
    calendar.render();
  }
});
</script>

<style scoped>
.tooltip {
  position: absolute;
  top: -20px; /* Adjust this value based on your design */
  left: 20px; /* Adjust this value based on your design */
  background-color: white;
  border: 1px solid #ccc;
  padding: 5px;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
</style>



<template>
    <Head title="Dashboard" />



    <AuthenticatedLayout>
        <div class="py-12 fade-in">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-green-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="text-white p-10" id="calendar"></div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
