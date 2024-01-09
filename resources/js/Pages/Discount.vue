<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted, provide } from 'vue';


onMounted(async () => {
  try {
    const response = await fetch('/api/discounts');

    // Check if the response is successful (status code 200)
    if (!response.ok) {
      throw new Error(`Failed to fetch discounts. Status: ${response.status}`);
    }

    const data = await response.json();
    discount.value = data.length > 0 ? data[0].discount : 0;
  } catch (error) {
    console.error('Error fetching discounts:', error.message);
  }
});

// Fetch discounts and update the discount value
const discount = ref(0);



// Provide the discount value
provide('discountValue', discount.value);
</script>

<template>
    <Head title="Dashboard" />



    <AuthenticatedLayout>
        <div class="py-12 fade-in">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-center mt-6">
                        <form @submit.prevent="createPlugin">
                            <div class="mb-4">

                                    <div class="text-center text-white" style="font-size: 30px;">
                                        Provide A Discount
                                    </div>

                                <input style="width: 340px;" type="number" id="discount" v-model="newDiscount.discount" class="mt-1 p-2 bg-transparent border-b-2 border-0 text-white text-center" required>
                            </div>
                           <div class="flex justify-center mb-10">
                                <button type="submit" class="bg-orange-600 hover:bg-orange-800 duration-200 text-white px-4 py-2 rounded "><i class="fa-solid fa-tag"></i> Done</button>
                           </div>
                            <div class="text-center text-white mb-5 mt-5">
                                <div style="font-size: 50px;" v-for="discount in discounts" :key="discount.id">
                                    {{ discount.discount }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>


</template>
<script>
export default {
    props: {
        discounts: Array,
    },
    data() {
        return {
            newDiscount: {
                discount: '',
            },
        };

    },


    methods: {
        openCreateModal() {
            this.showCreateModal = true;
        },
        closeCreateModal() {
            this.showCreateModal = false;
        },
        createPlugin() {
            // Add logic to create a new plugin
            this.closeCreateModal();
        },
        openEditModal(plugin) {
            this.selectedPlugin = plugin;
            this.showEditModal = true;
        },
        closeEditModal() {
            this.selectedPlugin = null;
            this.showEditModal = false;
        },
        updatePlugin() {
            // Add logic to update the selected plugin
            this.closeEditModal();
        },
        openDeleteModal(pluginId) {
            this.selectedPluginId = pluginId;
            this.showDeleteModal = true;
        },
        closeDeleteModal() {
            this.selectedPluginId = null;
            this.showDeleteModal = false;
        },
        deletePlugin() {
            // Add logic to delete the selected plugin
            this.closeDeleteModal();
        },

        createPlugin() {
            this.$inertia.post('/discount', this.newDiscount).then(() => {
                this.closeCreateModal();
            });
        }

    },
};
</script>
