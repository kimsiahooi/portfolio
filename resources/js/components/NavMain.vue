<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import type { NavItemsGroup } from '@/types';
import { Link } from '@inertiajs/vue3';

defineProps<{
    categories: NavItemsGroup[];
}>();
</script>

<template>
    <SidebarGroup v-for="category in categories" :key="category.name" class="px-2 py-0">
        <SidebarGroupLabel>{{ category.name }}</SidebarGroupLabel>
        <SidebarMenu>
            <SidebarMenuItem v-for="item in category.items" :key="item.title">
                <SidebarMenuButton as-child :is-active="item.isActive" :tooltip="item.title">
                    <Link :href="item.href">
                        <component :is="item.icon" />
                        <span>{{ item.title }}</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
