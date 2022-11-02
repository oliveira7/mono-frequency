<script>
import {
    MapPinIcon,
    PencilIcon,
} from '@heroicons/vue/20/solid'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        AuthenticatedLayout,
        Head,
        Link,
        MapPinIcon,
        PencilIcon,
    },
    props: {
        locations: Array,
    },
}
</script>

<template>
    <Head title="Locais"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                Locais
            </h2>
            <div class="flex justify-end">
                <Link href="/locations/create" method="GET" as="button" type="button">
                    <button type="button"
                            class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Novo
                    </button>
                </Link>
            </div>
        </template>
        <div v-for="location in locations" :key="location.id" class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-semibold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    {{ location.name }}</h2>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <MapPinIcon class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true"/>
                        {{ location.location }} - {{ location.description }}
                    </div>
                </div>
            </div>
            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <Link :href="`/locations/${location.id}/edit`" method="get" as="button" type="button">
                    <span class="hidden sm:block">
                        <button type="button"
                                class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                          <PencilIcon class="-ml-1 mr-2 h-5 w-5 text-gray-500" aria-hidden="true"/>
                          Edit
                        </button>
                    </span>
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
