<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div align="center" class="dash-content overflow-hidden shadow-xl sm:rounded-lg">
                   <h1 class="h1-dash">A base de dados contém {{ clients }} cliente(s)!</h1>
                   <a class="button-content-go" href="/clients">CRUD</a>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        props: [
            'clients'
        ],
    }
</script>
