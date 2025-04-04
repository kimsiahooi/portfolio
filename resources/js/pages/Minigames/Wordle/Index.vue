<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import { useFormatDate } from '@/composables/useFormatDate';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import type { PaginatedData } from '@/types/PaginatedData';
import type { Wordle } from '@/types/minigames/Wordle';
import { faker } from '@faker-js/faker';
import { Head, router } from '@inertiajs/vue3';

defineProps<{
    wordles: PaginatedData<Wordle[]>;
}>();

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

const formatDate = useFormatDate();

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
                <Button @click="createWordHandler">Generate Word</Button>
            </div>
            <Card>
                <CardHeader>
                    <CardTitle>Wordle</CardTitle>
                </CardHeader>
                <CardContent> Card Content </CardContent>
            </Card>
            <Separator class="my-4" />
            <Table class="min-w-max">
                <TableCaption>{{ wordles.data.length ? 'A list of your recent wordles.' : 'Wordle not found.' }}</TableCaption>
                <TableHeader>
                    <TableRow>
                        <TableHead class="text-center"> ID </TableHead>
                        <TableHead class="text-center">Word</TableHead>
                        <TableHead class="text-center">Length</TableHead>
                        <TableHead class="text-center">Created At</TableHead>
                        <TableHead class="text-center">Updated At</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="wordle in wordles.data" :key="wordle.id">
                        <TableCell class="text-center">
                            {{ wordle.id }}
                        </TableCell>
                        <TableCell class="text-center">{{ wordle.word }}</TableCell>
                        <TableCell class="text-center">{{ wordle.length }}</TableCell>
                        <TableCell class="text-center">{{ formatDate(wordle.created_at) }}</TableCell>
                        <TableCell class="text-center">{{ formatDate(wordle.updated_at) }}</TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>
    </AppLayout>
</template>
