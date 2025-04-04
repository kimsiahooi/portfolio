<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import { faker } from '@faker-js/faker';
import { Head, router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('admin.dashboard'),
    },
    {
        title: 'Wordle',
        href: route('admin.minigames.wordle.index'),
    },
];

const createWordHandler = () => {
    const length = 5;
    const word = faker.word.sample(length);

    router.visit(route('admin.minigames.wordle.store'), {
        method: 'post',
        preserveScroll: true,
        data: {
            word,
            length,
        },
    });
};
</script>

<template>
    <Head title="Wordle" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex flex-wrap justify-end">
                <Button @click="createWordHandler">Create Word</Button>
            </div>
            <Card>
                <CardHeader>
                    <CardTitle>Wordle</CardTitle>
                </CardHeader>
                <CardContent> Card Content </CardContent>
            </Card>
        </div>
    </AppLayout>
</template>
