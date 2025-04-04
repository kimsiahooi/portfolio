<script setup lang="ts">
import { Toaster } from '@/components/ui/toast';
import { useToast } from '@/components/ui/toast/use-toast';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType, SharedData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { watch } from 'vue';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage<SharedData>();

const { toast } = useToast();

const flashMessage = page.props.flash;

watch(
    flashMessage,
    (newValue) => {
        if (newValue.error) {
            toast({
                description: newValue.error,
                variant: 'destructive',
            });
        } else if (newValue.success) {
            toast({
                description: newValue.success,
            });
        }
    },
    { deep: true, immediate: true },
);
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
        <Toaster />
    </AppLayout>
</template>
